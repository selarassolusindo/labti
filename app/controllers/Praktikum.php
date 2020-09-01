<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Praktikum extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		// $this->load->helper('text');
	}

	/**
	 * Load Page Login
	 * @return [type] [description]
	 */
	public function index()
	{
		$data['models']=$this->praktikum_model->tampil();
		if($this->session->userdata('is_logged_in'))
		{
			redirect('depan');
		} else
		{

			$this->template->set_navbar('templates/navbar');
			$this->template->load('front', 'praktikum/index',$data);
		}
	}

	public function index_prak()
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
			$this->template->load('main', 'praktikum/index-main', $data);
		} else {
			redirect('beranda-main');
		}
	}

	function get_data()
	{
		$list = $this->praktikum_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->KODE_PRAKTIKUM;
			$row[] = strtoupper($field->NAMA_PRAKTIKUM);
			$row[] = $field->SMST_PRAKTIKUM;
			$row[] = "Rp. ".number_format($field->BIAYA_PRAKTIKUM,0,',','.');
			$row[] = '<div class="dropdown-default dropdown open">
					    <button class="btn btn-default dropdown-toggle waves-effect waves-light btn-mini" type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="ti-view-list-alt"></i></button>
					    <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
					        <a class="dropdown-item waves-light waves-effect" href="javascript:void(0)" onclick="edit_person('."'".$field->ID_PRAKTIKUM."'".')"><i class="ti-pencil-alt"></i>Ubah</a>
					        <a class="dropdown-item waves-light waves-effect" href="javascript:void(0)" onclick="delete_person('."'".$field->ID_PRAKTIKUM."'".')"><i class="ti-brush-alt"></i>Hapus</a>
					    </div>
					</div>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->praktikum_model->count_all(),
			"recordsFiltered" => $this->praktikum_model->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	public function ajax_edit($id)
    {
        $data = $this->praktikum_model->get_by_id($id);
        echo json_encode($data);
    }

    public function insert()
	{
		$data = array(
				'KODE_PRAKTIKUM' => $this->input->post('KODE_PRAKTIKUM'),
				'NAMA_PRAKTIKUM' => $this->input->post('NAMA_PRAKTIKUM'),
				'SMST_PRAKTIKUM' => $this->input->post('SMST_PRAKTIKUM'),
				'BIAYA_PRAKTIKUM' => $this->input->post('BIAYA_PRAKTIKUM'),
			);

		$res = $this->praktikum_model->save($data);

		if ($res) {
		    $this->session->set_flashdata('message_success', 'Data Praktikum berhasil ditambahkan');
		} else {
		    $this->session->set_flashdata('message_danger', "Data Praktikum gagal ditambahkan");
		}

		echo json_encode(array("status" => TRUE));
	}

	public function update()
	{
		$data = array(
				'KODE_PRAKTIKUM' => $this->input->post('KODE_PRAKTIKUM'),
				'NAMA_PRAKTIKUM' => $this->input->post('NAMA_PRAKTIKUM'),
				'SMST_PRAKTIKUM' => $this->input->post('SMST_PRAKTIKUM'),
				'BIAYA_PRAKTIKUM' => $this->input->post('BIAYA_PRAKTIKUM'),
			);

		$res = $this->praktikum_model->update(array('ID_PRAKTIKUM' => $this->input->post('ID_PRAKTIKUM')), $data);

		if ($res) {
		    $this->session->set_flashdata('message_success', 'Data Praktikum berhasil diubah');
		} else {
		    $this->session->set_flashdata('message_danger', "Data Praktikum gagal diubah");
		}

		echo json_encode(array("status" => TRUE));
	}

	public function delete($id)
	{
		$res = $this->praktikum_model->delete($id);

		if ($res) {
		    $this->session->set_flashdata('message_success', 'Data Praktikum berhasil Dihapus');
		} else {
		    $this->session->set_flashdata('message_danger', "Data Praktikum gagal Dihapus");
		}
		echo json_encode(array("status" => TRUE));
	}

	/**
	 * check whether username or password match with record in table user
	 * @param  [type] $password [description]
	 * @return [type]           [description]
	 */
	public function check_auth($password)
	{
		//load model
		$this->load->model('user_model');

		//get username from input
		$username = $this->input->post('username');

		//check username and password
		$result = $this->user_model->auth($username, $password);

		if($result === FALSE)
		{
			//username and password not match or invalid, set message error validation
			$this->form_validation->set_message('check_auth', 'Invalid username or password');
            return FALSE;
		} else
		{
			//username and password match, return user data
			$userdata = array(
				'is_logged_in' => TRUE,
				'userId' => $result->id,
				'username' => $result->username,
				'level' => $result->level
			);

			$this->session->set_userdata($userdata);
			return TRUE;
		}
	}
}
