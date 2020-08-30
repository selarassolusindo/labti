<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
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
			$data['models'] = $this->jadwal_model->get_all_with_relation();

			$this->template->set_navbar('templates/navbar-main');
			$this->template->load('main', 'pesan/index', $data);
		} else {
			$this->session->set_flashdata('message_danger', "System Error");
			redirect('depan');
		}	
	}

	/**
	 * Load Page Login
	 * @return [type] [description]
	 */
	public function pesan_terkirim()
	{	
		$id = $this->session->userdata('nim');
		if($id) {
			$condition = array('NIM_TBUSER'=> $id);
			$data['users'] = $this->info_model->get_user($id);
			$data['models'] = $this->jadwal_model->get_all_with_relation();

			$this->template->set_navbar('templates/navbar-main');
			$this->template->load('main', 'pesan/pesan_terkirim', $data);
		} else {
			$this->session->set_flashdata('message_danger', "System Error");
			redirect('depan');
		}	
	}

	/**
	 * Load Page Login
	 * @return [type] [description]
	 */
	public function pesan_masuk()
	{	
		$id = $this->session->userdata('nim');
		if($id) {
			$condition = array('NIM_TBUSER'=> $id);
			$data['users'] = $this->info_model->get_user($id);
			$data['models'] = $this->jadwal_model->get_all_with_relation();

			$this->template->set_navbar('templates/navbar-main');
			$this->template->load('main', 'pesan/pesan_masuk', $data);
		} else {
			$this->session->set_flashdata('message_danger', "System Error");
			redirect('depan');
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
