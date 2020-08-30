<?php
class Master_model extends CI_Model {

	var $table = "tbuser";
	var $primary_key = "ID_TBUSER";
	var $column_order = array(null, 'NIM_TBUSER','NAMA_TBUSER'); //field yang ada di table user
	var $column_search = array('NIM_TBUSER','NAMA_TBUSER'); //field yang diizin untuk pencarian 
	var $order = array('NIM_TBUSER' => 'asc'); // default order 

	public function __construct()
	{	
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Get All Record from table
	 * @return Object
	 */
	private function _get_datatables_query_dosen()
	{
		// $this->db->select('ID_TBUSER, NIM_TBUSER, NAMA_TBUSER, GELAR_TBUSER, GELAR_DEPAN_TBUSER');
      	$this->db->from($this->table);
      	$this->db->where('LEVEL_TBUSER', 'dosen');
      	// $this->db->group_by("NIM_TBUSER");

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

	function get_datatables_dosen()
	{
		$this->_get_datatables_query_dosen();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered_dosen()
	{
		$this->_get_datatables_query_dosen();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_dosen()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	/**
	* Get One Record by condition
	* @param  Array $condition "example : array('id' => 1)"
	* @return Object
	*/
	public function get_by_id_view_dosen($id)
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
	public function get_by_id_dosen($id)
	{
		$this->db->from($this->table);
		$this->db->where('ID_TBUSER',$id);
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


	//========================================//

	/**
	 * Get All Record from table
	 * @return Object
	 */
	private function _get_datatables_query_asisten()
	{
		// $this->db->select('ID_TBUSER, NIM_TBUSER, NAMA_TBUSER, GELAR_TBUSER, GELAR_DEPAN_TBUSER');
      	$this->db->from($this->table);
      	$array = array('KETERANGAN_TBUSER' => 'asisten');
		$this->db->where($array);  
		$this->db->order_by("KELAS_TBUSER", "ASC");

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

	function get_datatables_asisten()
	{
		$this->_get_datatables_query_asisten();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered_asisten()
	{
		$this->_get_datatables_query_asisten();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_asisten()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	/**
	* Get One Record by condition
	* @param  Array $condition "example : array('id' => 1)"
	* @return Object
	*/
	public function get_by_id_asisten($id)
	{
		$this->db->from($this->table);
		$this->db->where('ID_TBUSER',$id);
		$query = $this->db->get();

		return $query->row();
	}

//========================================//

	/**
	 * Get All Record from table
	 * @return Object
	 */
	private function _get_datatables_query_mahasiswa()
	{
		// $this->db->select('ID_TBUSER, NIM_TBUSER, NAMA_TBUSER, GELAR_TBUSER, GELAR_DEPAN_TBUSER');
      	$this->db->from($this->table);
      	$array = array('LEVEL_TBUSER' => 'mahasiswa', 'KETERANGAN_TBUSER' => 'mahasiswa');
		$this->db->where($array);  
		$this->db->order_by("NIM_TBUSER", "ASC");

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

	function get_datatables_mahasiswa()
	{
		$this->_get_datatables_query_mahasiswa();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered_mahasiswa()
	{
		$this->_get_datatables_query_mahasiswa();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_mahasiswa()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	/**
	* Get One Record by condition
	* @param  Array $condition "example : array('id' => 1)"
	* @return Object
	*/
	public function get_by_id_mahasiswa($id)
	{
		$this->db->from($this->table);
		$this->db->where('ID_TBUSER',$id);
		$query = $this->db->get();

		return $query->row();
	}

}