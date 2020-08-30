<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	
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
			'KELAS_TBUSER' => $this->input->post('KELAS_TBUSER'),
			'JENISKELAMIN_TBUSER' => $this->input->post('JENISKELAMIN_TBUSER'),
			'NOTELP_TBUSER' => $this->input->post('NOTELP_TBUSER'),
			'EMAIL_TBUSER' => $this->input->post('EMAIL_TBUSER'),
		);

		return $data;
	}

	/**
	 * get doc values from input form
	 * @return [type] [description]
	 */
	public function _get_doc_pw()
	{
		$data = array(
			'PASSWORD_TBUSER' => md5($this->input->post('ULANGI_PASSWORD_TBUSER')),
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
			$data['models'] = $this->profil_model->get_all_by_id($id);	
			$data['users'] = $this->info_model->get_user($id);

			$control = $this->router->fetch_class();
			$method = $this->router->fetch_method();
			helper_log("/".$control."/".$method);

			$this->template->set_navbar('templates/navbar-main');
			$this->template->load('main', 'profil/index', $data);
		} else {
			$this->session->set_flashdata('message_danger', "System Error");
			redirect('depan');
		}	
	}

	/**
	 * Load Page Update
	 * @return [type] [description]
	 */
	public function update($id)
	{	
		$id = $this->session->userdata('nim');
		if($id) {

			$condition = array('NIM_TBUSER' => $id);
			$data['models'] = $this->profil_model->get_all_by_id($id);
			$data['users'] = $this->info_model->get_user($id);
			$this->template->set_navbar('templates/navbar-main');

			$this->_set_validation();

			if($this->form_validation->run() == FALSE)
			{
				//if error
				$this->template->load('main', 'profil/index', $data);			
			}
			else 
			{
				//if success
				$input = "picture";
				if ($_FILES['picture']['error'] == 5)
				{
					$data = $this->_get_doc();

					$res = $this->profil_model->update($condition, $data);
					
					if($res) {
						$this->session->set_flashdata('message_success', "Profil berhasil di Simpan");
					} else {
						$this->session->set_flashdata('message_danger', "Failed updating data");	
					}

					redirect('profil');	
					
				} else 
				{
					$result = $this->upload_image($input);

					if($result['status'] == FALSE)
					{
						$this->session->set_flashdata('message_danger', $result['message']);						
						$this->template->load('main', 'profil/index', $data);
					} else {
						$file = $result['data'];
						$data = $this->_get_doc();
						$data['FOTO_TBUSER'] = $file['file_name'];

						$res = $this->profil_model->update($condition, $data);

						if($res) {
							$this->session->set_flashdata('message_success', "Profil berhasil di Simpan");
						} else {
							$this->session->set_flashdata('message_danger', "");	
						}

						redirect('profil');
					}
				}
				
			}	
		} else {
			$this->session->set_flashdata('message_danger', "System Error");
			redirect('profil');
		}
	}


	/**
	 * Action to validate and process input to login
	 * @return [type] [description]
	 */
	public function password()
	{	
		$control = $this->router->fetch_class();
		$method = $this->router->fetch_method();
		helper_log("/".$control."/".$method);

		$this->_set_validation();

		$id = $this->session->userdata('nim');
		if($id) {
			$condition = array('NIM_TBUSER'=> $id);
			$data['models'] = $this->profil_model->get_all_by_id($id);	
			$data['users'] = $this->info_model->get_user($id);
			if($this->form_validation->run() == FALSE)
			{	
				$this->template->set_navbar('templates/navbar-main');
				$this->template->load('main', 'user/ganti_password', $data);
			} else 
			{
				redirect('user/ganti-password');
			}
		} else {
			$this->session->set_flashdata('message_danger', "System Error");
			redirect('depan');
		}			
	}

	/**
	 * Load Page Update PASSWORD
	 * @return [type] [description]
	 */
	public function update_password($id)
	{
		$id = $this->session->userdata('nim');
		if($id) {			
			$condition = array('NIM_TBUSER'=> $id);
			$data['models'] = $this->profil_model->get_all_by_id($id);	
			$data['users'] = $this->info_model->get_user($id);
			$cekuser = $this->profil_model->get_password_by_id($id);	

			$this->_set_validation_pw();

				if($this->form_validation->run() == FALSE)
				{
					// $this->template->set_navbar('templates/navbar-main');
					// $this->template->load('main', 'user/ganti_password', $data);
					if (form_error('PASSWORD_TBUSER')) {
		                $this->session->set_flashdata('message_error',form_error('PASSWORD_TBUSER'));
		            }
		            if (form_error('BARU_PASSWORD_TBUSER')) {
		                $this->session->set_flashdata('message_error',form_error('BARU_PASSWORD_TBUSER'));
		            }
		            if (form_error('ULANGI_PASSWORD_TBUSER')) {
		                $this->session->set_flashdata('message_error',form_error('ULANGI_PASSWORD_TBUSER'));
		            }

		            // Redirect to the contact section
					redirect('ubah-password'); 

				}else {	
					foreach ($cekuser as $row){
						if ($row->PASSWORD_TBUSER != md5($this->input->post('PASSWORD_TBUSER'))) {
							$this->session->set_flashdata('message_danger', "Kata Sandi Lama Salah");
							redirect('ubah-password');
						} else {
							$data = $this->_get_doc_pw();
							$res = $this->profil_model->update($condition, $data);
							if($res) {
								$this->session->set_flashdata('message_success', "Kata Sandi Berhasil di Ubah");
							} else {
								$this->session->set_flashdata('message_danger', "Kata Sandi Gagal di Ubah");	
								redirect('ubah-password');
							}
						}
						// redirect(site_url('profil/password'), 'refresh');
						redirect('profil/password');
					}
				}	
		} else {
			$this->session->set_flashdata('message_danger', "System Error");
			redirect('depan');
		}
	}

	/**
	 * Set validation form 
	 */
	private function _set_validation_pw()
	{
		$config = array(
	        array(
	                'field' => 'PASSWORD_TBUSER',
	                'label' => 'Password Lama',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'BARU_PASSWORD_TBUSER',
	                'label' => 'Password Baru',
	                'rules' => 'required|min_length[8]',
	        ),
	        array(
	                'field' => 'ULANGI_PASSWORD_TBUSER',
	                'label' => 'Ulangi Password Baru',
	                'rules' => 'required|matches[BARU_PASSWORD_TBUSER]',
	        )
		);

		$this->form_validation->set_rules($config);
	}

	/**
	 * Set validation form 
	 */
	private function _set_validation()
	{
		$config = array(
	        array(
	                'field' => 'NIM_TBUSER',
	                'label' => 'NIM',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'NAMA_TBUSER',
	                'label' => 'NAMA',
	                'rules' => 'required',
	        ),
	        array(
	                'field' => 'KELAS_TBUSER',
	                'label' => 'Kelas',
	                'rules' => 'required',
	        ),
	        array(
	                'field' => 'JENISKELAMIN_TBUSER',
	                'label' => 'Jenis Kelamin',
	                'rules' => 'required',
	        ),
	        array(
	                'field' => 'NOTELP_TBUSER',
	                'label' => 'NO HP / WA',
	                'rules' => 'required|min_length[10]|max_length[12]numeric',
	        ),
	        array(
	                'field' => 'EMAIL_TBUSER',
	                'label' => 'Email',
	                'rules' => 'required|valid_email',
	        )
		);

		$this->form_validation->set_rules($config);
	}

	/**
	 * Action to upload Image
	 * @param  [type] $input [description]
	 * @return [type]        [description]
	 */
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
