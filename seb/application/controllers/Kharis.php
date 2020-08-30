<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kharis extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('BProduksi_model');

        //check authentication
        $this->auth();
    }

    public function _get_doc()
    {
        $data = array(
            'tanggal' => date("Y-m-d",strtotime($this->input->post('tanggal'))),
            't_ampas' => $this->input->post('t_ampas'),
            't_gelondongan' => $this->input->post('t_gelondongan'),
            't_karton' => $this->input->post('t_karton'),
            't_kayu' => $this->input->post('t_kayu'),
            't_lem' => $this->input->post('t_lem'),
            't_plastik' => $this->input->post('t_plastik'),
            't_solar' => $this->input->post('t_solar'),
            't_tali' => $this->input->post('t_tali'),
            't_upah_karyawan' => $this->input->post('t_upah_karyawan'),
            't_upah_karyawan_borongan' => $this->input->post('t_upah_karyawan_borongan'),
        );

        return $data;
    }

    /**
     * Load Page Index
     * @return [type] [description]
     */
    public function index()
        
    {
        $data['models'] = $this->BProduksi_model->get_by_target_total();
        $data['max'] = $this->BProduksi_model->get_by_target_max();
        // $data['t_ampas'] = $this->BProduksi_model->get_by_t_ampas();
        //load template and view page
        
        $this->template->set_navbar('templates/navbar');
        $this->template->load('main', 'Kharis/index', $data);
    }
    
    public function viewada()
    {
        //load template and view page
        $this->template->set_navbar('templates/navbar');
    }
    
    
    /**
     * Get authentication
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
            $res = $this->BProduksi_model->create($data);

            if($res) {
                //if process insert success
                $this->session->set_flashdata('message_success', "Successfully inserting data");
            } else {
                //process insert failed
                $this->session->set_flashdata('message_danger', "Failed inserting data");   
            }

            redirect('Kharis');
            
        }
    }

    function ubah(){

        $id = $this->input->post('id');
        $data = $this->_get_doc();
        $res = $this->BProduksi_model->ubah($data, $id);

        if($res) {
            $this->session->set_flashdata('message_success', "Berhasil mengedit data");
        } else {
            $this->session->set_flashdata('message_danger', "Failed updating data");    
        }

        redirect('Kharis');
    }

    public function delete($id)
        {
            if($id) {
                $condition = array('id' => $id);

                $res = $this->BProduksi_model->delete($condition);
                
                if($res)
                    $this->session->set_flashdata('message_success', "Successfully deleting data");         

                redirect('Kharis');
            } else {
                $this->session->set_flashdata('message_danger', "System Error");    
                redirect('Kharis');
            }
        }

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
                    'field' => 't_ampas',
                    'label' => 't_ampas',
                    'rules' => 'required',
            ),
            array(
                    'field' => 't_gelondongan',
                    'label' => 't_gelondongan',
                    'rules' => 'required'
            ),
            array(
                    'field' => 't_karton',
                    'label' => 't_karton',
                    'rules' => 'required'
            ),
            array(
                    'field' => 't_kayu',
                    'label' => 't_kayu',
                    'rules' => 'required'
            ),
            array(
                    'field' => 't_lem',
                    'label' => 't_lem',
                    'rules' => 'required'
            ),
            array(
                    'field' => 't_plastik',
                    'label' => 't_plastik',
                    'rules' => 'required'
            ),
            array(
                    'field' => 't_solar',
                    'label' => 't_solar',
                    'rules' => 'required'
            ),
            array(
                    'field' => 't_tali',
                    'label' => 't_tali',
                    'rules' => 'required'
            ),
            array(
                    'field' => 't_upah_karyawan',
                    'label' => 't_upah_karyawan',
                    'rules' => 'required'
            ),
            array(
                    'field' => 't_upah_karyawan_borongan',
                    'label' => 't_upah_karyawan_borongan',
                    'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config);
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
                $insert_csv['t_ampas'] = $csv_line[2];
                $insert_csv['t_gelondongan'] = $csv_line[3];
                $insert_csv['t_karton'] = $csv_line[4];
                $insert_csv['t_kayu'] = $csv_line[5];
                $insert_csv['t_lem'] = $csv_line[6];
                $insert_csv['t_plastik'] = $csv_line[7];
                $insert_csv['t_solar'] = $csv_line[8];
                $insert_csv['t_tali'] = $csv_line[9];
                $insert_csv['t_upah_karyawan'] = $csv_line[10];
                $insert_csv['t_upah_karyawan_borongan'] = $csv_line[11];

            }
            $i++;
            $data = array(
                'id'                        => $insert_csv['id'] ,
                'tanggal'                   => $insert_csv['tanggal'],
                't_ampas'                   => $insert_csv['t_ampas'],
                't_gelondongan'             => $insert_csv['t_gelondongan'],
                't_karton'                  => $insert_csv['t_karton'],
                't_kayu'                    => $insert_csv['t_kayu'],
                't_lem'                     => $insert_csv['t_lem'],
                't_plastik'                 => $insert_csv['t_plastik'],
                't_solar'                   => $insert_csv['t_solar'],
                't_tali'                    => $insert_csv['t_tali'],
                't_upah_karyawan'           => $insert_csv['t_upah_karyawan'],
                't_upah_karyawan_borongan'  => $insert_csv['t_upah_karyawan_borongan']);
            $data['crane_features'] = $this->db->insert('biaya_produksi', $data);
        }
        fclose($fp) or die("can't close file");
        $data['success']="success";
        redirect('Kharis/index');
        return $data;
    }


    ////// export ////

function create_csv(){

$query = $this->db->get('biaya_produksi');
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

