<?php
class Pembukaan_praktikum_model extends CI_Model {

	private $_table = "jadwal_pembukaan";
	private $primary_key = "NO_JADWAL_PEMBUKAAN";

	var $table = "jadwal_pembukaan";
	var $column_order = array(null, 'TAHUN_JADWAL_PEMBUKAAN','PERIODE_JADWAL_PEMBUKAAN', 'TAHUN_AJARAN_JADWAL_PEMBUKAAN', 'SEMESTER_JADWAL_PEMBUKAAN'); 
	var $column_search = array('TAHUN_JADWAL_PEMBUKAAN','PERIODE_JADWAL_PEMBUKAAN', 'TAHUN_AJARAN_JADWAL_PEMBUKAAN', 'SEMESTER_JADWAL_PEMBUKAAN');
	var $order = array('NO_JADWAL_PEMBUKAAN' => 'DESC'); // default order 

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
      	$this->db->from($this->table);

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
	//END FUNC INDEX//


	//BEGIN FUNC IDETAIL//
	/**
	 * Get All Record from table
	 * @return Object
	 */
	public function get_all_with_relation($no = null)
	{
		if($no) 
		{
			$this->db->select('a.ID_JADWAL_PEMBUKAAN_PRAKTIKUM, a.AWAL_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM, a.AKHIR_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM, b.NO_JADWAL_PEMBUKAAN, b.TAHUN_JADWAL_PEMBUKAAN, b.PERIODE_JADWAL_PEMBUKAAN, c.KODE_PRAKTIKUM, c.NAMA_PRAKTIKUM, c.SMST_PRAKTIKUM, c.BIAYA_PRAKTIKUM');
			$this->db->from('jadwal_pembukaan_praktikum AS a');		
			$this->db->join('jadwal_pembukaan AS b', 'a.JADWAL_PEMBUKAAN = b.NO_JADWAL_PEMBUKAAN', 'LEFT');
			$this->db->join('praktikum AS c', 'a.PRAKTIKUM_JADWAL_PEMBUKAAN_PRAKTIKUM = c.ID_PRAKTIKUM', 'LEFT');
			$this->db->where('b.NO_JADWAL_PEMBUKAAN',$no);
			$this->db->order_by('c.ID_PRAKTIKUM', 'ASC'); 
			$result = $this->db->get();
		} else 
		{
			$this->db->select('a.ID_JADWAL_PEMBUKAAN_PRAKTIKUM, a.AWAL_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM, a.AKHIR_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM, b.NO_JADWAL_PEMBUKAAN, b.TAHUN_JADWAL_PEMBUKAAN, b.PERIODE_JADWAL_PEMBUKAAN, c.KODE_PRAKTIKUM, c.NAMA_PRAKTIKUM, c.SMST_PRAKTIKUM, c.BIAYA_PRAKTIKUM');
			$this->db->from('jadwal_pembukaan_praktikum AS a');		
			$this->db->join('jadwal_pembukaan AS b', 'a.JADWAL_PEMBUKAAN = b.NO_JADWAL_PEMBUKAAN', 'LEFT');
			$this->db->join('praktikum AS c', 'a.PRAKTIKUM_JADWAL_PEMBUKAAN_PRAKTIKUM = c.ID_PRAKTIKUM', 'LEFT');
			$this->db->where('b.NO_JADWAL_PEMBUKAAN',$no);
			$this->db->order_by('c.ID_PRAKTIKUM', 'ASC'); 
			$result = $this->db->get();
		}

		if($result->num_rows() > 0){
		    $results = $result->result();
		} else {
		     $results = $result->result();
		}
		return $results;
	}

	/**
	 * Get One Record by condition
	 * @param  Array $condition "example : array('id' => 1)"
	 * @return Object
	 */
	public function get_praktikum_by($no)
	{
		$query = $this->db->query("SELECT ID_PRAKTIKUM, KODE_PRAKTIKUM, NAMA_PRAKTIKUM, SMST_PRAKTIKUM, BIAYA_PRAKTIKUM FROM praktikum WHERE ID_PRAKTIKUM NOT IN (SELECT PRAKTIKUM_JADWAL_PEMBUKAAN_PRAKTIKUM FROM jadwal_pembukaan_praktikum WHERE JADWAL_PEMBUKAAN = '$no')");

		if($query->num_rows() > 0){
		    $results = $query->result();
		} else {
		     $results = $query->result();
		}
		return $results;
	}

