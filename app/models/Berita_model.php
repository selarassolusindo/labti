<?php
class Berita_model extends CI_Model {

	private $_table = "berita";
	private $primary_key = "ID_BERITA";

	var $table = "berita";
	var $column_order = array(null, 'JUDUL_BERITA','ISI_BERITA','TANGGAL_BERITA'); 
	var $column_search = array('JUDUL_BERITA');
	var $order = array('ID_BERITA' => 'ASC'); // default order 

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
      	$this->db->order_by("ID_BERITA", "DESC");

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

	
	//////////////////////////////////////////////


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