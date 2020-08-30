<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dwiki extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('StokBB_model');


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
            'tanggal'        => date("Y-m-d",strtotime($this->input->post('tanggal'))),
            'ampas_saldoawal'       => $this->input->post('ampas_saldoawal'),
            'ampas_keluar'       => $this->input->post('ampas_keluar'),
            'gelondongan_saldoawal' => $this->input->post('gelondongan_saldoawal'),
            'gelondongan_keluar' => $this->input->post('gelondongan_keluar'),
            'karton_saldoawal'      => $this->input->post('karton_saldoawal'),
            'karton_keluar'      => $this->input->post('karton_keluar'),
        );

        return $data;
    }

    /**
     * Load Page Index
     * @return [type] [description]
     */
    public function index()
        
    {
        $data['models'] = $this->StokBB_model->get_all();
        $data['ampas_saldoawal'] = $this->StokBB_model->get_by_ampas_saldoawal();
        $data['ampas_keluar'] = $this->StokBB_model->get_by_ampas_keluar();
        $data['gelondongan_saldoawal'] = $this->StokBB_model->get_by_gelondongan_saldoawal();
        $data['gelondongan_keluar'] = $this->StokBB_model->get_by_gelondongan_keluar();
        $data['karton_saldoawal'] = $this->StokBB_model->get_by_karton_saldoawal();
        $data['karton_keluar'] = $this->StokBB_model->get_by_karton_keluar();
        // $data['karton_sa']['karton_sk'] = $this->StokBB_model->get_by_karton();
        //load template and view page
         
        $this->template->set_navbar('templates/navbar');
        $this->template->load('main', 'Dwiki/index', $data);
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
            $res = $this->StokBB_model->create($data);

            if($res) {
                //if process insert success
                $this->session->set_flashdata('message_success', "Successfully inserting data");
            } else {
                //process insert failed
                $this->session->set_flashdata('message_danger', "Failed inserting data");   
            }

            redirect('Dwiki');
            
        }
    }


    function ubah(){

        $id = $this->input->post('id');
        $data = $this->_get_doc();
        $res = $this->StokBB_model->ubah($data, $id);

        if($res) {
            $this->session->set_flashdata('message_success', "Berhasil mengedit data");
        } else {
            $this->session->set_flashdata('message_danger', "Failed updating data");    
        }

        redirect('Dwiki');
    }

    public function delete($id)
    {
        if($id) {
            $condition = array('id' => $id);

            $res = $this->StokBB_model->delete($condition);
            
            if($res)
                $this->session->set_flashdata('message_success', "Successfully deleting data");         

            redirect('Dwiki');
        } else {
            $this->session->set_flashdata('message_danger', "System Error");    
            redirect('Dwiki');
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
                    'field' => 'ampas_saldoawal',
                    'label' => 'Ampas Masuk',
                    'rules' => 'required',
            ),
            array(
                    'field' => 'ampas_keluar',
                    'label' => 'Ampas Keluar',
                    'rules' => 'required'
            ),
            array(
                    'field' => 'gelondongan_saldoawal',
                    'label' => 'Gelondongan Masuk ',
                    'rules' => 'required',
            ),
            array(
                    'field' => 'gelondongan_keluar',
                    'label' => 'Gelondongan Keluar',
                    'rules' => 'required',
            ),
            array(
                    'field' => 'karton_saldoawal',
                    'label' => 'Karton Masuk',
                    'rules' => 'required',
            ),
            array(
                    'field' => 'karton_keluar',
                    'label' => 'Karton Keluar',
                    'rules' => 'required',
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
                $insert_csv['tanggal']        = $csv_line[1];
                $insert_csv['ampas_saldoawal']       = $csv_line[2];
                $insert_csv['ampas_keluar']       = $csv_line[3];
                $insert_csv['gelondongan_saldoawal'] = $csv_line[4];
                $insert_csv['gelondongan_keluar'] = $csv_line[5];
                $insert_csv['karton_saldoawal']      = $csv_line[6];
                $insert_csv['karton_keluar']      = $csv_line[7];

            }
            $i++;
            $data = array(
                'id'             => $insert_csv['id'] ,
                'tanggal'        => $insert_csv['tanggal'],
                'ampas_saldoawal'       => $insert_csv['ampas_saldoawal'],
                'ampas_keluar'       => $insert_csv['ampas_keluar'],
                'gelondongan_saldoawal' => $insert_csv['gelondongan_saldoawal'],
                'gelondongan_keluar' => $insert_csv['gelondongan_keluar'],
                'karton_saldoawal'      => $insert_csv['karton_saldoawal'],
                'karton_keluar'      => $insert_csv['karton_keluar']);
            $data['crane_features'] = $this->db->insert('t_hasiliterasi', $data);
        }
        fclose($fp) or die("can't close file");
        $data['success']="success";
        redirect('Dwiki/index');
        return $data;
    }


    ////// export ////

function create_csv(){

$query = $this->db->get('t_hasiliterasi');
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
