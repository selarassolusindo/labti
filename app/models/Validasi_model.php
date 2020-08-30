<?php
class Validasi_model extends CI_Model {

	var $table = "peserta";
	var $primary_key = "ID_PESERTA";
	var $column_order = array(null, 'NIM_PESERTA','NAMA_TBUSER'); //field yang ada di table user
	var $column_search = array('NIM_PESERTA','NAMA_TBUSER'); //field yang diizin untuk pencarian 
	var $order = array('NIM_PESERTA' => 'asc'); // default order 

	public function __construct()
	{	
		parent::__construct();
		$this->load->database();
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

	// 

	/**
	* Get One Record by condition
	* @param  Array $condition "example : array('id' => 1)"
	* @return Object
	*/
	public function select_peserta()
	{		
		$list = $this->getJadwalPembukaan();
		foreach ($list as $row){
			$perio = $row->PERIODE_JADWAL_PEMBUKAAN;
			$th = $row->TAHUN_JADWAL_PEMBUKAAN;
			$this->db->select('peserta.ID_PESERTA, peserta.NIM_PESERTA, peserta.PERIODE_PESERTA, peserta.THNPELAKSANAAN_PESERTA, tbuser.NAMA_TBUSER, tbuser.KELAS_TBUSER, peserta.PRAK_PESERTA, SUM(praktikum.BIAYA_PRAKTIKUM) AS BIAYA_PRAKTIKUM, peserta.KETERANGAN_PESERTA');
	      	$this->db->from($this->table);
	      	$this->db->join('praktikum', 'PRAK_PESERTA = KODE_PRAKTIKUM', 'LEFT');
	      	$this->db->join('tbuser', 'NIM_PESERTA = NIM_TBUSER', 'LEFT');
	      	$this->db->where('peserta.PERIODE_PESERTA',$perio);
			$this->db->where('peserta.THNPELAKSANAAN_PESERTA',$th);
			$this->db->group_by('NIM_PESERTA'); 
			$result = $this->db->get();	
		}

		if($result->num_rows() > 0)
		{
			return $result->result();
		}

		return false;
	}

	/**
	 * Action to Update a record
	 * @param  String $id   "primary key table"
	 * @param  Array $data "example : array('title'=>'hello','author'=>'john doe')"
	 * @return {}
	 */

	public function update($condition, $data) 
	{	
		$this->db->trans_start();
		$this->db->update($this->table, $data, $condition);
		$this->db->trans_complete();

		// was there any update or error?
		if ($this->db->affected_rows() == '1')
		{
			return true;
		}
		else
		{
			// if any trans error
			if ($this->db->trans_status() === false)
			{
				return false;
			}
			else
		        {
				return true;
		        }
		}
	} 
	/**
	//  * Get All Record from table
	//  * @return Object
	//  */
	// private function _get_datatables_query()
	// {	
	// 	$list = $this->getJadwalPembukaan();
	// 	foreach ($list as $row){
	// 		$perio = $row->PERIODE_JADWAL_PEMBUKAAN;
	// 		$th = $row->TAHUN_JADWAL_PEMBUKAAN;
	// 		$this->db->select('peserta.ID_PESERTA, peserta.NIM_PESERTA, tbuser.NAMA_TBUSER, peserta.PRAK_PESERTA, SUM(praktikum.BIAYA_PRAKTIKUM) AS BIAYA_PRAKTIKUM, peserta.KETERANGAN_PESERTA');
	//       	$this->db->from($this->table);
	//       	$this->db->join('praktikum', 'PRAK_PESERTA = KODE_PRAKTIKUM', 'LEFT');
	//       	$this->db->join('tbuser', 'NIM_PESERTA = NIM_TBUSER', 'LEFT');
	//       	$this->db->where('peserta.PERIODE_PESERTA',$perio);
	// 		$this->db->where('peserta.THNPELAKSANAAN_PESERTA',$th);
	// 		$this->db->group_by('NIM_PESERTA'); 
	// 	}

	// 	$i = 0;
	
	// 	foreach ($this->column_search as $item) // loop column 
	// 	{
	// 		if($_POST['search']['value']) // if datatable send POST for search
	// 		{
				
	// 			if($i===0) // first loop
	// 			{
	// 				$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
	// 				$this->db->like($item, $_POST['search']['value']);
	// 			}
	// 			else
	// 			{
	// 				$this->db->or_like($item, $_POST['search']['value']);
	// 			}

	// 			if(count($this->column_search) - 1 == $i) //last loop
	// 				$this->db->group_end(); //close bracket
	// 		}
	// 		$i++;
	// 	}
		
	// 	if(isset($_POST['order'])) // here order processing
	// 	{
	// 		$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	// 	} 
	// 	else if(isset($this->order))
	// 	{
	// 		$order = $this->order;
	// 		$this->db->order_by(key($order), $order[key($order)]);
	// 	}
	// }

	// function get_datatables()
	// {
	// 	$this->_get_datatables_query();
	// 	if($_POST['length'] != -1)
	// 	$this->db->limit($_POST['length'], $_POST['start']);
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

	// function count_filtered()
	// {
	// 	$this->_get_datatables_query();
	// 	$query = $this->db->get();
	// 	return $query->num_rows();
	// }

	// public function count_all()
	// {
	// 	$this->db->from($this->table);
	// 	return $this->db->count_all_results();
	// }

	// /**
	// * Get One Record by condition
	// * @param  Array $condition "example : array('id' => 1)"
	// * @return Object
	// */
	// public function get_by_id_view($id)
	// {
	// 	$this->db->from($this->table);
	// 	$this->db->where('id',$id);
	// 	$query = $this->db->get();
	// 	if($query->num_rows() > 0) {
	// 		$results = $query->result();
	// 	}
	// 	return $results;
	// }

	// /**
	//  * Get One Record by condition
	//  * @param  Array $condition "example : array('id' => 1)"
	//  * @return Object
	//  */
	// public function get_by_id($id)
	// {	
	// 	$list = $this->getJadwalPembukaan();
	// 	foreach ($list as $row){
	// 		$perio = $row->PERIODE_JADWAL_PEMBUKAAN;
	// 		$th = $row->TAHUN_JADWAL_PEMBUKAAN;
	// 		$this->db->select('peserta.ID_PESERTA, peserta.NIM_PESERTA, peserta.KELAS_PESERTA, peserta.PERIODE_PESERTA, peserta.THNPELAKSANAAN_PESERTA, tbuser.NAMA_TBUSER, peserta.PRAK_PESERTA, SUM(praktikum.BIAYA_PRAKTIKUM) AS BIAYA_PRAKTIKUM, peserta.KETERANGAN_PESERTA');
	//       	$this->db->from($this->table);
	//       	$this->db->join('praktikum', 'PRAK_PESERTA = KODE_PRAKTIKUM', 'LEFT');
	//       	$this->db->join('tbuser', 'NIM_PESERTA = NIM_TBUSER', 'LEFT');
	// 		$this->db->where($this->primary_key,$id);
	//       	$this->db->where('peserta.PERIODE_PESERTA',$perio);
	// 		$this->db->where('peserta.THNPELAKSANAAN_PESERTA',$th);
	// 		$this->db->group_by('NIM_PESERTA'); 
	// 	}
	// 	// $this->db->from($this->table);
	// 	// $this->db->where($this->primary_key,$id);
	// 	$query = $this->db->get();

	// 	return $query->row();
	// }

	// /**
	//  * Action to Create a record
	//  * @param  array $data "example array('title'=>'hello','author'=>'john doe')"
	//  * @return string  "last insert id"
	//  */
	// public function save($data)
	// {
	// 	$this->db->insert($this->table, $data);
	// 	return $this->db->insert_id();
	// }

	// /**
	//  * Action to Update a record
	//  * @param  String $id   "primary key table"
	//  * @param  Array $data "example : array('title'=>'hello','author'=>'john doe')"
	//  * @return {}
	//  */
	// public function update($where, $data)
	// {
	// 	$this->db->update($this->table, $data, $where);
	// 	return $this->db->affected_rows();
	// }

	// /**
	//  * Action Delete a record
	//  * @param  Array $condition 'example array('id' => 2)'
	//  * @return {}
	//  */
	// public function delete($id)
	// {
	// 	$this->db->where($this->primary_key, $id);
	// 	$this->db->delete($this->table);
	// }

}