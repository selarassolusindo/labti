<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('Mixing_model');


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
		$jawa_pos = $this->input->post('jawa_pos');
		$duplek = $this->input->post('duplek');
		$gelondongan = $this->input->post('gelondongan');
		$karton = $this->input->post('karton');
		$total = $jawa_pos + $duplek + $gelondongan + $karton;
		$jumlah = $total / 30;
	
        $data = array(
            'tanggal' => $tanggal,
            'jawa_pos' => $jawa_pos,
            'duplek' => $duplek,
            'gelondongan' => $gelondongan,
            'karton' => $karton,
			'tot_bahan' => $total,
			'jml_mixing' => $jumlah,
        );

        return $data;
    }

    /**
     * Load Page Index
     * @return [type] [description]
     */
    public function index()
        
    {
        $data['models'] = $this->Mixing_model->get_by_target_total();
        $data['max'] = $this->Mixing_model->get_by_target_max();
        // $data['jawa_pos'] = $this->Mixing_model->get_by_jawa_pos();
        // $data['duplek'] = $this->Mixing_model->get_by_duplek();
        // $data['gelondongan'] = $this->Mixing_model->get_by_gelondongan();
        // $data['karton'] = $this->Mixing_model->get_by_karton();
        //load template and view page
         
        $this->template->set_navbar('templates/navbar');
        $this->template->load('main', 'adi/index', $data);
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
            $res = $this->Mixing_model->create($data);

            if($res) {
                //if process insert success
                $this->session->set_flashdata('message_success', "Successfully inserting data");
            } else {
                //process insert failed
                $this->session->set_flashdata('message_danger', "Failed inserting data"); 
            }

            redirect('adi');
            
        }
    }


    function ubah(){

        $id = $this->input->post('id');
        $data = $this->_get_doc();
        $res = $this->Mixing_model->ubah($data, $id);

        if($res) {
            $this->session->set_flashdata('message_success', "Berhasil mengedit data");
        } else {
            $this->session->set_flashdata('message_danger', "Failed updating data");    
        }

        redirect('adi');
    }

    public function delete($id)
    {
        if($id) {
            $condition = array('id' => $id);

            $res = $this->Mixing_model->delete($condition);
            
            if($res)
                $this->session->set_flashdata('message_success', "Successfully deleting data");         

            redirect('adi');
        } else {
            $this->session->set_flashdata('message_danger', "System Error");    
            redirect('adi');
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
                    'field' => 'jawa_pos',
                    'label' => 'jawa_pos',
                    'rules' => 'required',
            ),
            array(
                    'field' => 'duplek',
                    'label' => 'duplek',
                    'rules' => 'required'
            ),
            array(
                    'field' => 'gelondongan',
                    'label' => 'gelondongan',
                    'rules' => 'required'
            ),
            array(
                    'field' => 'karton',
                    'label' => 'karton',
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
                $insert_csv['jawa_pos'] = $csv_line[2];
                $insert_csv['duplek'] = $csv_line[3];
                $insert_csv['gelondongan'] = $csv_line[4];
                $insert_csv['karton'] = $csv_line[5];

            }
            $i++;
            $data = array(
                'id'          => $insert_csv['id'] ,
                'tanggal'     => $insert_csv['tanggal'],
                'jawa_pos'    => $insert_csv['jawa_pos'],
                'duplek'      => $insert_csv['duplek'],
                'gelondongan' => $insert_csv['gelondongan'],
                'karton'      => $insert_csv['karton']);
            $data['crane_features'] = $this->db->insert('tb_solusi', $data);
        }
        fclose($fp) or die("can't close file");
        $data['success']="success";
        redirect('adi/index');
        return $data;
    }


    ////// export ////

function create_csv(){

$query = $this->db->get('tb_solusi');
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
