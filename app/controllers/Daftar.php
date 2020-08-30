<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
        $this->load->library('fpdf/pdf_1');
		$this->load->library('template');

		//check authentication
		$this->auth();
	}

	/**
	 * Load Page Login
	 * @return [type] [description]
	 */
	public function index()
	{	
		$id = $this->session->userdata('nim');
		if($id) {
			$condition = array('NIM_TBUSER'=> $id);
			$data['users'] = $this->info_model->get_user($id);
			$data['model'] = $this->info_model->get_all_with_relation($id);
			$data['models'] = $this->daftar_model->get_praktikum();			
			$data['jadprak'] = $this->daftar_model->getJadwalPembukaan();
			$data['openprak'] = $this->daftar_model->getProcJadwalPembukaan();

				
			$this->template->set_navbar('templates/navbar-main');
			$this->template->load('main', 'daftar/index', $data);
		} else {
			$this->session->set_flashdata('message_danger', "System Error");
			redirect('depan');
		}
	}

	/**
	 * Load Page Insert
	 * @return [type] [description]
	 */
	public function insert()
	{
		$this->template->set_navbar('templates/navbar-main');

		if (!empty($_POST['kode'])) {
		    // Counting number of checked checkboxes.
		    $checked_count = count($_POST['kode']);
		    echo "You have selected ".$checked_count.
		    "<br>";
		    // $data = array();
		    foreach($_POST['kode'] as $chores_key => $chores) {
		    	$data[] = array(
		            'NIM_PESERTA' => $_POST['NIM_PESERTA'][$chores_key],
		            'PRAK_PESERTA' => $_POST['kode'][$chores_key],
		            'KELAS_PESERTA' => $_POST['KELAS_PESERTA'][$chores_key],
		            'TGLDAFTAR_PESERTA' => date('Y-m-d'),
		            'PERIODE_PESERTA' => $_POST['PERIODE_PESERTA'][$chores_key],
		            'THNPELAKSANAAN_PESERTA' => $_POST['TAHUN_PELAKSANAN_PESERTA'][$chores_key],
		            'NILAI_PESERTA' => 'F',
		            'STATUS_PESERTA' => $_POST['STATUS_PESERTA'][$chores_key],
		            'KETERANGAN_PESERTA' => 'mendaftar',
		        );
		       echo "<br /><pre>";
		       print_r($data);
		       echo "<pre>";		    
		   }

		    $res = $this->daftar_model->create($data);

		    if ($res) {
		        $this->session->set_flashdata('message_success', "Kriteria berhasil ditambahkan");
		    } else {
		        $this->session->set_flashdata('message_danger', "Kriteria gagal ditambahkan");
		    }

		    redirect('daftar');
		} else {
		    echo "<b>Please Select Atleast One Option.</b>";
		    $this->session->set_flashdata('message_danger', "System Error");
		    redirect('daftar');
		}
	}

	/**
	 * Action to Delete Record
	 * @return [type] [description]
	 */
	public function delete()
	{	
		$id = $this->uri->segment(3);
		if($id) {
			$res = $this->daftar_model->delete($id);
			
			if($res) {
				$this->session->set_flashdata('message_success1', "Kriteria berhasil dihapus");			
			} else {
				$this->session->set_flashdata('message_danger', "Kriteria gagal dihapus");			
			}
		} else {
			$this->session->set_flashdata('message_danger', "System Error");
		}

		redirect('daftar');
	}

	public function cetak_formulir()
	{			
		$id = $this->session->userdata('nim');
		$users = $this->info_model->get_user($id);
		foreach ($users as $row){
			if ($row->KELAS_TBUSER == "" || $row->JENISKELAMIN_TBUSER == "" || $row->NOTELP_TBUSER == "" || $row->EMAIL_TBUSER == "" || $row->FOTO_TBUSER == "") {
				if($row->KELAS_TBUSER == "" || $row->JENISKELAMIN_TBUSER == "" || $row->NOTELP_TBUSER == "" || $row->EMAIL_TBUSER == "" || $row->FOTO_TBUSER == "") {
					$this->session->set_flashdata('message_info', "Lengkapi profil terlebih dahulu untuk mencetak formulir pendafataran");
				}
				redirect('profil');
			} else {
				$control = $this->router->fetch_class();
				$method = $this->router->fetch_method();
				helper_log("/".$control."/".$method);
				
				ob_start(); 		
				global $title;
				$fpdf = new PDF_1('L','mm','A5');
				$fpdf->SetTitle($title);
				$fpdf->SetTitle('Cetak Formulir Pendaftaran-' . $this->session->userdata('nim'));
				$fpdf->AddPage();	
				$w = $fpdf->Image('assets/files/assets/images/Screenshot_2.jpg',9,1,194); 
				$fpdf->Cell(195,2,$w,0,1,'C');
				$fpdf->Ln(27);

				$user = $this->info_model->get_user($id);
				$getjadwal = $this->daftar_model->getJadwalPembukaan();

				$fpdf->SetFont('Times','',12);
				foreach ($user as $user){
					$fpdf->Cell(45,6,'NAMA',0,0,'L');
					$fpdf->Cell(5,6,':',0,0,'C');
			        $fpdf->Cell(115,6,strtoupper($user->NAMA_TBUSER),0,1,'L');

			        $fpdf->Cell(45,6,'NIM',0,0,'L');
					$fpdf->Cell(5,6,':',0,0,'C');
			        $fpdf->Cell(115,6,$user->NIM_TBUSER,0,1,'L');  

			        $fpdf->Cell(45,6,'KELAS',0,0,'L');
					$fpdf->Cell(5,6,':',0,0,'C');
			        $fpdf->Cell(115,6,strtoupper($user->KELAS_TBUSER),0,1,'L');
		    	}
		    	foreach ($getjadwal as $getjadwal){
					$fpdf->Cell(45,6,'PELAKSANAAN',0,0,'L');
					$fpdf->Cell(5,6,':',0,0,'C');
			        $fpdf->Cell(115,6,strtoupper("Periode ".$getjadwal->PERIODE_JADWAL_PEMBUKAAN.", Tahun ".$getjadwal->TAHUN_JADWAL_PEMBUKAAN),0,1,'L');
		    	}

				if($id) {
					$condition = array('NIM_TBUSER'=> $id);
					$peserta = $this->daftar_model->get_all_with_relation($id);

		        	$fpdf->Ln(2);

					$fpdf->SetFont('Times','B',12);
		            $fpdf->Cell(15,6,'NO.',1,0,'C');
		            $fpdf->Cell(30,6,'KODE',1,0,'C');
		            $fpdf->Cell(65,6,'NAMA PRAKTIKUM',1,0,'C');            
		            $fpdf->Cell(40,6,'SEMESTER',1,0,'C');
		            $fpdf->Cell(41,6,'BIAYA',1,1,'C');
		            $i = 1;

					$fpdf->SetFont('Times','',12);
					if($peserta){
						foreach ( $peserta as $peserta){
							$fpdf->Cell(15,6,$i++,1,0,'C');
							$fpdf->Cell(30,6,$peserta->PRAK_PESERTA,1,0,'C');
							$fpdf->Cell(65,6,$peserta->NAMA_PRAKTIKUM,1,0,'L');
							$fpdf->Cell(40,6,$peserta->SMST_PRAKTIKUM,1,0,'C');
							$fpdf->Cell(41,6,"Rp. ".number_format($peserta->BIAYA_PRAKTIKUM,0,',','.'),1,1,'C');
						}

						$sumprak = $this->daftar_model->get_all_sum_prak($id);
						foreach ($sumprak as $sumprak1){
							$fpdf->Cell(150,6,'JUMLAH',1,0,'C');
							$fpdf->Cell(41,6,"Rp. ".number_format($sumprak1->SUM_BIAYA_PRAKTIKUM,0,',','.'),1,1,'C');
				    	}
		    		}else {
						$fpdf->Cell(191,6,"TIDAK ADA DATA",1,1,'C');
					}

					$fpdf->Ln(3);
					$fpdf->SetFont('Times','',10);
					$fpdf->Cell(60,4,'*Halaman 1 untuk diserahkan ke laboratorium',0,0,'L');					
					$fpdf->SetFont('Times','',12);
					$fpdf->Cell(70,4,'',0,0,'C');
			        $fpdf->Cell(61,4,"Surabaya, ".date('d-m-Y'),0,1,'C');	        
					$fpdf->SetFont('Times','',10);
					$fpdf->Cell(70,4,'*Halaman 2 untuk mahasiswa',0,0,'L');
					$fpdf->Cell(60,4,'',0,0,'C');
					$fpdf->SetFont('Times','',12);
			        $fpdf->Cell(61,4,"MAHASISWA",0,1,'C');
			        $fpdf->SetFont('Times','',10);
			        $fpdf->Cell(60,4,'*Formulir di cetak menggunakan kertas A5',0,0,'L');
			        $fpdf->Cell(61,0,"",0,1,'C');

			        $fpdf->Ln(10);
				    $fpdf->Cell(60,5,'',0,0,'C');
				        
					// $fpdf->Cell(80,5,'',0,0,'C');
					$w1 = $fpdf->Image(('assets/files/assets/images/Screenshot_1.jpg'),151,130,40); 
					$fpdf->Cell(61,5,$w1,0,1,'C');
					// $fpdf->Cell(40, 5, $fpdf->Image(base_url('assets/files/assets/images/Screenshot_1.jpg'), $fpdf->GetX(), $fpdf->GetY(), 40.78), 1, 1, 'C', false );
					// $fpdf->Cell(61,5,'( .............................................. )',0,1,'C');
					$fpdf->SetFont('Times','',12);

				/////////////////////////////////////////

				$fpdf->AddPage();
				$fpdf->SetTitle($title);
				$fpdf->SetTitle('Cetak Formulir Pendaftaran - ' . $this->session->userdata('nim'));	
				$w = $fpdf->Image(('assets/files/assets/images/Screenshot_2.jpg'),9,1,194); 
				$fpdf->Cell(195,2,$w,0,1,'C');
				$fpdf->Ln(27);

				$user = $this->info_model->get_user($id);
				$getjadwal = $this->daftar_model->getJadwalPembukaan();

				$fpdf->SetFont('Times','',12);
				foreach ($user as $user){
					$fpdf->Cell(45,6,'NAMA',0,0,'L');
					$fpdf->Cell(5,6,':',0,0,'C');
			        $fpdf->Cell(115,6,strtoupper($user->NAMA_TBUSER),0,1,'L');

			        $fpdf->Cell(45,6,'NIM',0,0,'L');
					$fpdf->Cell(5,6,':',0,0,'C');
			        $fpdf->Cell(115,6,$user->NIM_TBUSER,0,1,'L');  

			        $fpdf->Cell(45,6,'KELAS',0,0,'L');
					$fpdf->Cell(5,6,':',0,0,'C');
			        $fpdf->Cell(115,6,strtoupper($user->KELAS_TBUSER),0,1,'L');
		    	}
		    	foreach ($getjadwal as $getjadwal){
					$fpdf->Cell(45,6,'PELAKSANAAN',0,0,'L');
					$fpdf->Cell(5,6,':',0,0,'C');
			        $fpdf->Cell(115,6,strtoupper("Periode ".$getjadwal->PERIODE_JADWAL_PEMBUKAAN.", Tahun ".$getjadwal->TAHUN_JADWAL_PEMBUKAAN),0,1,'L');
		    	}

				if($id) {
					$condition = array('NIM_TBUSER'=> $id);
					$peserta = $this->daftar_model->get_all_with_relation($id);

		        	$fpdf->Ln(2);

					$fpdf->SetFont('Times','B',12);
		            $fpdf->Cell(15,6,'NO.',1,0,'C');
		            $fpdf->Cell(30,6,'KODE',1,0,'C');
		            $fpdf->Cell(65,6,'NAMA PRAKTIKUM',1,0,'C');            
		            $fpdf->Cell(40,6,'SEMESTER',1,0,'C');
		            $fpdf->Cell(41,6,'BIAYA',1,1,'C');
		            $i = 1;

					$fpdf->SetFont('Times','',12);
					if($peserta){
						foreach ( $peserta as $peserta){
							$fpdf->Cell(15,6,$i++,1,0,'C');
							$fpdf->Cell(30,6,$peserta->PRAK_PESERTA,1,0,'C');
							$fpdf->Cell(65,6,$peserta->NAMA_PRAKTIKUM,1,0,'L');
							$fpdf->Cell(40,6,$peserta->SMST_PRAKTIKUM,1,0,'C');
							$fpdf->Cell(41,6,"Rp. ".number_format($peserta->BIAYA_PRAKTIKUM,0,',','.'),1,1,'C');
						}

						$sumprak = $this->daftar_model->get_all_sum_prak($id);
						foreach ($sumprak as $sumprak1){
							$fpdf->Cell(150,6,'JUMLAH',1,0,'C');
							$fpdf->Cell(41,6,"Rp. ".number_format($sumprak1->SUM_BIAYA_PRAKTIKUM,0,',','.'),1,1,'C');
						}
					}else{
						$fpdf->Cell(191,6,"TIDAK ADA DATA",1,1,'C');
					}
		    	}

				$fpdf->Ln(2);
				$fpdf->SetFont('Times','',12);
				$fpdf->Cell(65,4,"        Surabaya, ".date('d-m-Y'),0,0,'L');
				$fpdf->Cell(70,4,'',0,0,'C');
			    $fpdf->Cell(65,4,"",0,1,'C');
			    $fpdf->Cell(65,4,'   ADMINISTRASI LAB. TI',0,0,'L');
				$fpdf->Cell(70,4,'',0,0,'C');
			    $fpdf->Cell(65,4,"MAHASISWA",0,1,'C');

			    $w1 = $fpdf->Image(('assets/files/assets/images/Screenshot_1.jpg'),18,130,40); 
			    $w2 = $fpdf->Image(('assets/files/assets/images/Screenshot_1.jpg'),158,130,40); 
				$fpdf->Cell(61,5,$w1,0,1,'C');
				$fpdf->Cell(61,5,$w2,0,1,'C');
				} else {
					$this->session->set_flashdata('message_danger', "System Error");
					redirect('depan');
				}	

				$fileName = 'Cetak Formulir Pendaftaran-'.$this->session->userdata('nim').'.pdf';
		        $fpdf->Output($fileName,'I');
		        exit;
			}
		}
	}

	private function auth()
	{
		if($this->session->userdata('is_logged_in'))
		{
			return TRUE;
		} else {
			redirect('user');
		}
	}
}
