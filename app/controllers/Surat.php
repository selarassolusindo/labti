<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    
class Surat extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
        $this->load->library('fpdf/pdf_2');
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
			$data['models'] = $this->jadwal_model->get_all_with_relation();
            $data['openprakDesc'] = $this->daftar_model->getJadwalPembukaan();
            $data['openprak'] = $this->daftar_model->getProcJadwalPembukaan();

			$this->template->set_navbar('templates/navbar-main');
			$this->template->load('main', 'surat/index', $data);
		} else {
			$this->session->set_flashdata('message_danger', "System Error");
			redirect('depan');
		}	
	}

    function em($word) {

        $word = str_replace("@","%40",$word);
        $word = str_replace("`","%60",$word);
        $word = str_replace("¢","%A2",$word);
        $word = str_replace("£","%A3",$word);
        $word = str_replace("¥","%A5",$word);
        $word = str_replace("|","%A6",$word);
        $word = str_replace("«","%AB",$word);
        $word = str_replace("¬","%AC",$word);
        $word = str_replace("¯","%AD",$word);
        $word = str_replace("º","%B0",$word);
        $word = str_replace("±","%B1",$word);
        $word = str_replace("ª","%B2",$word);
        $word = str_replace("µ","%B5",$word);
        $word = str_replace("»","%BB",$word);
        $word = str_replace("¼","%BC",$word);
        $word = str_replace("½","%BD",$word);
        $word = str_replace("¿","%BF",$word);
        $word = str_replace("À","%C0",$word);
        $word = str_replace("Á","%C1",$word);
        $word = str_replace("Â","%C2",$word);
        $word = str_replace("Ã","%C3",$word);
        $word = str_replace("Ä","%C4",$word);
        $word = str_replace("Å","%C5",$word);
        $word = str_replace("Æ","%C6",$word);
        $word = str_replace("Ç","%C7",$word);
        $word = str_replace("È","%C8",$word);
        $word = str_replace("É","%C9",$word);
        $word = str_replace("Ê","%CA",$word);
        $word = str_replace("Ë","%CB",$word);
        $word = str_replace("Ì","%CC",$word);
        $word = str_replace("Í","%CD",$word);
        $word = str_replace("Î","%CE",$word);
        $word = str_replace("Ï","%CF",$word);
        $word = str_replace("Ð","%D0",$word);
        $word = str_replace("Ñ","%D1",$word);
        $word = str_replace("Ò","%D2",$word);
        $word = str_replace("Ó","%D3",$word);
        $word = str_replace("Ô","%D4",$word);
        $word = str_replace("Õ","%D5",$word);
        $word = str_replace("Ö","%D6",$word);
        $word = str_replace("Ø","%D8",$word);
        $word = str_replace("Ù","%D9",$word);
        $word = str_replace("Ú","%DA",$word);
        $word = str_replace("Û","%DB",$word);
        $word = str_replace("Ü","%DC",$word);
        $word = str_replace("Ý","%DD",$word);
        $word = str_replace("Þ","%DE",$word);
        $word = str_replace("ß","%DF",$word);
        $word = str_replace("à","%E0",$word);
        $word = str_replace("á","%E1",$word);
        $word = str_replace("â","%E2",$word);
        $word = str_replace("ã","%E3",$word);
        $word = str_replace("ä","%E4",$word);
        $word = str_replace("å","%E5",$word);
        $word = str_replace("æ","%E6",$word);
        $word = str_replace("ç","%E7",$word);
        $word = str_replace("è","%E8",$word);
        $word = str_replace("é","%E9",$word);
        $word = str_replace("ê","%EA",$word);
        $word = str_replace("ë","%EB",$word);
        $word = str_replace("ì","%EC",$word);
        $word = str_replace("í","%ED",$word);
        $word = str_replace("î","%EE",$word);
        $word = str_replace("ï","%EF",$word);
        $word = str_replace("ð","%F0",$word);
        $word = str_replace("ñ","%F1",$word);
        $word = str_replace("ò","%F2",$word);
        $word = str_replace("ó","%F3",$word);
        $word = str_replace("ô","%F4",$word);
        $word = str_replace("õ","%F5",$word);
        $word = str_replace("ö","%F6",$word);
        $word = str_replace("÷","%F7",$word);
        $word = str_replace("ø","%F8",$word);
        $word = str_replace("ù","%F9",$word);
        $word = str_replace("ú","%FA",$word);
        $word = str_replace("û","%FB",$word);
        $word = str_replace("ü","%FC",$word);
        $word = str_replace("ý","%FD",$word);
        $word = str_replace("þ","%FE",$word);
        $word = str_replace("ÿ","%FF",$word);
        return $word;
    }
    /**
     * Load Cetak Peserta Per Praktikum
     * @return [type] [description]
     */
    public function cetakPesertaPraktikum()
    {

        // $thnPrak = '2019';
        // $perPrak = '5';
        // $idPrak  = 'TI1340';


        $thnPrak = $this->input->post('TAHUN_JADWAL_PEMBUKAAN');
        $perPrak = $this->input->post('PERIODE_JADWAL_PEMBUKAAN');
        $kodePrak= $this->input->post('KODE_PRAKTIKUM');
        $nmPrak  = str_replace("&amp;", "&", $this->input->post('NAMA_PRAKTIKUM')); ;
        // $produk  = $this->input->post('id_produk');
        ob_start();
        global $title;
        $fpdf = new PDF_2('P', 'mm', 'a4');
        // $title = 'LABORATORIUM TEKNIK SIPIL \n asdasd' ;
        $fpdf->SetTitle($title);
        $data    = $this->surat_model->get_peserta_per_praktikum($thnPrak, $perPrak, $kodePrak);
        // foreach ($data as $jadprak){
        //     $fpdf->SetTitle('Cetak Cetak Pembukaan Pendaftaran Praktikum - '.$jadprak->TAHUN_JADWAL_PEMBUKAAN.', Periode '.$jadprak->PERIODE_JADWAL_PEMBUKAAN);
        // }
        // membuat halaman baru
        $fpdf->AddPage();
        // Memberikan space kebawah agar tidak terlalu rapat
        // setting jenis font yang akan digunakan
        $fpdf->SetFont('Times','BU',15);
        // Memberikan space kebawah agar tidak terlalu rapat
        $fpdf->Ln(5);
        // mencetak string
        $fpdf->Cell(195,2,'DATA PESERTA PRAKTIKUM',0,1,'C');
        $fpdf->Ln(5);
        $fpdf->SetFont('Times','BU',14);
        $fpdf->Cell(195,2, strtoupper($nmPrak),0,1,'C');
// $col1="PILOT REMARKS\n\n";
// $fpdf->MultiCell(189, 10, $col1, 1, 1);

        $fpdf->Ln(10);

        $fpdf->SetFont('Times','B',12);
        $fpdf->Cell(15,7,'NO.',1,0,'C');
        $fpdf->Cell(23,7,'NIM',1,0,'C');
        $fpdf->Cell(88,7,'NAMA',1,0,'C');
        $fpdf->Cell(35,7,'KELAS',1,0,'C');
        $fpdf->Cell(30,7,'TOTAL',1,1,'C');
        $i = 1;
        $total_sum = 0;

        $fpdf->SetFont('Times','',12);
        
        if (is_array($data) || is_object($data))
        {
            foreach ($data as $value)
            {
                $total_sum += $value->BIAYA_PRAKTIKUM;
                $fpdf->Cell(15,7,$i++,1,0,'C');
                $fpdf->Cell(23,7,$value->NIM_TBUSER,1,0,'C');
                $fpdf->Cell(88,7,substr($value->NAMA_TBUSER,0,31),1,0,'L');
                $fpdf->Cell(35,7,$value->KELAS_TBUSER,1,0,'C');
                $fpdf->Cell(30,7,"Rp. ".number_format($value->BIAYA_PRAKTIKUM, 0, ',', '.'),1,1,'C');
            }
        }

        $fpdf->SetFont('Times','B',12);
        $fpdf->Cell(161,7,'TOTAL',1,0,'C');
        $fpdf->Cell(30,7,"Rp. ".number_format($total_sum, 0, ',', '.'),1,1,'C');


        // $fileName = 'Cetak Pembukaan Pendaftaran Praktikum - ' . $this->session->userdata('nim') . '.pdf';
        
       
        $fileName = 'Cetak Peserta Praktikum -'.$nmPrak.'.pdf';
        $url =  $fpdf->Output($fileName, 'I');


// Send json response
// header("Content-type:application/pdf");
// echo json_encode(['url' => $url]);

        // echo json_encode(array('url' => $url));
    }

	/**
	 * Load Cetak Transkrip
	 * @return [type] [description]
	 */
	public function cetak_pengajuan_dana_praktikum()
	{		
		$control = $this->router->fetch_class();
		$method = $this->router->fetch_method();
		helper_log("/".$control."/".$method);

		ob_start();
		global $title;
		$fpdf = new PDF_2('P', 'mm', 'a4');
		// $title = 'LABORATORIUM TEKNIK SIPIL \n asdasd' ;
		$fpdf->SetTitle($title);
		$jadprak = $this->daftar_model->getJadwalPembukaan();
		foreach ($jadprak as $jadprak){
			$fpdf->SetTitle('Cetak Cetak Pembukaan Pendaftaran Praktikum - '.$jadprak->TAHUN_JADWAL_PEMBUKAAN.', Periode '.$jadprak->PERIODE_JADWAL_PEMBUKAAN);
		}
		// membuat halaman baru
		$fpdf->AddPage();
		// setting jenis font yang akan digunakan
		$fpdf->SetFont('Times', '', 12);
		// Memberikan space kebawah agar tidak terlalu rapat

		$array_bulan = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
    	$bulan = $array_bulan[date('n')];
		// mencetak string 
		$fpdf->Cell(20, 6, 'Nomor', 0, 0, 'L');
		$fpdf->Cell(5, 6, ' : ', 0, 0, 'C');
    	$fpdf->Cell(28, 6, '           / FT / '.$bulan. ' / '. date("Y"), 0, 1, 'C');
		$fpdf->Cell(20, 6, 'Lampiran', 0, 0, 'L');
		$fpdf->Cell(5, 6, ' : ', 0, 0, 'C');
    	$fpdf->Cell(28, 6, '1 (Satu) bendel', 0, 1, 'C');
		$fpdf->Cell(20, 6, 'Perihal', 0, 0, 'L');
		$fpdf->Cell(5, 6, ' : ', 0, 0, 'C');
		$fpdf->SetFont('Times', 'B', 12);
    	$fpdf->Cell(80, 6, 'Pengajuan Dana Praktikum', 0, 1, 'L');
    	$fpdf->Cell(25, 6, '', 0, 0, 'C');
		$fpdf->SetFont('Times', 'BU', 12);
    	$fpdf->Cell(80, 6, 'di Laboratorium Teknik Informatika', 0, 1, 'L');

		$fpdf->Ln(6);

		$fpdf->SetFont('Times', '', 12);
		$fpdf->Cell(20, 6, 'Kepada', 0, 0, 'L');
		$fpdf->Cell(5, 6, ' : ', 0, 0, 'C');
    	$fpdf->Cell(28, 6, 'Yth. Dekan Fakultas Teknik', 0, 1, 'L');
    	// $fpdf->Cell(25, 6, '', 0, 0, 'C');
    	// $fpdf->Cell(80, 6, 'Bidang Administrasi Umum dan Keuangan', 0, 1, 'L');
    	$fpdf->Cell(25, 6, '', 0, 0, 'C');
    	$fpdf->Cell(80, 6, 'Universitas Bhayangkara Surabaya', 0, 1, 'L');
    	$fpdf->Cell(25, 6, '', 0, 0, 'C');
    	$fpdf->Cell(80, 6, 'di', 0, 1, 'L');
    	$fpdf->SetFont('Times', 'U', 12);
    	$fpdf->Cell(30, 6, '', 0, 0, 'C');
    	$fpdf->Cell(80, 6, 'Tempat', 0, 1, 'L');

    	$fpdf->Ln(6);

    	$fpdf->SetFont('Times', '', 12);
    	$fpdf->Cell(25, 6, '', 0, 0, 'C');
    	$fpdf->Cell(80, 6, 'Dengan hormat,', 0, 1, 'L');

        $dtpeserta = $this->surat_model->get_peserta_praktikum();
        $total_sum = 0;

        if (is_array($dtpeserta)) {            
            foreach ($dtpeserta as $peserta){
                $total_sum += $peserta->BIAYA_PRAKTIKUM;
            }
        }

    	$fpdf->Cell(25, 6, '', 0, 0, 'C');
    	$fpdf->Cell(10, 6, '1. ', 0, 0, 'L');
    	$fpdf->MultiCell(155,6,'Berdasarkan kurikulum Fakultas Teknik Program Studi Teknik Informatika, mahasiswa program studi Teknik Informatika diwajibkan untuk melakukan kegiatan Praktikum.' ,0,'J',false);

    	$fpdf->Cell(25, 4, '', 0, 1, 'C');

    	$fpdf->Cell(25, 6, '', 0, 0, 'C');
    	$fpdf->Cell(10, 6, '2. ', 0, 0, 'L');

        
        $openprak = $this->daftar_model->getProcJadwalPembukaan();
        // $namaPrak = '';
        $namaPrak = array();
        foreach($openprak as $row){
            $namaPrak[] = $row->NAMA_PRAKTIKUM;

            // $fpdf->MultiCell(155,6, $namaPrak.', serta Daftar Peserta Praktikum.' ,0,'J',false);
        }
        // $getnamaPrak = implode(" ,",$namaPrak);
        if (count($namaPrak) == 1) {
            // return the single name
           $getnamaPrak = $namaPrak;

           // return $getnamaPrak;
        } elseif (count($namaPrak) == 2) {
            // return array joined with "and"
            $getnamaPrak = implode(" & ",$namaPrak);

            // return $getnamaPrak;
        } else {
            // pull of the last item
            $last = array_pop($namaPrak);
            // join remaining list with commas
            $getnamaPrak = implode(", ", $namaPrak);
            // add the last item back using ", and"
            $getnamaPrak .= ", & " . $last;

            // return $getnamaPrak;
        }

    	$fpdf->MultiCell(155,6,'Berdasarkan dengan hal tersebut, kami bermaksud mengajukan dana operasional praktikum sebesar Rp. '.number_format($total_sum, 0, ',', '.').',- ('.ucwords(number_to_words($total_sum)).'). Bersama surat ini kami lampirkan Rincian Anggaran Dana Praktikum '.$getnamaPrak.', serta Daftar Peserta Praktikum.' ,0,'J',false);

    	$fpdf->Cell(25, 4, '', 0, 1, 'C');

    	$fpdf->Cell(25, 6, '', 0, 0, 'C');
    	$fpdf->Cell(10, 6, '3. ', 0, 0, 'L');
    	$fpdf->MultiCell(155,6,'Demikian pengajuan dana ini kami buat, atas perhatiannya disampaikan terimakasih.' ,0,'J',false);

    	$fpdf->Cell(25, 4, '', 0, 1, 'C');

    	$fpdf->Cell(130, 6, '', 0, 0, 'C');
    	$fpdf->Cell(60, 6, 'Surabaya, '. tanggal(), 0, 1, 'C');
    	$fpdf->Cell(130, 6, '', 0, 0, 'C');
    	$fpdf->Cell(60, 6, 'Ka. Lab. Teknik Informatika,', 0, 1, 'C');

    	$fpdf->Ln(30);

        $fpdf->SetFont('Times', 'BU', 12);
        $fpdf->Cell(130, 6, '', 0, 0, 'C');
        $kepala = $this->info_model->get_kepala_lab();
        foreach ($kepala as $kepala){
          $fpdf->Cell(60, 6, $kepala->NAMA_STRLAB.", ".$kepala->GELAR_STRLAB, 0, 1, 'C');
          $fpdf->Cell(130, 6, '', 0, 0, 'C');
          $fpdf->SetFont('Times', 'B', 12);
          $fpdf->Cell(60, 3, 'NIK : '. $kepala->NOMOR_STRLAB, 0, 1, 'C');
        }

        // membuat halaman baru
        $fpdf->AddPage();
        // setting jenis font yang akan digunakan
        $fpdf->SetFont('Times','BU',14);
        // Memberikan space kebawah agar tidak terlalu rapat
        $fpdf->Ln(5);
        // mencetak string
        $fpdf->Cell(195,2,'DATA PESERTA PRAKTIKUM',0,1,'C');
        $fpdf->Ln(10);


        $fpdf->SetFont('Times','B',12);
        $fpdf->Cell(15,7,'NO.',1,0,'C');
        $fpdf->Cell(23,7,'NIM',1,0,'C');
        $fpdf->Cell(88,7,'NAMA',1,0,'C');
        $fpdf->Cell(35,7,'KELAS',1,0,'C');
        $fpdf->Cell(30,7,'TOTAL',1,1,'C');
        $i = 1;

        $fpdf->SetFont('Times','',12);
       
        if (is_array($dtpeserta)) {            
            foreach ($dtpeserta as $peserta){
              $fpdf->Cell(15,7,$i++,1,0,'C');
              $fpdf->Cell(23,7,$peserta->NIM_TBUSER,1,0,'C');
              $fpdf->Cell(88,7,$peserta->NAMA_TBUSER,1,0,'L');
              $fpdf->Cell(35,7,$peserta->KELAS_TBUSER,1,0,'C');
              $fpdf->Cell(30,7,"Rp. ".number_format($peserta->BIAYA_PRAKTIKUM, 0, ',', '.'),1,1,'C');
            } 
        }

        
        
        $fpdf->SetFont('Times','B',12);
        $fpdf->Cell(161,7,'TOTAL',1,0,'C');
        $fpdf->Cell(30,7,"Rp. ".number_format($total_sum, 0, ',', '.'),1,1,'C');

    		// $fileName = 'Cetak Pembukaan Pendaftaran Praktikum - ' . $this->session->userdata('nim') . '.pdf';
        
        $jadprak = $this->daftar_model->getJadwalPembukaan();
        foreach ($jadprak as $jadprak){
          $fileName = 'Cetak Pembukaan Pendaftaran Praktikum - ' . $jadprak->TAHUN_JADWAL_PEMBUKAAN . ', Periode ' . $jadprak->PERIODE_JADWAL_PEMBUKAAN . '.pdf';
        }
     // $fileName = 'Cetak Pembukaan Pendaftaran Praktikum.pdf';
		$fpdf->Output($fileName, 'I');
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
