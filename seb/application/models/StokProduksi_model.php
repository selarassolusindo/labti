<?php
class StokProduksi_model extends CI_Model {

	private $_table = "tbl_solusi";
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
		// $result = $this->db->query('SELECT tanggal, formula, hpp FROM tbl_solusi WHERE formula = "formula 1" ORDER BY DATE(tanggal) ASC');
		// return $result->result();
		 $result = $this->db->get($this->_table);

		if($result->num_rows() > 0)
		{
			return $result->result();
		}

		return false;
	}

	public function get_by_target_total()
	{	
		$result = $this->db->query('SELECT id, tanggal, minggu_ke, produksi, permintaan, persediaan, biaya_simpan, biaya_lembur, kerugian, biaya_simpan + biaya_lembur + kerugian as total FROM tbl_solusi ORDER BY DATE(tanggal) ASC');
		return $result->result();
	}
	
	public function get_by_target_persediaan()
	{	
		$result = $this->db->query('SELECT id, tanggal, produksi, permintaan, produksi - permintaan as persediaan FROM tbl_solusi ORDER BY DATE(tanggal) ASC');
		return $result->result();
	}

	public function get_by_target_max()
	{
		$result = $this->db->query('SELECT tanggal, max(biaya_simpan + biaya_lembur + kerugian) as max FROM tbl_solusi WHERE month(tanggal) GROUP BY (month(tanggal))');
		return $result->result();
	}

	// public function get_by_produksi()
	// {	
	// 	$result = $this->db->query('SELECT tanggal, produksi, gudang, sales FROM tbl_solusi ORDER BY DATE(tanggal) ASC');
	// 	return $result->result();
	// }

	// public function get_by_gudang()
	// {	
	// 	$result = $this->db->query('SELECT tanggal, produksi, gudang, sales FROM tbl_solusi ORDER BY DATE(tanggal) ASC');
	// 	return $result->result();
	// }
	// public function get_by_sales()
	// {	
	// 	$result = $this->db->query('SELECT tanggal, produksi, gudang, sales FROM tbl_solusi ORDER BY DATE(tanggal) ASC');
	// 	return $result->result();
	// }


	/**
	 * Get All Record from table
	 * @return Object
	 */
	public function get_all_with_relation($id_perangkat = null)
	{
		if($id_perangkat) {
			$this->db->select('tbl_solusi.*, perangkat.name as perangkat_name');
			$this->db->from($this->_table);
			$this->db->where('id_perangkat', $id_perangkat);
			$this->db->join('perangkat', 'perangkat.id = tbl_solusi.id_perangkat');
			$result = $this->db->get();
		} else {
			$this->db->select('tbl_solusi.*, perangkat.name as perangkat_name');
			$this->db->from($this->_table);
			$this->db->join('perangkat', 'perangkat.id = tbl_solusi.id_perangkat');
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
		$this->db->select('tbl_solusi.*, perangkat.name as perangkat_name');
		$this->db->join('perangkat', 'perangkat.id = tbl_solusi.id_perangkat');
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
    $this->db->update('tbl_solusi', $data);
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


