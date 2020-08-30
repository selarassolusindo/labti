<?php
class Mixing_model extends CI_Model {

	private $_table = "tb_solusi";
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
		// $result = $this->db->query('SELECT tanggal, formula, hpp FROM mixing WHERE formula = "formula 1" ORDER BY DATE(tanggal) ASC');
		// return $result->result();
		 $result = $this->db->get($this->_table);

		if($result->num_rows() > 0)
		{
			return $result->result();
		}

		return false;
	}

	// public function get_by_Jml_mixer()
	// {	
	// 	$result = $this->db->query('SELECT tanggal, Jml_mixer, Total_bahan, Hasil_cetak, Waktu FROM mixing ORDER BY DATE(tanggal) ASC');
	// 	return $result->result();
	// }
	// public function get_by_Total_bahan()
	// {	
	// 	$result = $this->db->query('SELECT tanggal, Jml_mixer, Total_bahan, Hasil_cetak, Waktu FROM mixing ORDER BY DATE(tanggal) ASC');
	// 	return $result->result();
	// }
	// public function get_by_Hasil_cetak()
	// {	
	// 	$result = $this->db->query('SELECT tanggal, Jml_mixer, Total_bahan, Hasil_cetak, Waktu FROM mixing ORDER BY DATE(tanggal) ASC');
	// 	return $result->result();
	// }
	// public function get_by_Waktu()
	// {	
	// 	$result = $this->db->query('SELECT tanggal, Jml_mixer, Total_bahan, Hasil_cetak, Waktu FROM mixing ORDER BY DATE(tanggal) ASC');
	// 	return $result->result();
	// }

	//public function get_by_target_total()
	//{	
	//	$result = $this->db->query('SELECT id, tanggal, jawa_pos, duplek, gelondongan, karton, jawa_pos + duplek + gelondongan + karton as total, (jawa_pos + duplek + gelondongan + karton)/30 as totalb FROM tb_solusi ORDER BY DATE(tanggal) ASC');
	//	return $result->result();
	//}
	
	public function get_by_target_total()
	{	
		$result = $this->db->query('SELECT id, tanggal, jawa_pos, duplek, gelondongan, karton, jawa_pos + duplek + gelondongan + karton as total, (jawa_pos + duplek + gelondongan + karton)/30 as totalb FROM tb_solusi ORDER BY DATE(tanggal) ASC');
		return $result->result();
	}

	public function get_by_target_max()
	{
		$result = $this->db->query('SELECT tanggal, max(jawa_pos + duplek + gelondongan + karton)/30 as max FROM tb_solusi WHERE month(tanggal) GROUP BY (month(tanggal))');
		return $result->result();
	}

	/**
	 * Get All Record from table
	 * @return Object
	 */
	public function get_all_with_relation($id_perangkat = null)
	{
		if($id_perangkat) {
			$this->db->select('tb_solusi.*, perangkat.name as perangkat_name');
			$this->db->from($this->_table);
			$this->db->where('id_perangkat', $id_perangkat);
			$this->db->join('perangkat', 'perangkat.id = tb_solusi.id_perangkat');
			$result = $this->db->get();
		} else {
			$this->db->select('tb_solusi.*, perangkat.name as perangkat_name');
			$this->db->from($this->_table);
			$this->db->join('perangkat', 'perangkat.id = tb_solusi.id_perangkat');
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
		$this->db->select('tb_solusi.*, perangkat.name as perangkat_name');
		$this->db->join('perangkat', 'perangkat.id = tb_solusi.id_perangkat');
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
    $this->db->update('tb_solusi', $data);
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


