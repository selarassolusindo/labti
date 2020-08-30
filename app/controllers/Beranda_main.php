<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda_main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');

		//check authentication
		$this->auth();
	}

	/**
	 * Load Page Index
	 * @return [type] [description]
	 */
	public function index()
	{	
		$id = $this->session->userdata('nim');
		if($id) {
			$condition = array('NIM_TBUSER'=> $id);
			$data['users'] = $this->info_model->get_user($id);
			$data['getJadwalPembukaan'] = $this->daftar_model->getJadwalPembukaan();
			$data['getMemberTraffic'] = $this->userlog_model->get_traffic();
			$getJadwalPembukaan = $this->daftar_model->getJadwalPembukaan();
			foreach ($getJadwalPembukaan as $field) {
				$no = $field->NO_JADWAL_PEMBUKAAN;
			}
			$data['praktikum']= $this->pembukaan_praktikum_model->get_open_prak_by($no);

			$this->template->set_navbar('templates/navbar-main');
			$this->template->load('main', 'depan/index', $data);
		} else {
			$this->session->set_flashdata('message_danger', "System Error");
			redirect('depan');
		}	
	}

	/**
	 * Get authentication
	 * @return [type] [description]
	 */
	private function auth()
	{
		if($this->session->userdata('is_logged_in'))
		{
			return TRUE;
		} else {
			redirect('beranda');
		}
	}
}
