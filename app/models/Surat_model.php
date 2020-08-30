<?php
class Surat_model extends CI_Model {

  // var $table = "peserta";
  // var $primary_key = "ID_PESERTA";
  // var $column_order = array(null, 'KODE_PRAKTIKUM','NAMA_PRAKTIKUM','KELAS_PESERTA','NILAI_PESERTA' ); //field yang ada di table user
  // var $column_search = array('KODE_PRAKTIKUM','NAMA_PRAKTIKUM'); //field yang diizin untuk pencarian 
  // var $order = array('KODE_PRAKTIKUM' => 'asc'); // default order 

  public function __construct()
  { 
    parent::__construct();
    $this->load->database();
  }

  public function get_user($id =null)
  {
    $this->db->select('NIM_TBUSER, NAMA_TBUSER, KELAS_TBUSER, JENISKELAMIN_TBUSER, NOTELP_TBUSER, EMAIL_TBUSER, FOTO_TBUSER');
      $this->db->from('tbuser');
      $this->db->where('NIM_TBUSER', $id);
    $result = $this->db->get();
    
    if($result->num_rows() > 0)
    {
      return $result->result();
    }

    return false;
  }

  public function get_kepala_lab()
  {
    $this->db->select('NAMA_STRLAB, NOMOR_STRLAB, GELAR_DPN_STRLAB, GELAR_STRLAB');
    $this->db->from('strlab');      
      $this->db->where('JABATAN_STRLAB', 'kepala lab.');
    $result = $this->db->get();
    
    if($result->num_rows() > 0)
    {
      return $result->result();
    }

    return false;
  }

  /**
   * Get All Record from table
   * @return Object
   */
  public function getJadwalPembukaan()
  {
    $this->db->select('NO_JADWAL_PEMBUKAAN, TAHUN_JADWAL_PEMBUKAAN, PERIODE_JADWAL_PEMBUKAAN');
    $this->db->from('jadwal_pembukaan');  
    $this->db->order_by('NO_JADWAL_PEMBUKAAN','DESC');
    $this->db->limit('1');    
    $result = $this->db->get();
    
    if($result->num_rows() > 0)
    {
      return $result->result();
    }

    return false;
  }

  /**
   * Get All Record from table
   * @return Object
   */
  public function getProcJadwalPembukaan()
  { 
    $sql = "call SelectOpenPrak(?,?)";
    $list = $this->getJadwalPembukaan();
    foreach ($list as $row){
      $perio = $row->PERIODE_JADWAL_PEMBUKAAN;
      $th = $row->TAHUN_JADWAL_PEMBUKAAN;
      $result = $this->db->query($sql, array('PERIODE_JADWAL_PEMBUKAAN'=> $perio, 'TAHUN_JADWAL_PEMBUKAAN'=> $th));
    }
    $res      = $result->result();

    //add this two line 
    $result->next_result(); 
    $result->free_result(); 
    //end of new code

    return $res;
  }

  /**
   * Get All Record from table
   * @return Object
   */
  //$thnPrak,$perPrak, $idPrak
  public function get_peserta_per_praktikum($thnPrak,$perPrak, $idPrak)
  {
    $this->db->select('tbuser.NIM_TBUSER AS NIM_TBUSER, ucase( `tbuser`.`NAMA_TBUSER` ) AS NAMA_TBUSER, ucase( `tbuser`.`KELAS_TBUSER` ) AS KELAS_TBUSER, Sum(praktikum.BIAYA_PRAKTIKUM) AS BIAYA_PRAKTIKUM');
    $this->db->from("peserta");
    $this->db->join('tbuser', 'peserta.NIM_PESERTA = tbuser.NIM_TBUSER', 'LEFT');  
    $this->db->join('praktikum', 'peserta.PRAK_PESERTA = praktikum.KODE_PRAKTIKUM', 'LEFT');   
    // $array = array('peserta.PERIODE_PESERTA =' => '5', 'peserta.KETERANGAN_PESERTA =' => 'peserta');
     $array = array('peserta.THNPELAKSANAAN_PESERTA =' => $thnPrak, 'peserta.PERIODE_PESERTA =' => $perPrak, 'peserta.PRAK_PESERTA =' => $idPrak, 'peserta.KETERANGAN_PESERTA =' => 'peserta');
    $this->db->where($array);   
    $this->db->group_by('peserta.NIM_PESERTA '); 
    $this->db->order_by("peserta.NIM_PESERTA", "ASC");
    $result = $this->db->get();
    
    if($result->num_rows() > 0)
    {
      return $result->result();
    }
  }

  /**
   * Get All Record from table
   * @return Object
   */
  public function get_peserta_praktikum()
  {
    $jadprak = $this->getJadwalPembukaan();
    foreach ($jadprak as $jadprak){
      $periode = $jadprak->PERIODE_JADWAL_PEMBUKAAN;
    }

    $this->db->select('tbuser.NIM_TBUSER AS NIM_TBUSER, ucase( `tbuser`.`NAMA_TBUSER` ) AS NAMA_TBUSER, ucase( `tbuser`.`KELAS_TBUSER` ) AS KELAS_TBUSER, Sum(praktikum.BIAYA_PRAKTIKUM) AS BIAYA_PRAKTIKUM');
    $this->db->from("peserta");
    $this->db->join('tbuser', 'peserta.NIM_PESERTA = tbuser.NIM_TBUSER', 'LEFT');  
    $this->db->join('praktikum', 'peserta.PRAK_PESERTA = praktikum.KODE_PRAKTIKUM', 'LEFT');   
    $array = array('peserta.PERIODE_PESERTA =' => $periode, 'peserta.KETERANGAN_PESERTA =' => 'peserta');
    $this->db->where($array);   
    $this->db->group_by('peserta.NIM_PESERTA '); 
    $this->db->order_by("peserta.NIM_PESERTA", "ASC");
    $result = $this->db->get();
    
    if($result->num_rows() > 0)
    {
      return $result->result();
    }
  }

}