<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('berita_model');
		$this->load->helper('text'); 

		//check authentication
		$this->auth();
	}

	/**
	 * Load Page Login
	 * @return [type] [description]
	 */
	public function index()
	{	
		$data['desc']=$this->berita_model->tampildesc();
		$data['data']=$this->berita_model->tampilasc();
		if($this->session->userdata('is_logged_in'))
		{
			redirect('depan');
		} else 
		{
			
			$this->template->set_navbar('templates/navbar');
			$this->template->load('front', 'beranda/index', $data);
		}
	}

	public function selanjutnya()
	{
		$id=$this->uri->segment(3);
		$data['data2']=$this->berita_model->per_id($id);
		$data['datalatest']=$this->berita_model->tampilasc();
		// $this->load->view('selanjutnya',$data);
		$this->template->set_navbar('templates/navbar');
		$this->template->load('front', 'beranda/selanjutnya', $data);
	}

	public function error()
	{
		$this->template->set_navbar('templates/navbar');
		$this->template->load('front', 'errors/error_404');	
	}

	/**
	 * Action to validate and process input to login
	 * @return [type] [description]
	 */
	public function login()
	{
		$data['data']=$this->berita_model->tampil();
		if($this->form_validation->run() == FALSE)
		{	

			$this->template->set_navbar('templates/navbar');
			$this->template->load('front', 'beranda/index');
		} else 
		{
			redirect('depan');
		}
	}

	private function auth()
	{
		if($this->session->userdata('is_logged_in'))
		{
			redirect('beranda-main');
		}
	}
}
