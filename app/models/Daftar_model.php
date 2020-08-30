<?php
class Daftar_model extends CI_Model {

	var $table = "peserta";
	var $_table = "peserta";
	var $primary_key = "ID_PESERTA";
	var $column_order = array(null, 'KODE_PRAKTIKUM','NAMA_PRAKTIKUM','KELAS_PESERTA','NILAI_PESERTA' ); //field yang ada di table user
	var $column_search = array('KODE_PRAKTIKUM','NAMA_PRAKTIKUM'); //field yang diizin untuk pencarian 
	var $order = array('KODE_PRAKTIKUM' => 'asc'); // default order 

	public function __construct()
	{	
		parent::__construct();
		$this->load->database();
	}

	public function get_all_with_relation($id =null)
	{	
		$list = $this->getJadwalPembukaan();
		foreach ($list as $row){
			$perio = $row->PERIODE_JADWAL_PEMBUKAAN;
			$th = $row->TAHUN_JADWAL_PEMBUKAAN;
			if($id) 
			{
				$this->db->select('peserta.ID_PESERTA, peserta.PRAK_PESERTA, praktikum.NAMA_PRAKTIKUM, praktikum.SMST_PRAKTIKUM, praktikum.BIAYA_PRAKTIKUM');
		      	$this->db->from('peserta');
		      	$this->db->join('praktikum', 'PRAK_PESERTA = KODE_PRAKTIKUM', 'LEFT');
		      	$this->db->where('`peserta`.`NIM_PESERTA`', $id);
		      	$this->db->where('`peserta`.`KETERANGAN_PESERTA`', 'mendaftar');
		      	$this->db->where('`peserta`.`NILAI_PESERTA`', 'F');
		      	$this->db->where('`peserta`.`PERIODE_PESERTA`', $perio);
		      	$this->db->where('`peserta`.`THNPELAKSANAAN_PESERTA`', $th);
				$result = $this->db->get();
			} else 
			{
				$this->db->select('peserta.PRAK_PESERTA, praktikum.NAMA_PRAKTIKUM, praktikum.SMST_PRAKTIKUM, praktikum.BIAYA_PRAKTIKUM');
		      	$this->db->from('peserta');
		      	$this->db->join('praktikum', 'PRAK_PESERTA = KODE_PRAKTIKUM', 'LEFT');
		      	$this->db->where('`peserta`.`NIM_PESERTA`', $id);
		      	$this->db->where('`peserta`.`KETERANGAN_PESERTA`', 'mendaftar');
		      	$this->db->where('`peserta`.`NILAI_PESERTA`', 'F');
		      	$this->db->where('`peserta`.`PERIODE_PESERTA`', $perio);
		      	$this->db->where('`peserta`.`THNPELAKSANAAN_PESERTA`', $th);
				$result = $this->db->get();	
			}
		}
		
		
		if($result->num_rows() > 0)
		{
			return $result->result();
		}

		return false;
	}

	public function get_all_sum_prak($id =null)
	{	
		$list = $this->getJadwalPembukaan();
		foreach ($list as $row){
			$perio = $row->PERIODE_JADWAL_PEMBUKAAN;
			$th = $row->TAHUN_JADWAL_PEMBUKAAN;
			if($id) 
			{
				$this->db->select('SUM(praktikum.BIAYA_PRAKTIKUM) AS SUM_BIAYA_PRAKTIKUM');
		      	$this->db->from('peserta');
		      	$this->db->join('praktikum', 'PRAK_PESERTA = KODE_PRAKTIKUM', 'LEFT');
		      	$this->db->where('`peserta`.`NIM_PESERTA`', $id);
		      	$this->db->where('`peserta`.`KETERANGAN_PESERTA`', 'mendaftar');
		      	$this->db->where('`peserta`.`NILAI_PESERTA`', 'F');
		      	$this->db->where('`peserta`.`PERIODE_PESERTA`', $perio);
		      	$this->db->where('`peserta`.`THNPELAKSANAAN_PESERTA`', $th);
				$result = $this->db->get();
			} else 
			{
				$this->db->select('SUM(praktikum.BIAYA_PRAKTIKUM) AS SUM_BIAYA_PRAKTIKUM');
		      	$this->db->from('peserta');
		      	$this->db->join('praktikum', 'PRAK_PESERTA = KODE_PRAKTIKUM', 'LEFT');
		      	$this->db->where('`peserta`.`NIM_PESERTA`', $id);
		      	$this->db->where('`peserta`.`KETERANGAN_PESERTA`', 'mendaftar');
		      	$this->db->where('`peserta`.`NILAI_PESERTA`', 'F');
		      	$this->db->where('`peserta`.`PERIODE_PESERTA`', $perio);
		      	$this->db->where('`peserta`.`THNPELAKSANAAN_PESERTA`', $th);
				$result = $this->db->get();	
			}
		}
		
		
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
	public function get_praktikum()
	{
		$this->db->select('KODE_PRAKTIKUM, NAMA_PRAKTIKUM, BIAYA_PRAKTIKUM');
		$this->db->from('praktikum');			
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
	* Get One Record by condition
	* @param  Array $condition "example : array('id' => 1)"
	* @return Object
	*/
	public function get_by_id_view($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$results = $query->result();
		}
		return $results;
	}

	/**
	 * Get One Record by condition
	 * @param  Array $condition "example : array('id' => 1)"
	 * @return Object
	 */
	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where($this->primary_key,$id);
		$query = $this->db->get();

		return $query->row();
	}

	/**
	 * Action to Create a record
	 * @param  array $data "example array('title'=>'hello','author'=>'john doe')"
	 * @return string  "last insert id"
	 */
	public function create($data = array()) 
	{	
		
			return $this->db->insert_batch($this->_table, $data);
		
	}

	/**
	 * Action to Update a record
	 * @param  String $id   "primary key table"
	 * @param  Array $data "example : array('title'=>'hello','author'=>'john doe')"
	 * @return {}
	 */
	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	/**
	 * Action Delete a record
	 * @param  Array $condition 'example array('id' => 2)'
	 * @return {}
	 */
	public function delete($id)
	{	
		$this->db->where($this->primary_key, $id);
        return $this->db->delete($this->table);
	}

}