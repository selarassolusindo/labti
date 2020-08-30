<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_index extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('M_index');
    $this->load->library('Excel');
  }

  public function index() {
    $data['data'] = $this->M_index->get_data();
    $this->load->view('V_index', $data);
  }

  public function import_excel() {
    $file_name = $_FILES['file']['name'];

    $config['upload_path']   = './assets';
    $config['file_name']     = $file_name;
    $config['allowed_types'] = 'xls|xlsx|csv';
    $config['max_size']      = 10000;

    $this->load->library('upload');
    $this->upload->initialize($config);

    if (!$this->upload->do_upload('file')) {
      echo $this->upload->display_errors();
      exit;
    }

    $input_file_name = './assets/' . $file_name;

    try {
      $input_file_type = PHPExcel_IOFactory::identify($input_file_name);
      $obj_reader = PHPExcel_IOFactory::createReader($input_file_type);
      $obj_php_excel = $obj_reader->load($input_file_name);
    } catch (Exception $e) {
      die('Error loading file ' . pathinfo($input_file_name, PATHINFO_BASENAME) . ': ' . $e->getMessage());
    }

    $sheet = $obj_php_excel->getSheet(0);
    $highest_row = $sheet->getHighestRow();
    $highest_column = $sheet->getHighestColumn();

    for ($row = 2; $row <= $highest_row; $row++) {
      $row_data = $sheet->rangeToArray('A' . $row . ':' . $highest_column . $row, null, true, false);
      $data = array(
        'noinduk' => $row_data[0][0],
        'nama'    => $row_data[0][1],
      );

      $insert = $this->db->insert('tb_siswa', $data);
    }

    redirect('c_index');
  }
}
