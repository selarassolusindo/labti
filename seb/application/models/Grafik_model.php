<?php
class Grafik_model extends CI_Model {

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

	public function get_option() {
		 $this->db->select('*');
		 $this->db->from('t_hasiliterasi');
		 $query = $this->db->get();
		 return $query->result();
		}

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
	
}


