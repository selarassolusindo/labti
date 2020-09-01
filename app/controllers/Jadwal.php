<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {


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
			'PRAKTIKUM_JADWAL_PRAKTIKUM' => $this->input->post('PRAKTIKUM_JADWAL_PRAKTIKUM'),
			'DOSEN_PAGI_JADWAL_PRAKTIKUM' => $this->input->post('DOSEN_PAGI_JADWAL_PRAKTIKUM'),
			'ASISTEN_PAGI_JADWAL_PRAKTIKUM' =>  $this->input->post('ASISTEN_PAGI_JADWAL_PRAKTIKUM'),
			'PELAKSANAAN_PAGI_JADWAL_PRAKTIKUM' => $this->input->post('PELAKSANAAN_PAGI_JADWAL_PRAKTIKUM'),
			'DOSEN_SORE_JADWAL_PRAKTIKUM' =>  $this->input->post('DOSEN_SORE_JADWAL_PRAKTIKUM'),
			'ASISTEN_SORE_JADWAL_PRAKTIKUM' =>  $this->input->post('ASISTEN_SORE_JADWAL_PRAKTIKUM'),
			'PELAKSANAAN_SORE_JADWAL_PRAKTIKUM' => $this->input->post('PELAKSANAAN_SORE_JADWAL_PRAKTIKUM'),
			'IDPERIODE_JADWAL_PRAKTIKUM' => $this->input->post('PERIODE_JADWAL_PRAKTIKUM'),
			'PERIODE_JADWAL_PRAKTIKUM' => 'Periode 4',
			'KELOMPOK_JADWAL_PRAKTIKUM' => $this->input->post('KELOMPOK_JADWAL_PRAKTIKUM'),
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
		if($id) {
			$condition = array('NIM_TBUSER'=> $id);
			$data['users'] = $this->info_model->get_user($id);
			$data['models'] = $this->jadwal_model->get_all_with_relation();

			$this->template->set_navbar('templates/navbar-main');
			$this->template->load('main', 'jadwal/index', $data);
		} else {
			$this->session->set_flashdata('message_danger', "System Error");
			redirect('depan');
		}
	}

	/**
	 * Load Page Login
	 * @return [type] [description]
	 */
	public function index_main()
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
			$data['dosen'] = $this->jadwal_model->get_dosen();
			$data['dosensore'] = $this->jadwal_model->get_dosen_sore();
			$data['asisten'] = $this->jadwal_model->get_asisten();
			$data['periode'] = $this->jadwal_model->get_periode();
			$data['praktikum'] = $this->jadwal_model->get_praktikum();

			$this->template->set_navbar('templates/navbar-main');
			$this->template->load('main', 'jadwal/index-main', $data);
		} else {
			redirect('beranda-main');
		}
	}

	function get_data()
	{
		$list = $this->jadwal_model->get_datatables();
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
			$row[] = '<div class="dropdown-default dropdown open" >
					    <button class="btn btn-default dropdown-toggle waves-effect waves-light btn-mini" type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="ti-view-list-alt" ></i></button>
					    <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
					        <a class="dropdown-item waves-light waves-effect" href="javascript:void(0)" onclick="edit_person('."'".$field->NO_JADWAL_PRAKTIKUM."'".')"><i class="ti-pencil-alt"></i>Ubah</a>
					        <a class="dropdown-item waves-light waves-effect" href="javascript:void(0)" onclick="delete_person('."'".$field->NO_JADWAL_PRAKTIKUM."'".')" ><i class="ti-brush-alt"></i>Hapus</a>
					    </div>
					</div>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->jadwal_model->count_all(),
			"recordsFiltered" => $this->jadwal_model->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	public function insert()
	{
		$data = $this->_get_doc();
		$this->jadwal_model->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_edit($id)
    {
        $data = $this->jadwal_model->get_by_id($id);
        echo json_encode($data);
    }

    public function update()
	{
		// $input = "picture";
		// $result = $this->upload_image($input);
		$data = $this->_get_doc();
		// $file = $result['data'];
		// $data['FOTO_TBUSER'] = $file['file_name'];
		$this->jadwal_model->update(array('NO_JADWAL_PRAKTIKUM' => $this->input->post('NO_JADWAL_PRAKTIKUM')), $data);

		echo json_encode(array("status" => TRUE));

	}

	public function delete($id)
	{
		$this->jadwal_model->delete($id);
		echo json_encode(array("status" => TRUE));
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
