<?php
class StokBB_model extends CI_Model {

	private $_table = "t_hasiliterasi";
	private $primary_key = "id";

	public function __construct()
	{
		$this->load->database();
	}

	/**
	 * Get All Record from table
	 * @return Object
	 */
	public function get_all()
	{	
		// $result = $this->db->query('SELECT tanggal, formula, hpp FROM t_hasiliterasi WHERE formula = "formula 1" ORDER BY DATE(tanggal) ASC');
		// return $result->result();
		 $result = $this->db->get($this->_table);

		if($result->num_rows() > 0)
		{
			return $result->result();
		}

		return false;
	}

	public function get_by_ampas_saldoawal()
	{	
		$result = $this->db->query('SELECT tanggal, ampas_saldoawal FROM t_hasiliterasi ORDER BY DATE(tanggal) ASC');
		return $result->result();
	}

	public function get_by_ampas_keluar()
	{	
		$result = $this->db->query('SELECT tanggal, ampas_keluar FROM t_hasiliterasi ORDER BY DATE(tanggal) ASC');
		return $result->result();
	}

	public function get_by_gelondongan_saldoawal()
	{	
		$result = $this->db->query('SELECT tanggal, gelondongan_saldoawal FROM t_hasiliterasi ORDER BY DATE(tanggal) ASC');
		return $result->result();
	}

	public function get_by_gelondongan_keluar()
	{	
		$result = $this->db->query('SELECT tanggal, gelondongan_keluar FROM t_hasiliterasi ORDER BY DATE(tanggal) ASC');
		return $result->result();
	}

	public function get_by_karton_saldoawal()
	{	
		$result = $this->db->query('SELECT tanggal, karton_saldoawal FROM t_hasiliterasi ORDER BY DATE(tanggal) ASC');
		return $result->result();
	}

	public function get_by_karton_keluar()
	{	
		$result = $this->db->query('SELECT tanggal, karton_keluar FROM t_hasiliterasi ORDER BY DATE(tanggal) ASC');
		return $result->result();
	}

	/**
	 * Get All Record from table
	 * @return Object
	 */
	public function get_all_with_relation($id_perangkat = null)
	{
		if($id_perangkat) {
			$this->db->select('t_hasiliterasi.*, perangkat.name as perangkat_name');
			$this->db->from($this->_table);
			$this->db->where('id_perangkat', $id_perangkat);
			$this->db->join('perangkat', 'perangkat.id = t_hasiliterasi.id_perangkat');
			$result = $this->db->get();
		} else {
			$this->db->select('t_hasiliterasi.*, perangkat.name as perangkat_name');
			$this->db->from($this->_table);
			$this->db->join('perangkat', 'perangkat.id = t_hasiliterasi.id_perangkat');
			$result = $this->db->get();
		}

		if($result->num_rows() > 0)
		{
			return $result->result();
		}

		return false;
	}

	/**
	 * Get One Record by condition
	 * @param  Array $condition "example : array('id' => 1)"
	 * @return Object
	 */
	public function get_one($condition)
	{
		$this->db->select('t_hasiliterasi.*, perangkat.name as perangkat_name');
		$this->db->join('perangkat', 'perangkat.id = t_hasiliterasi.id_perangkat');
		$query = $this->db->get_where($this->_table, $condition);

		if($query)
		{
			return $query->row();
		}

		return false;
	}
/////////////////// google update//////

	function ubah($data, $id){
    $this->db->where('id',$id);
    $this->db->update('t_hasiliterasi', $data);
    return TRUE;
}
	/**
	 * Action to Create a record
	 * @param  array $data "example array('title'=>'hello','author'=>'john doe')"
	 * @return string  "last insert id"
	 */
	public function create($data) 
	{
		return $this->db->insert($this->_table, $data);
	}

	
	public function delete($condition)
	{
		return $this->db->delete($this->_table, $condition);
	}	
	
}


