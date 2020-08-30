<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dani extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('formula_model');

		//check authentication
		$this->auth();
	}

	/**
	 * Load Page Index
	 * @return [type] [description]
	 */
	public function index()
		
	{
		$data['models'] = $this->formula_model->get_all();
		//load template and view page
		
		$this->template->set_navbar('templates/navbar');
		$this->template->load('main', 'Dani/index_formula', $data);
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
                $insert_csv['name'] = $csv_line[1];
                $insert_csv['spec'] = $csv_line[2];
                $insert_csv['id_perangkat'] = $csv_line[3];

            }
            $i++;
            $data = array(
                'id' => $insert_csv['id'] ,
                'name' => $insert_csv['name'],
                'spec' => $insert_csv['spec'],
                'id_perangkat' => $insert_csv['id_perangkat']);
            $data['crane_features'] = $this->db->insert('formula', $data);
        }
        fclose($fp) or die("can't close file");
        $data['success']="success";
        redirect('Dani/index_formula');
        return $data;
    }


    ////// export ////

function create_csv(){

$query = $this->db->get('formula');
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

