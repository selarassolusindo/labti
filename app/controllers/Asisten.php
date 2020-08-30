<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asisten extends CI_Controller {

	
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
				'NIM_TBUSER' => $this->input->post('NIM_TBUSER'),
				'NAMA_TBUSER' => $this->input->post('NAMA_TBUSER'),
				'GELAR_DEPAN_TBUSER' => $this->input->post('GELAR_DEPAN_TBUSER'),
				'GELAR_TBUSER' => $this->input->post('GELAR_TBUSER'),
				'JENISKELAMIN_TBUSER' => $this->input->post('JENISKELAMIN_TBUSER'),
				'NOTELP_TBUSER' => $this->input->post('NOTELP_TBUSER'),
				'EMAIL_TBUSER' => $this->input->post('EMAIL_TBUSER'),
				'FOTO_TBUSER' => $this->input->post('picture'),
				'PASSWORD_TBUSER' => md5($this->input->post('NIM_TBUSER')),
				'LEVEL_TBUSER' => 'dosen',
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

			$this->template->set_navbar('templates/navbar-main');
			$this->template->load('main', 'asisten/index', $data);
		} else {
			redirect('beranda-main');
		}
	}

	function get_data()
	{
		$list = $this->master_model->get_datatables_asisten();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->NIM_TBUSER;
			$row[] = strtoupper($field->NAMA_TBUSER);			
			$row[] = ucwords($field->JENISKELAMIN_TBUSER);
			$row[] = ucwords($field->KELAS_TBUSER);
			$row[] = '<div class="dropdown-default dropdown open">
					    <button class="btn btn-default dropdown-toggle waves-effect waves-light btn-mini" type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" disabled><i class="ti-view-list-alt"></i></button>
					    <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
					        <a class="dropdown-item waves-light waves-effect" href="javascript:void(0)" onclick="edit_person('."'".$field->ID_TBUSER."'".')"><i class="ti-pencil-alt"> Ubah</i></a>
					        <a class="dropdown-item waves-light waves-effect" href="javascript:void(0)" onclick="delete_person('."'".$field->ID_TBUSER."'".')"><i class="ti-brush-alt"> Hapus</i></a>
					    </div>
					</div>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->master_model->count_all_asisten(),
			"recordsFiltered" => $this->master_model->count_filtered_asisten(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	public function ajax_edit($id)
    {
        $data = $this->master_model->get_by_id_asisten($id);
        echo json_encode($data);
    }

    public function insert()
	{
		$data = $this->_get_doc();
		$this->master_model->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function update()
	{	
		// $input = "picture";
		// $result = $this->upload_image($input);
		$data = $this->_get_doc();
		// $file = $result['data'];
		// $data['FOTO_TBUSER'] = $file['file_name'];
		$this->master_model->update(array('ID_TBUSER' => $this->input->post('ID_TBUSER')), $data);

		echo json_encode(array("status" => TRUE));
		
	}

	public function delete($id)
	{		
		$this->master_model->delete($id);
		echo json_encode(array("status" => TRUE));
	}

	public function upload_image($input)
	{
		$config['upload_path']          = './uploads/picture';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['max_size']             = 1000;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload($input))
		{
			$error = $this->upload->display_errors();

			$data  =array(
				'status' => FALSE,
				'message' => $error
			);

			return $data;
		}
		else
		{
			$data = $this->upload->data();

			$data = array(
				'status' => TRUE,
				'message' => "Successfully upload Image",
				'data' => $data 
			);	

			return $data;
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
