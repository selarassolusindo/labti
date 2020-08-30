<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validasi extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');

		//check authentication
		$this->auth();
	}

	/**
	 * get doc values from input form
	 * @return [type] [description]
	 */
	public function _get_doc()
	{
		$data = array(
			'KETERANGAN_PESERTA' => 'peserta',
		);

		return $data;
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
		if($this->session->userdata('level') == "admin")
		{	
			$condition = array('NIM_TBUSER'=> $id);
			$data['users'] = $this->info_model->get_user($id);
			$data['models'] = $this->jadwal_model->get_all_with_relation();
			$data['peserta'] = $this->validasi_model->select_peserta();

			$this->template->set_navbar('templates/navbar-main');
			$this->template->load('main', 'validasi/index', $data);
		} else {
			redirect('beranda-main');
		}
	}

	/**
	 * Load Page Update
	 * @return [type] [description]
	 */
	function validasimhs(){
		$NIM = $_POST['nim'];
		$list = $this->validasi_model->getJadwalPembukaan();
		foreach ($list as $row){
			$perio = $row->PERIODE_JADWAL_PEMBUKAAN;
			$th = $row->TAHUN_JADWAL_PEMBUKAAN;
			$condition = array('NIM_PESERTA' => $NIM, 'PERIODE_PESERTA' => $perio, 'THNPELAKSANAAN_PESERTA' => $th);
		}
		
		$data = $this->_get_doc();
		$res = $this->validasi_model->update($condition, $data);

		if($res) {
			$this->session->set_flashdata('message_success', "Berhasil memvalidasi data peserta");
		} else {
			$this->session->set_flashdata('message_danger', "Gagal memvalidasi data");	
		}

		redirect('validasi');
	}


	// function validasimhs(){
		// if (!empty($_POST['kode'])) {
		    // Counting number of checked checkboxes.
		    // $checked_count = count($_POST['kode']);
		    // echo "You have selected ".$checked_count.
		    // "<br>";

		    // $data = array();
		    // foreach($_POST['kode'] as $chores_key => $chores) {
		    // 	$data[] = array(
		    // 		'NIM_PESERTA' => $_POST['NIM_PESERTA'][$chores_key],
		    // 		'PRAK_PESERTA' => $_POST['PRAK_PESERTA'][$chores_key],
		    // 		'PERIODE_PESERTA' => $_POST['PERIODE_PESERTA'][$chores_key],
		    // 		'THNPELAKSANAAN_PESERTA' => $_POST['THNPELAKSANAAN_PESERTA'][$chores_key],
		    // 		'KETERANGAN_PESERTA' => 'peserta',
		    // 	);
		    	// echo "<br /><pre>";
		    	// print_r($data);
		    	// echo var_dump($data);	
		    	// echo "<pre>";	  

		    	// $where = array(
		    	// 	'NIM_PESERTA' => $_POST['NIM_PESERTA'][$chores_key],
		    	// 	'PRAK_PESERTA' => $_POST['PRAK_PESERTA'][$chores_key],
		    	// 	'PERIODE_PESERTA' => $_POST['PERIODE_PESERTA'][$chores_key],
		    	// 	'THNPELAKSANAAN_PESERTA' => $_POST['THNPELAKSANAAN_PESERTA'][$chores_key],
		    	// );
				// $this->db->where($where);
				// $this->db->query('UPDATE peserta SET data="'.$data.'" WHERE where id IN('.$where.')'); 
				// $this->db->where('NIM_PESERTA', $_POST['NIM_PESERTA'][$chores_key]);
				// $this->db->where('PRAK_PESERTA', $_POST['PRAK_PESERTA'][$chores_key]);
				// $this->db->where('PERIODE_PESERTA', $_POST['PERIODE_PESERTA'][$chores_key]);
				// $this->db->where('THNPELAKSANAAN_PESERTA', $_POST['THNPELAKSANAAN_PESERTA'][$chores_key]);
		  //   	$this->db->update('peserta', $data);
		   // }

		   // foreach($_POST['kode'] as $chores_key) {
			  //  	// $data = array(
			  //  		'NIM_PESERTA' => $_POST['NIM_PESERTA'],
			  //  		'PRAK_PESERTA' => $_POST['PRAK_PESERTA'],
			  //  		'PERIODE_PESERTA' => $_POST['PERIODE_PESERTA'],
			  //  		'THNPELAKSANAAN_PESERTA' => $_POST['THNPELAKSANAAN_PESERTA'],
			  //  		'KETERANGAN_PESERTA' => 'peserta',
			  //  	// );
			  //  	echo "<br /><pre>";
			  //  	print_r($data);
			  //   	// echo var_dump($data);	
			  //  	echo "<pre>";	
		   // }
		   	// $res = $this->db->insert_batch('peserta', $data, 'NIM_PESERTA');
		   	// $this->db->query('UPDATE peserta SET data="'.$data.'" WHERE where id IN('.$where.')'); 

		    // $res = $this->validasi_model->update($data);

		    // if ($res) {
		    //     $this->session->set_flashdata('message_success', "Kriteria berhasil ditambahkan");
		    // } else {
		    //     $this->session->set_flashdata('message_danger', "Kriteria gagal ditambahkan");
		    // }

		    // redirect('validasi');
	// 	} else {
	// 	    echo "<b>Please Select Atleast One Option.</b>";
	// 	    $this->session->set_flashdata('message_danger', "System Error");
	// 	    redirect('validasi');
	// 	}
	// }



	// function get_data()
	// {
	// 	$list = $this->validasi_model->get_datatables();
	// 	$data = array();
	// 	$no = $_POST['start'];
	// 	foreach ($list as $field) {
	// 		$no++;
	// 		$row = array();
	// 		$row[] = $no;
	// 		$row[] = $field->NIM_PESERTA;
	// 		$row[] = ucwords($field->NAMA_TBUSER);
	// 		if ($field->NIM_PESERTA === '11043179') {
	// 			$row[] =  "Rp. ".number_format('210000',0,',','.');
	// 		}else{
	// 			$row[] =  "Rp. ".number_format($field->BIAYA_PRAKTIKUM,0,',','.');
	// 		}
	// 		// $row[] = "Rp. ".number_format($field->BIAYA_PRAKTIKUM,0,',','.');
	// 		if ($field->KETERANGAN_PESERTA === 'mendaftar') {
	// 			$row[] =  '<p class="text-danger">Belum</p>';
	// 		}else{
	// 			$row[] =  '<p class="text-success">Sudah</p>';
	// 		}
	// 		// $row[] = "Rp. ".number_format($field->BIAYA_PRAKTIKUM,0,',','.');
	// 		$row[] = '<div class="dropdown-default dropdown open">
	// 				    <button class="btn btn-default dropdown-toggle waves-effect waves-light btn-mini" type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="ti-view-list-alt"></i></button>
	// 				    <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
	// 				        <a class="dropdown-item waves-light waves-effect" href="javascript:void(0)" onclick="edit_person('."'".$field->ID_PESERTA."'".')"><i class="ti-pencil-alt"> Ubah</i></a>
	// 				        <a class="dropdown-item waves-light waves-effect" href="javascript:void(0)" onclick="delete_person('."'".$field->ID_PESERTA."'".')"><i class="ti-brush-alt"> Hapus</i></a>
	// 				    </div>
	// 				</div>';

	// 		$data[] = $row;
	// 	}

	// 	$output = array(
	// 		"draw" => $_POST['draw'],
	// 		"recordsTotal" => $this->validasi_model->count_all(),
	// 		"recordsFiltered" => $this->validasi_model->count_filtered(),
	// 		"data" => $data,
	// 	);
	// 	//output dalam format JSON
	// 	echo json_encode($output);
	// }

	// public function ajax_edit($id)
 //    {
 //        $data = $this->validasi_model->get_by_id($id);
 //        echo json_encode($data);
 //    }

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
