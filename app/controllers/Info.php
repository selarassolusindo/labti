<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();		
        $this->load->library('fpdf/pdf');
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
		$control = $this->router->fetch_class();
		$method = $this->router->fetch_method();
		helper_log("/".$control."/".$method);
		$id = $this->session->userdata('nim');
		if($id) {
			$condition = array('NIM_TBUSER'=> $id);
			$data['models'] = $this->info_model->get_all_with_relation($id);
			$data['users'] = $this->info_model->get_user($id);		

			$this->template->set_navbar('templates/navbar-main');
			$this->template->load('main', 'info/index', $data);	
		} else {
			$this->session->set_flashdata('message_danger', "System Error");
			redirect('depan');
		}	
		
	}

	function get_data()
	{	
		// $id = $this->session->userdata('nim');
		$list = $this->info_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->KODE_PRAKTIKUM;
			$row[] = strtoupper($field->NAMA_PRAKTIKUM);
			$row[] = $field->KELAS_PESERTA;
			$row[] = $field->NILAI_PESERTA;
			$row[] = $field->STATUS_PESERTA;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->info_model->count_all(),
			"recordsFiltered" => $this->info_model->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	/**
	 * Load Cetak Transkrip
	 * @return [type] [description]
	 */
	public function cetak_transkrip()
	{			
		$id = $this->session->userdata('nim');
		$users = $this->info_model->get_user($id);
		foreach ($users as $row){
			if ($row->KELAS_TBUSER == "" || $row->JENISKELAMIN_TBUSER == "" || $row->NOTELP_TBUSER == "" || $row->EMAIL_TBUSER == "" || $row->FOTO_TBUSER == "") {
				if($row->KELAS_TBUSER == "" || $row->JENISKELAMIN_TBUSER == "" || $row->NOTELP_TBUSER == "" || $row->EMAIL_TBUSER == "" || $row->FOTO_TBUSER == "") {
					$this->session->set_flashdata('message_info', "Lengkapi profil terlebih dahulu untuk mencetak transkrip");
				}
				redirect('profil');
			} else {
				$control = $this->router->fetch_class();
				$method = $this->router->fetch_method();
				helper_log("/".$control."/".$method);
		
				ob_start(); 		
				global $title;
				$fpdf = new PDF('P','mm','letter');
				// $title = 'LABORATORIUM TEKNIK SIPIL \n asdasd' ;
				$fpdf->SetTitle($title);
				$fpdf->SetTitle('Cetak Transkrip - ' . $this->session->userdata('nim'));
				// membuat halaman baru
				$fpdf->AddPage();
				// setting jenis font yang akan digunakan
				$fpdf->SetFont('Times','BU',15);
				// Memberikan space kebawah agar tidak terlalu rapat
				$fpdf->Ln(40);
				// mencetak string 
				$fpdf->Cell(195,2,'TRANSKRIP NILAI PRAKTIKUM',0,1,'C');
				$fpdf->Ln(10);

				$user = $this->info_model->get_user($id);

				$fpdf->SetFont('Times','',12);
				foreach ($user as $user){
					$fpdf->Cell(45,7,'Nama',0,0,'L');
					$fpdf->Cell(5,7,':',0,0,'C');
			        $fpdf->Cell(115,7,strtoupper($user->NAMA_TBUSER),0,1,'L');
			        // $fpdf->Cell(35,9,'I','LR',1,'C',0);
			        $fpdf->Cell(45,7,'NIM',0,0,'L');
					$fpdf->Cell(5,7,':',0,0,'C');
			        $fpdf->Cell(115,7,$user->NIM_TBUSER,0,1,'L');        
			        // $fpdf->Cell(35,9,'I','LR',1,'C',0);
			        $fpdf->Cell(45,7,'Kelas',0,0,'L');
					$fpdf->Cell(5,7,':',0,0,'C');
			        $fpdf->Cell(115,7,ucfirst($user->KELAS_TBUSER),0,1,'L');
			        // $fpdf->Cell(35,9,'I','LR',1,'C',0);
			        $fpdf->Cell(45,7,'Jenis Kelamin',0,0,'L');
					$fpdf->Cell(5,7,':',0,0,'C');
			        $fpdf->Cell(115,7,ucfirst($user->JENISKELAMIN_TBUSER),0,1,'L');
			        // $fpdf->Cell(35,9,'I','LR',1,'C',0);
			        $fpdf->Cell(45,7,'Fakultas / Program Studi',0,0,'L');
					$fpdf->Cell(5,7,':',0,0,'C');
			        $fpdf->Cell(115,7,"TEKNIK / TEKNIK INFORMATIKA",0,1,'L');
			        // $fpdf->Image((base_url('uploads/picture/'.$this->session->userdata('foto'))),173,57,30);
		    	}

		        $fpdf->Ln(7);

				if($id) {
					$condition = array('NIM_TBUSER'=> $id);
					$peserta = $this->info_model->get_all_with_relation($id);

					$fpdf->SetFont('Times','B',12);
		            $fpdf->Cell(15,7,'NO.',1,0,'C');
		            $fpdf->Cell(23,7,'KODE',1,0,'C');
		            $fpdf->Cell(57,7,'NAMA PRAKTIKUM',1,0,'C');            
		            $fpdf->Cell(40,7,'PELAKSANAAN',1,0,'C');
		            $fpdf->Cell(25,7,'NILAI',1,0,'C');
		            $fpdf->Cell(36,7,'KETERANGAN',1,1,'C');
		            $i = 1;

					$fpdf->SetFont('Times','',12);
					foreach ( $peserta as $peserta){
						$fpdf->Cell(15,7,$i++,1,0,'C');
						$fpdf->Cell(23,7,$peserta->KODE_PRAKTIKUM,1,0,'C');
						$fpdf->Cell(57,7,$peserta->NAMA_PRAKTIKUM,1,0,'L');
						$fpdf->Cell(40,7,$peserta->THNPELAKSANAAN_PESERTA.", Periode ".$peserta->PERIODE_PESERTA,1,0,'C');
						$fpdf->Cell(25,7,$peserta->NILAI_PESERTA,1,0,'C');
						$fpdf->Cell(36,7,strtoupper($peserta->STATUS_PESERTA),1,1,'C');
					}

					$fpdf->Ln(5);
					$fpdf->SetFont('Times','',10);
					// $fpdf->Cell(36,7,'Catatan :',1,1,'L');
					$fpdf->Cell(36,5,'Transkrip ini dinyatakan SAH apabila :',0,1,'L');
					$fpdf->Cell(36,5,'1. Sudah di cek kesamaan nilai dengan data oleh asisten lab.',0,1,'L');
					$fpdf->Cell(36,5,'2. Sudah mendapat stempel dan tertanda tangan oleh kepala lab. dan asisten lab.',0,1,'L');

					$fpdf->Ln(10);
					$fpdf->SetFont('Times','',12);
					$fpdf->Cell(65,4,'ASISTEN LABORATORIUM',0,0,'C');
					$fpdf->Cell(70,4,'',0,0,'C');
			        $fpdf->Cell(65,4,"KEPALA LABORATORIUM",0,1,'C');	        
					$fpdf->SetFont('Times','',10);
			        $fpdf->Cell(65,4,'TEKNIK INFORMATIKA',0,0,'C');
					$fpdf->Cell(70,4,'',0,0,'C');
			        $fpdf->Cell(65,4,"TEKNIK INFORMATIKA",0,1,'C');

			        $kepala = $this->info_model->get_kepala_lab();
			        $asisten = $this->info_model->get_asisten_lab();


			        $fpdf->Ln(25);
			        $fpdf->SetFont('Times','BU',11);

			        foreach ($asisten as $asisten){
				        $fpdf->Cell(65,5,$asisten->NAMA_STRLAB.", ".$asisten->GELAR_STRLAB,0,0,'C');
				        
						$fpdf->Cell(70,5,'',0,0,'C');
							foreach ($kepala as $kepala){
					        $fpdf->Cell(65,5,$kepala->NAMA_STRLAB.", ".$kepala->GELAR_STRLAB,0,1,'C');
					        
					        $fpdf->SetFont('Times','',12);
					        $fpdf->Cell(65,5,$asisten->NOMOR_STRLAB,0,0,'C');
					        
							$fpdf->Cell(70,5,'',0,0,'C');
					        $fpdf->Cell(65,5,"NIK : ". $kepala->NOMOR_STRLAB,0,1,'C');
				        }
				    }

				} else {
					$this->session->set_flashdata('message_danger', "System Error");
					redirect('depan');
				}	

				$fileName = 'Cetak Transkrip - ' . $this->session->userdata('nim') . '.pdf';
		        $fpdf->Output($fileName,'I');
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