	/**
	* Get One Record by condition
	* @param  Array $condition "example : array('id' => 1)"
	* @return Object
	*/
	public function get_open_prak_by($id)
	{	
		$this->db->select('a.AWAL_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM, a.AKHIR_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM, b.NO_JADWAL_PEMBUKAAN, b.TAHUN_JADWAL_PEMBUKAAN, b.PERIODE_JADWAL_PEMBUKAAN, c.KODE_PRAKTIKUM, c.NAMA_PRAKTIKUM');
		$this->db->from('jadwal_pembukaan_praktikum AS a');		
		$this->db->join('jadwal_pembukaan AS b', 'a.JADWAL_PEMBUKAAN = b.NO_JADWAL_PEMBUKAAN', 'LEFT');
		$this->db->join('praktikum AS c', 'a.PRAKTIKUM_JADWAL_PEMBUKAAN_PRAKTIKUM = c.ID_PRAKTIKUM', 'LEFT');
		$this->db->where('b.NO_JADWAL_PEMBUKAAN',$id);
		$query = $this->db->get();

		if($query->num_rows() > 0){
		    $results = $query->result();
		} else {
		     $results = $query->result();
		}
		return $results;
	}

	/**
	* Get One Record by condition
	* @param  Array $condition "example : array('id' => 1)"
	* @return Object
	*/
	public function get_by_id_view($id)
	{	
		$this->db->select('a.AWAL_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM, a.AKHIR_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM, b.NO_JADWAL_PEMBUKAAN, b.TAHUN_JADWAL_PEMBUKAAN, b.PERIODE_JADWAL_PEMBUKAAN, c.KODE_PRAKTIKUM, c.NAMA_PRAKTIKUM');
		$this->db->from('jadwal_pembukaan_praktikum AS a');		
		$this->db->join('jadwal_pembukaan AS b', 'a.JADWAL_PEMBUKAAN = b.NO_JADWAL_PEMBUKAAN', 'LEFT');
		$this->db->join('praktikum AS c', 'a.PRAKTIKUM_JADWAL_PEMBUKAAN_PRAKTIKUM = c.ID_PRAKTIKUM', 'LEFT');
		$this->db->where('b.NO_JADWAL_PEMBUKAAN',$id);
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
	public function get_by_id($no)
	{
		$this->db->select('a.NO_JADWAL_PEMBUKAAN,a.TAHUN_JADWAL_PEMBUKAAN, a.PERIODE_JADWAL_PEMBUKAAN, a.TAHUN_AJARAN_JADWAL_PEMBUKAAN, a.SEMESTER_JADWAL_PEMBUKAAN');
		$this->db->from('jadwal_pembukaan AS a');
		$this->db->where('a.NO_JADWAL_PEMBUKAAN',$no);
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
		return $this->db->insert_batch('jadwal_pembukaan_praktikum', $data);
	}

	/**
	 * Action to Update a record
	 * @param  String $id   "primary key table"
	 * @param  Array $data "example : array('title'=>'hello','author'=>'john doe')"
	 * @return {}
	 */
	public function update_detail($condition, $data)
	{
		$this->db->trans_start();
		$this->db->update('jadwal_pembukaan_praktikum', $data, $condition);
		$this->db->trans_complete();
		if ($this->db->affected_rows() == '1')
		{
			return true;
		}
		else
		{
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
	 * Action Delete a record
	 * @param  Array $condition 'example array('id' => 2)'
	 * @return {}
	 */
	public function hapus_detail($id)
	{	
		$this->db->where('ID_JADWAL_PEMBUKAAN_PRAKTIKUM', $id);
        return $this->db->delete('jadwal_pembukaan_praktikum');
	}

	//END FUNC DETAIL//


	//BEGIN BERITA DEPAN//
	function tampil()
	{
		$query = $this->db->get($this->_table);
			if($query ->num_rows()>0)
			{
				return $query->result();
			}else

			{
			return array();
		}
	}

	public function tampildesc()
	{
		$this->db->select('berita.*');
		$this->db->from($this->_table);
		$this->db->order_by("ID_BERITA", "DESC");
        $this->db->limit(3);
		$result = $this->db->get();
		
		if($result->num_rows() > 0)
		{
			return $result->result();
		}

		return false;
	}

	public function tampilasc()
	{
		$this->db->select('berita.*');
		$this->db->from($this->_table);
		$this->db->order_by("ID_BERITA", "DESC");
        $this->db->limit(9);
		$result = $this->db->get();
		
		if($result->num_rows() > 0)
		{
			return $result->result();
		}

		return false;
	}

	

	function per_id($id)
	{
		$this->db->where('ID_BERITA',$id);
		$query = $this->db->get($this->_table);
		return $query->result();
	}

}