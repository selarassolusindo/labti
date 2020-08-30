<?php
class Kelompok_dan_penilaian_model extends CI_Model {

	private $_table = "jadwal_pelaksanaan";
	private $primary_key = "NO_JADWAL_PRAKTIKUM";

// jadwal_pelaksanaan.PRAKTIKUM_JADWAL_PRAKTIKUM,
// praktikum.NAMA_PRAKTIKUM,
// jadwal_pelaksanaan.DOSEN_PAGI_JADWAL_PRAKTIKUM,
// jadwal_pelaksanaan.ASISTEN_PAGI_JADWAL_PRAKTIKUM,
// jadwal_pelaksanaan.PELAKSANAAN_PAGI_JADWAL_PRAKTIKUM,
// jadwal_pelaksanaan.DOSEN_SORE_JADWAL_PRAKTIKUM,
// jadwal_pelaksanaan.ASISTEN_SORE_JADWAL_PRAKTIKUM,
// jadwal_pelaksanaan.PELAKSANAAN_SORE_JADWAL_PRAKTIKUM,
// jadwal_pelaksanaan.PERIODE_JADWAL_PRAKTIKUM
	var $table = "peserta";
	var $column_order = array(null, 'NIM_PESERTA', 'NAMA_PESERTA'); 
	var $column_search = array('NIM_PESERTA','NAMA_PESERTA');
	var $order = array('NIM_PESERTA' => 'ASC'); // default order 

	public function __construct()
	{
		$this->load->database();
	}

	/**
	 * Get All Record from table
	 * @return Object
	 */
	private function _get_datatables_query()
	{
		// $this->db->select('KODE_PRAKTIKUM, NAMA_PRAKTIKUM, SMST_PRAKTIKUM, BIAYA_PRAKTIKUM');
		// $this->db->select('jadwal_pelaksanaan.NO_JADWAL_PRAKTIKUM, jadwal_pelaksanaan.PRAKTIKUM_JADWAL_PRAKTIKUM, praktikum.NAMA_PRAKTIKUM, jadwal_pelaksanaan.DOSEN_PAGI_JADWAL_PRAKTIKUM, jadwal_pelaksanaan.ASISTEN_PAGI_JADWAL_PRAKTIKUM, jadwal_pelaksanaan.PELAKSANAAN_PAGI_JADWAL_PRAKTIKUM, jadwal_pelaksanaan.DOSEN_SORE_JADWAL_PRAKTIKUM, jadwal_pelaksanaan.ASISTEN_SORE_JADWAL_PRAKTIKUM, jadwal_pelaksanaan.PELAKSANAAN_SORE_JADWAL_PRAKTIKUM, jadwal_pelaksanaan.PERIODE_JADWAL_PRAKTIKUM`');

	    $this->db->from($this->table);
	    $this->db->join('tbuser', 'NIM_PESERTA = NIM_TBUSER', 'LEFT');
      	$array = array('PERIODE_PESERTA' => '1', 
	      		'THNPELAKSANAAN_PESERTA' => '2018', 
	      		'KELAS_PESERTA' => 'pagi', 
	      		'PRAK_PESERTA' => 'TI2342');
		$this->db->where($array);  
		$this->db->order_by("NIM_PESERTA", "ASC");

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
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
	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
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
		$this->db->delete($this->table);
	}
}