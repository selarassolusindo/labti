<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembukaan_praktikum extends CI_Controller {


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
				'TAHUN_JADWAL_PEMBUKAAN' => $this->input->post('TAHUN_JADWAL_PEMBUKAAN'),
				'PERIODE_JADWAL_PEMBUKAAN' => $this->input->post('PERIODE_JADWAL_PEMBUKAAN'),
				'TAHUN_AJARAN_JADWAL_PEMBUKAAN' => $this->input->post('TAHUN_AJARAN_JADWAL_PEMBUKAAN'),
				'SEMESTER_JADWAL_PEMBUKAAN' => $this->input->post('SEMESTER_JADWAL_PEMBUKAAN'),
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
			$this->template->load('main', 'pembukaan-praktikum/index', $data);
		} else {
			redirect('beranda-main');
		}
	}

	function get_data()
	{
		$list = $this->pembukaan_praktikum_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->TAHUN_JADWAL_PEMBUKAAN;
			$row[] = $field->PERIODE_JADWAL_PEMBUKAAN;
			$row[] = $field->TAHUN_AJARAN_JADWAL_PEMBUKAAN;
			$row[] = $field->SEMESTER_JADWAL_PEMBUKAAN;
			$row[] = '<div class="dropdown-default dropdown open">
					    <button class="btn btn-default dropdown-toggle waves-effect waves-light btn-mini" type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="ti-view-list-alt"></i></button>
					    <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
					    		<a class="dropdown-item waves-light waves-effect" href="'.base_url('pembukaan-praktikum/lihat/'.$field->NO_JADWAL_PEMBUKAAN).'" ><i class="ti-eye"></i>Lihat</a>
					        <a class="dropdown-item waves-light waves-effect" href="javascript:void(0)" onclick="edit_person('."'".$field->NO_JADWAL_PEMBUKAAN."'".')"><i class="ti-pencil-alt"></i>Ubah</a>
					        <a class="dropdown-item waves-light waves-effect" href="javascript:void(0)" onclick="delete_person('."'".$field->NO_JADWAL_PEMBUKAAN."'".')"><i class="ti-brush-alt"></i>Hapus</a>
					    </div>
					</div>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->pembukaan_praktikum_model->count_all(),
			"recordsFiltered" => $this->pembukaan_praktikum_model->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	/**
	 * Load Page Edit
	 * @return [type] [description]
	 */
	public function ajax_edit($id)
    {
        $data = $this->pembukaan_praktikum_model->get_by_id($id);
        echo json_encode($data);
    }

    /**
	 * Load Page Insert
	 * @return [type] [description]
	 */
    public function insert()
	{
		$data = $this->_get_doc();
		$this->pembukaan_praktikum_model->save($data);
		echo json_encode(array("status" => TRUE));
	}

	/**
	 * Load Page Update
	 * @return [type] [description]
	 */
	public function update()
	{
		$data = $this->_get_doc();
		$this->pembukaan_praktikum_model->update(array('NO_JADWAL_PEMBUKAAN' => $this->input->post('NO_JADWAL_PEMBUKAAN')), $data);

		echo json_encode(array("status" => TRUE));
	}

	/**
	 * Load Page Delete
	 * @return [type] [description]
	 */
	public function delete($id)
	{
		$this->pembukaan_praktikum_model->delete($id);
		echo json_encode(array("status" => TRUE));
	}

    //END INDEX //


	//BEGIN DETAIL
	/**
	 * get doc values from input form
	 * @return [type] [description]
	 */
	public function _get_doc_edit_detail()
	{
		$data = array(
				'AWAL_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM' => $this->input->post('AWAL_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM'),
				'AKHIR_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM' => $this->input->post('AKHIR_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM'),
		);

		return $data;
	}

	/**
	 * Load Page View
	 * @return [type] [description]
	 */
	public function lihat()
	{
		$control = $this->router->fetch_class();
		$method = $this->router->fetch_method();
		helper_log("/".$control."/".$method);

		$id = $this->session->userdata('nim');
		$no = $this->uri->segment(3);
		if($no) {
			$condition = array('NO_JADWAL_PEMBUKAAN'=> $no);
			$data['users'] = $this->info_model->get_user($id);
			$data['viewperiod'] = $this->pembukaan_praktikum_model->get_by_id($no);
			$data['viewprakperiod']= $this->pembukaan_praktikum_model->get_all_with_relation($no);
			$data['praktikum']= $this->pembukaan_praktikum_model->get_praktikum_by($no);

			$this->template->set_navbar('templates/navbar-main');
			$this->template->load('main', 'pembukaan-praktikum/tambah-data-praktikum', $data);
		} else {
			$this->session->set_flashdata('message_danger', "System Error");
			redirect('beranda-main');
		}
	}

	/**
	 * Load Page Insert
	 * @return [type] [description]
	 */
	public function insert_praktikum()
	{
		$this->template->set_navbar('templates/navbar-main');

		$NO_JADWAL_PEMBUKAAN = $_POST['NO_JADWAL_PEMBUKAAN_GET'];

		if (!empty($_POST['ID_PRAKTIKUM'])) {
		    // Counting number of checked checkboxes.
		    $checked_count = count($_POST['ID_PRAKTIKUM']);
		    echo "You have selected ".$checked_count.
		    "<br>";
		    // $data = array();
		    foreach($_POST['ID_PRAKTIKUM'] as $chores_key => $chores) {
		    	$data[] = array(

		            'TAHUN_JADWAL_PEMBUKAAN_PRAKTIKUM' => $_POST['TAHUN_JADWAL_PEMBUKAAN'][$chores_key],
		            'PERIODE_JADWAL_PEMBUKAAN_PRAKTIKUM' => $_POST['PERIODE_JADWAL_PEMBUKAAN'][$chores_key],
		            'PRAKTIKUM_JADWAL_PEMBUKAAN_PRAKTIKUM' => $_POST['ID_PRAKTIKUM'][$chores_key],
		            'JADWAL_PEMBUKAAN' => $_POST['NO_JADWAL_PEMBUKAAN'][$chores_key],
		            'AWAL_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM' => $_POST['AWAL_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM'],
		            'AKHIR_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM' => $_POST['AKHIR_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM'],
		        );
		       // echo "<br /><pre>";
		       // print_r($data);
		       // echo "<pre>";
		   }

		    $res = $this->pembukaan_praktikum_model->create($data);

		    if ($res) {
		        $this->session->set_flashdata('message_success', "Kriteria berhasil ditambahkan");
		    } else {
		        $this->session->set_flashdata('message_danger', "Kriteria gagal ditambahkan");
		    }

        	redirect('pembukaan_praktikum/lihat/'.$NO_JADWAL_PEMBUKAAN);
		} else {
		    echo "<b>Please Select Atleast One Option.</b>";
		    $this->session->set_flashdata('message_danger', "System Error");
		    redirect('pembukaan_praktikum/lihat/'.$NO_JADWAL_PEMBUKAAN);
		}
	}

	/**
	 * Load Page Update
	 * @return [type] [description]
	 */
	public function ubah($id)
	{
		if($id) {

			$condition = array('ID_JADWAL_PEMBUKAAN_PRAKTIKUM' => $id);
			// $data['model'] = $this->pembukaan_praktikum_model->get_one($condition);

			$data['viewprakperiod']= $this->pembukaan_praktikum_model->get_all_with_relation($no);

			$data = $this->_get_doc_edit_detail();

			$res = $this->pembukaan_praktikum_model->update_detail($condition, $data);

			if($res) {
				$this->session->set_flashdata('message_success2', "Berhasil mengedit data");
			} else {
				$this->session->set_flashdata('message_danger', "Failed updating data");
			}

			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->session->set_flashdata('message_danger', "System Error");
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	/**
	 * Action to Delete Record
	 * @return [type] [description]
	 */
	public function hapus()
	{
		$id = $this->uri->segment(3);
		if($id) {
			$res = $this->pembukaan_praktikum_model->hapus_detail($id);

			if($res) {
				$this->session->set_flashdata('message_success1', "Kriteria berhasil dihapus");
			} else {
				$this->session->set_flashdata('message_danger', "Kriteria gagal dihapus");
			}
		} else {
			$this->session->set_flashdata('message_danger', "System Error");
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	// public function ajax_view($id)
 //    {
 //        $data = $this->pembukaan_praktikum_model->get_by_id($id);
 //        echo json_encode($data);
 //    }

	// public function ajax_edit($id)
 //    {
 //        $data = $this->pembukaan_praktikum_model->get_by_id($id);
 //        echo json_encode($data);
 //    }


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
