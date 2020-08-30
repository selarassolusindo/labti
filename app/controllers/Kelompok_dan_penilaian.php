<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelompok_dan_penilaian extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		// $this->load->helper('text'); 
		
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
		if($this->session->userdata('level') == "admin")
		{	
			$condition = array('NIM_TBUSER'=> $id);
			$data['users'] = $this->info_model->get_user($id);
			$data['models'] = $this->jadwal_model->get_all_with_relation();

			$this->template->set_navbar('templates/navbar-main');
			$this->template->load('main', 'keldanpen/index', $data);
		} else {
			redirect('beranda-main');
		}
	}

	function get_data()
	{
		$list = $this->kelompok_dan_penilaian_model->_get_datatables_query();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->PRAKTIKUM_JADWAL_PRAKTIKUM;
			$row[] = strtoupper($field->NAMA_PRAKTIKUM);
			$row[] = '<p class="text-primary m-b-0">Dosen</p>'
						.$field->DOSEN_PAGI_JADWAL_PRAKTIKUM.
                     '<p class="text-primary m-b-0">Asisten</p>'
                     	.$field->ASISTEN_PAGI_JADWAL_PRAKTIKUM.
                     '<p class="text-danger m-b-0">Jadwal Pelaksanaan</p>'
                     	.$field->PELAKSANAAN_PAGI_JADWAL_PRAKTIKUM;
			$row[] = '<p class="text-primary m-b-0">Dosen</p>'
						.$field->DOSEN_SORE_JADWAL_PRAKTIKUM.
                     '<p class="text-primary m-b-0">Asisten</p>'
                     	.$field->ASISTEN_SORE_JADWAL_PRAKTIKUM.
                     '<p class="text-danger m-b-0">Jadwal Pelaksanaan</p>'
                     	.$field->PELAKSANAAN_SORE_JADWAL_PRAKTIKUM;
			$row[] = '<div class="dropdown-default dropdown open">
					    <button class="btn btn-default dropdown-toggle waves-effect waves-light btn-mini" type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="ti-view-list-alt"></i></button>
					    <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
					        <a class="dropdown-item waves-light waves-effect" href="javascript:void(0)" onclick="edit_person('."'".$field->NO_JADWAL_PRAKTIKUM."'".')"><i class="ti-pencil-alt"> Ubah</i></a>
					        <a class="dropdown-item waves-light waves-effect" href="javascript:void(0)" onclick="delete_person('."'".$field->NO_JADWAL_PRAKTIKUM."'".')"><i class="ti-brush-alt"> Hapus</i></a>
					    </div>
					</div>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->kelompok_dan_penilaian_model->count_all(),
			"recordsFiltered" => $this->kelompok_dan_penilaian_model->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
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
