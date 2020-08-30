<?php
class BProduksi_model extends CI_Model {

	private $_table = "biaya_produksi";
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
		$result = $this->db->get($this->_table);

		if($result->num_rows() > 0)
		{
			return $result->result();
		}

		return false;
	}

	// public function get_by_target_produksi()
	// {	
	// 	$result = $this->db->query('SELECT tanggal, target_produksi, biaya_produksi FROM biaya_produksi ORDER BY DATE(tanggal) ASC');
	// 	return $result->result();
	// }

	public function get_by_target_total()
	{	
		$result = $this->db->query('SELECT id, tanggal, t_ampas, t_gelondongan, t_karton, t_kayu, t_lem, t_plastik, t_solar, t_tali, t_upah_karyawan, t_upah_karyawan_borongan, t_ampas + t_gelondongan +t_karton+t_kayu+t_lem+t_plastik+t_solar+ t_tali+t_upah_karyawan+t_upah_karyawan_borongan as total FROM biaya_produksi ORDER BY DATE(tanggal) ASC');
		return $result->result();
	}

	public function get_by_target_max()
	{
		$result = $this->db->query('SELECT tanggal, max(t_ampas + t_gelondongan + t_karton + t_kayu + t_lem + t_plastik + t_solar + t_tali + t_upah_karyawan + t_upah_karyawan_borongan) as max FROM biaya_produksi WHERE month(tanggal) GROUP BY (month(tanggal))');
		return $result->result();
	}

	/**
	 * Get All Record from table
	 * @return Object
	 */
	public function get_all_with_relation($id_perangkat = null)
	{
		if($id_perangkat) {
			$this->db->select('biaya_produksi.*, perangkat.name as perangkat_name');
			$this->db->from($this->_table);
			$this->db->where('id_perangkat', $id_perangkat);
			$this->db->join('perangkat', 'perangkat.id = biaya_produksi.id_perangkat');
			$result = $this->db->get();
		} else {
			$this->db->select('biaya_produksi.*, perangkat.name as perangkat_name');
			$this->db->from($this->_table);
			$this->db->join('perangkat', 'perangkat.id = biaya_produksi.id_perangkat');
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
		$this->db->select('biaya_produksi.*, perangkat.name as perangkat_name');
		$this->db->join('perangkat', 'perangkat.id = biaya_produksi.id_perangkat');
		$query = $this->db->get_where($this->_table, $condition);

		if($query)
		{
			return $query->row();
		}

		return false;
	}

	function ubah($data, $id){
    $this->db->where('id',$id);
    $this->db->update('biaya_produksi', $data);
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

	/**
	 * Action Delete a record
	 * @param  Array $condition 'example array('id' => 2)'
	 * @return {}
	 */
	public function delete($condition)
	{
		return $this->db->delete($this->_table, $condition);
	}

	
}