<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dimas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('StokProduksi_model');


        //check authentication
        $this->auth();
    }

    /**
     * get doc values from input form
     * @return [type] [description]
     */
    public function _get_doc()
    {
        
		$tanggal = date("Y-m-d",strtotime($this->input->post('tanggal')));
		$minggu_ke = $this->input->post('minggu_ke');
		$produksi = $this->input->post('produksi');
		$permintaan = $this->input->post('permintaan');
		$persediaan = $produksi - $permintaan;
		$biaya_simpan = $this->input->post('biaya_simpan');
		$biaya_lembur = $this->input->post('biaya_lembur');
		$kerugian = $this->input->post('kerugian');
		$total = $biaya_simpan + $biaya_lembur + $kerugian;
		
		$data = array(
            'tanggal' =>  $tanggal,
            'minggu_ke' => $minggu_ke,
			'produksi' => $produksi,
            'permintaan' => $permintaan,
            'persediaan' => $persediaan,
            'biaya_simpan' => $biaya_simpan,
            'biaya_lembur' => $biaya_lembur,
            'kerugian' => $kerugian,
			'total' => $total,
        );

        return $data;
    }

    /**
     * Load Page Index
     * @return [type] [description]
     */
    public function index()
        
    {
        $data['models'] = $this->StokProduksi_model->get_by_target_total();
        $data['max'] = $this->StokProduksi_model->get_by_target_max();
        // $data['produksi'] = $this->StokProduksi_model->get_by_produksi();
        // $data['gudang'] = $this->StokProduksi_model->get_by_gudang();
        // $data['sales'] = $this->StokProduksi_model->get_by_sales();
        //load template and view page
         
        $this->template->set_navbar('templates/navbar');
        $this->template->load('main', 'Dimas/index', $data);
    }
    
    public function viewada()
    {
        //load template and view page
        $this->template->set_navbar('templates/navbar');
    }
    
    /**
     * Load Page Insert
     * @return [type] [description]
     */
    public function insert()
    {
        //set navbar
        $this->template->set_navbar('templates/navbar');

        //set rules form validation
        $this->_set_validation();

        if($this->form_validation->run() == FALSE)
        {

        }
        else 
        {
            //if success
            //get values from input form
            $data = $this->_get_doc();

            //call method 'create' on komponen model to insert record into table
            $res = $this->StokProduksi_model->create($data);

            if($res) {
                //if process insert success
                $this->session->set_flashdata('message_success', "Successfully inserting data");
            } else {
                //process insert failed
                $this->session->set_flashdata('message_danger', "Failed inserting data");   
            }

            redirect('Dimas');
            
        }
    }


    function ubah(){

        $id = $this->input->post('id');
        $data = $this->_get_doc();
        $res = $this->StokProduksi_model->ubah($data, $id);

        if($res) {
            $this->session->set_flashdata('message_success', "Berhasil mengedit data");
        } else {
            $this->session->set_flashdata('message_danger', "Failed updating data");    
        }

        redirect('Dimas');
    }

    public function delete($id)
    {
        if($id) {
            $condition = array('id' => $id);

            $res = $this->StokProduksi_model->delete($condition);
            
            if($res)
                $this->session->set_flashdata('message_success', "Successfully deleting data");         

            redirect('Dimas');
        } else {
            $this->session->set_flashdata('message_danger', "System Error");    
            redirect('Dimas');
        }
    }

    /**
     * private method to set rules form validation
     */
    private function _set_validation()
    {
        $this->load->library('form_validation');
        $config = array(
            array(
                    'field' => 'tanggal',
                    'label' => 'tanggal',
                    'rules' => 'required'
            ),
            array(
                    'field' => 'minggu_ke',
                    'label' => 'minggu_ke',
                    'rules' => 'required',
            ),
			array(
                    'field' => 'produksi',
                    'label' => 'produksi',
                    'rules' => 'required',
            ),
            array(
                    'field' => 'permintaan',
                    'label' => 'permintaan',
                    'rules' => 'required'
            ),
            array(
                    'field' => 'biaya_simpan',
                    'label' => 'biaya_simpan',
                    'rules' => 'required'
            ),
            array(
                    'field' => 'biaya_lembur',
                    'label' => 'biaya_lembur',
                    'rules' => 'required'
            ),
            array(
                    'field' => 'kerugian',
                    'label' => 'kerugian',
                    'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config);
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
            redirect('user');
        }
    }


/////////////////////////////////Import subscriber emails ////////////////////////////////
 function import()
    {
        $count=0;
        $fp = fopen($_FILES['file']['tmp_name'],'r') or die("can't open file");
        while($csv_line = fgetcsv($fp,1024))
        {
            $count++;
            if($count == 1)
            {
                continue;
            }//keep this if condition if you want to remove the first row
            for($i = 0, $j = count($csv_line); $i < $j; $i++)
            {
                $insert_csv = array();
                $insert_csv['id'] = $csv_line[0];//remove if you want to have primary key,
                $insert_csv['tanggal'] = $csv_line[1];
                $insert_csv['produksi'] = $csv_line[2];
                $insert_csv['permintaan'] = $csv_line[3];
                $insert_csv['persediaan'] = $csv_line[4];
				$insert_csv['biaya_simpan'] = $csv_line[5];
				$insert_csv['biaya_lembur'] = $csv_line[6];
				$insert_csv['kerugian'] = $csv_line[7];

            }
            $i++;
            $data = array(
                'id' => $insert_csv['id'] ,
                'tanggal'      => $insert_csv['tanggal'],
                'produksi'     => $insert_csv['produksi'],
                'permintaan'   => $insert_csv['permintaan'],
                'persediaan'   => $insert_csv['persediaan'],
				'biaya_simpan' => $insert_csv['biaya_simpan'],
				'biaya_lembur' => $insert_csv['biaya_lembur'],
				'kerugian'     => $insert_csv['kerugian']);
            $data['crane_features'] = $this->db->insert('tbl_solusi', $data);
        }
        fclose($fp) or die("can't close file");
        $data['success']="success";
        redirect('Dimas/index');
        return $data;
    }


    ////// export ////

function create_csv(){

$query = $this->db->get('tbl_solusi');
    // Load database utility class
    $this->load->dbutil();
    // Create CSV output
    $data = $this->dbutil->csv_from_result($query);

    // Load download helper
    $this->load->helper('download');
    // Stream download
    force_download('export.csv', $data);


}
}
