<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

	
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
				'JUDUL_BERITA' => $this->input->post('JUDUL_BERITA'),
				'ISI_BERITA' => $this->input->post('ISI_BERITA'),
				'ISIHTML_BERITA' => nl2br($this->input->post('ISI_BERITA')),
				'TANGGAL_BERITA' => $this->input->post('TANGGAL_BERITA'),
		);

		return $data;
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

			$this->template->set_navbar('templates/navbar-main');
			$this->template->load('main', 'pengumuman/index', $data);
		} else {
			$this->session->set_flashdata('message_danger', "System Error");
			redirect('depan');
		}	
	}

	function get_data()
	{
		$list = $this->berita_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = strtoupper($field->JUDUL_BERITA);
			// $row[] = $field->ISI_BERITA;
			$row[] = date("d/m/Y", strtotime($field->TANGGAL_BERITA));
			$row[] = '<div class="dropdown-default dropdown open">
					    <button class="btn btn-default dropdown-toggle waves-effect waves-light btn-mini" type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="ti-view-list-alt"></i></button>
					    <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
					        <a class="dropdown-item waves-light waves-effect" href="javascript:void(0)" onclick="edit_person('."'".$field->ID_BERITA."'".')"><i class="ti-pencil-alt"> Ubah</i></a>
					        <a class="dropdown-item waves-light waves-effect" href="javascript:void(0)" onclick="delete_person('."'".$field->ID_BERITA."'".')"><i class="ti-brush-alt"> Hapus</i></a>
					    </div>
					</div>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->berita_model->count_all(),
			"recordsFiltered" => $this->berita_model->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	/**
	 * Load Page Insert
	 * @return [type] [description]
	 */
    public function insert()
	{
		$data = $this->_get_doc();
		$this->berita_model->save($data);
		echo json_encode(array("status" => TRUE));
	}

    /**
	 * Load Page Edit
	 * @return [type] [description]
	 */
	public function ajax_edit($id)
    {
        $data = $this->berita_model->get_by_id($id);
        echo json_encode($data);
    }

	/**
	 * Load Page Update
	 * @return [type] [description]
	 */
	public function update()
	{	
		$data = $this->_get_doc();
		$this->berita_model->update(array('ID_BERITA' => $this->input->post('ID_BERITA')), $data);

		echo json_encode(array("status" => TRUE));
	}

	/**
	 * Load Page Delete
	 * @return [type] [description]
	 */
	public function delete($id)
	{		
		$this->berita_model->delete($id);
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
