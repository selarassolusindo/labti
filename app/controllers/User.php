<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		
	}

	/**
	 * Load Page Login
	 * @return [type] [description]
	 */
	public function index()
	{
		if($this->session->userdata('is_logged_in'))
		{
			redirect('beranda-main');
		} else 
		{
			$this->template->load('login', 'user/login');
		}
	}

	/**
	 * Action to validate and process input to login
	 * @return [type] [description]
	 */
	public function daftar()
	{
		if($this->session->userdata('is_logged_in'))
		{
			redirect('beranda-main');
		} else 
		{
			$this->template->load('login', 'user/daftar');
		}
	}


	/**
	 * Action to validate and process input to login
	 * @return [type] [description]
	 */
	public function login()
	{
		$this->_set_validation();

		if($this->form_validation->run() == FALSE)
		{
			$this->template->load('login', 'user/login');
		} else 
		{	

			$control = $this->router->fetch_class();
			$method = $this->router->fetch_method();
			helper_log("/".$control."/".$method);

			redirect('beranda-main');			
		}
	}

	/**
	 * Action to process logout
	 * @return [type] [description]
	 */
	public function logout()
	{
		$userdata = array('is_logged_in', 'userId', 'username', 'level');

		$control = $this->router->fetch_class();
		$method = $this->router->fetch_method();
		helper_log("/".$control."/".$method);
		
		$this->session->unset_userdata($userdata);

		
		redirect('user');
	}

	/**
	 * Set validation form 
	 */
	private function _set_validation_gntpassword()
	{
		$config = array(
	        array(
	                'field' => 'password',
	                'label' => 'Password',
	                'rules' => 'required',
	        ),
	        array(
	                'field' => 'ulangi_password',
	                'label' => 'Ulangi Password',
	                'rules' => 'required|matches[password]',
	        ),
		);

		$this->form_validation->set_rules($config);
	}

	/**
	 * Set validation form 
	 */
	private function _set_validation_tambah_user()
	{
		$this->load->library('form_validation');

		$config = array(
	        array(
	                'field' => 'nim',
	                'label' => 'NIM',
	                'errors' => array(
                        'required' => 'Invalid nim or password',
                	),
	        ),
	        array(
	                'field' => 'username',
	                'label' => 'NAMA LENGKAP',
	                'rules' => 'required',
	        ),
	        array(
	                'field' => 'class',
	                'label' => 'KELAS',
	                'rules' => 'required',
	        ),
	        array(
	                'field' => 'password',
	                'label' => 'PASSWORD',
	                'rules' => 'required',
	        ),
	        array(
	                'field' => 'retypepassword',
	                'label' => 'ULANGI PASSWORD',
	                'rules' => 'required',
	        ),
		);

		$this->form_validation->set_rules($config);
	}

	/**
	 * Set validation form 
	 */
	private function _set_validation()
	{
		$this->load->library('form_validation');

		$config = array(
	        array(
	                'field' => 'username',
	                'label' => 'NIM',
	                'errors' => array(
                        'required' => 'Invalid username or password',
                	),
	        ),
	        array(
	                'field' => 'password',
	                'label' => 'Password',
	                'rules' => 'required|callback_check_auth',
	        ),
		);

		$this->form_validation->set_rules($config);
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
		$username = $this->input->post('username', TRUE);

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
				'id' => $result->ID_TBUSER,
				'nim' => $result->NIM_TBUSER,
				'username' => $result->NAMA_TBUSER,
				'kelas' => $result->KELAS_TBUSER,
				'jeniskelamin' => $result->JENISKELAMIN_TBUSER,
				'notelp' => $result->NOTELP_TBUSER,
				'email' => $result->EMAIL_TBUSER,
				'foto' => $result->FOTO_TBUSER,
				'level' => $result->LEVEL_TBUSER
			);

			$this->session->set_userdata($userdata);
			return TRUE;
		}
	}
}
