<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dani_HPProduksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('HPProduksi_model');


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
            'tanggal' => date("Y-m-d",strtotime($this->input->post('tanggal'))),
            'formula' => $this->input->post('formula'),
            'hpp' => $this->input->post('hpp'),
        );

        return $data;
    }

    /**
     * Load Page Index
     * @return [type] [description]
     */
    public function index()
        
    {
        $data['models'] = $this->HPProduksi_model->get_all();
        $data['formula1'] = $this->HPProduksi_model->get_by_formula1();
        $data['formula2'] = $this->HPProduksi_model->get_by_formula2();
        $data['max'] = $this->HPProduksi_model->get_by_target_max();
        //load template and view page
         
        $this->template->set_navbar('templates/navbar');
        $this->template->load('main', 'Dani/index_hpproduksi', $data);
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
            $res = $this->HPProduksi_model->create($data);

            if($res) {
                //if process insert success
                $this->session->set_flashdata('message_success', "Successfully inserting data");
            } else {
                //process insert failed
                $this->session->set_flashdata('message_danger', "Failed inserting data");   
            }

            redirect('Dani_HPProduksi');
            
        }
    }


    function ubah(){

        $id = $this->input->post('id');
        $data = $this->_get_doc();
        $res = $this->HPProduksi_model->ubah($data, $id);

        if($res) {
            $this->session->set_flashdata('message_success', "Berhasil mengedit data");
        } else {
            $this->session->set_flashdata('message_danger', "Failed updating data");    
        }

        redirect('Dani_HPProduksi');
    }

    public function delete($id)
    {
        if($id) {
            $condition = array('id' => $id);

            $res = $this->HPProduksi_model->delete($condition);
            
            if($res)
                $this->session->set_flashdata('message_success', "Successfully deleting data");         

            redirect('Dani_HPProduksi');
        } else {
            $this->session->set_flashdata('message_danger', "System Error");    
            redirect('Dani_HPProduksi');
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
                    'field' => 'formula',
                    'label' => 'formula',
                    'rules' => 'required',
            ),
            array(
                    'field' => 'hpp',
                    'label' => 'hpp',
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
                $insert_csv['formula'] = $csv_line[2];
                $insert_csv['hpp'] = $csv_line[3];

            }
            $i++;
            $data = array(
                'id'        => $insert_csv['id'] ,
                'tanggal'   => $insert_csv['tanggal'],
                'formula'   => $insert_csv['formula'],
                'hpp'       => $insert_csv['hpp']);
            $data['crane_features'] = $this->db->insert('hp_produksi_new_copy', $data);
        }
        fclose($fp) or die("can't close file");
        $data['success']="success";
        redirect('Dani/index_hpproduksi');
        return $data;
    }


    ////// export ////

function create_csv(){

$query = $this->db->get('hp_produksi_new_copy');
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
