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
    if (isset($_FILES['file']['name'])) {
      $path = $_FILES['file']['tmp_name'];
      $object = PHPExcel_IOFactory::load($path);
      foreach ($object->getWorksheetIterator() as $worksheet) {
        // code...
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        for ($row = 2; $row <= $highestRow; $row++) {
          // $row_data = $sheet->rangeToArray('A' . $row . ':' . $highest_column . $row, null, true, false);
          $data[] = array(
            'NIM_TBUSER'        => $worksheet->getCellByColumnAndRow(0, $row)->getValue(),
            'NAMA_TBUSER'       => $worksheet->getCellByColumnAndRow(1, $row)->getValue(),
            'LEVEL_TBUSER'      => 'mahasiswa',
            'KETERANGAN_TBUSER' => 'mahasiswa',
          );
        }
        $this->master_model->save_import($data);
      }
    }
  }

}
