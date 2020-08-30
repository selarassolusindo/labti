<?php
class Profil_model extends CI_Model {

	var $table = "tbuser";
	var $primary_key = "ID_TBUSER";

	public function __construct()
	{	
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Get All Record from table
	 * @return Object
	 */
	public function get_all_by_id($id =null)
	{
		if($id) 
		{
			$this->db->select('ID_TBUSER, NIM_TBUSER, NAMA_TBUSER, GELAR_TBUSER, GELAR_DEPAN_TBUSER, KELAS_TBUSER, JENISKELAMIN_TBUSER, NOTELP_TBUSER, EMAIL_TBUSER, FOTO_TBUSER, PASSWORD_TBUSER, LEVEL_TBUSER');
	      	$this->db->from($this->table);
	      	$this->db->where('`tbuser`.`NIM_TBUSER`', $id);
			$result = $this->db->get();
		} else 
		{
			$this->db->select('ID_TBUSER, NIM_TBUSER, NAMA_TBUSER, GELAR_TBUSER, GELAR_DEPAN_TBUSER, KELAS_TBUSER, JENISKELAMIN_TBUSER, NOTELP_TBUSER, EMAIL_TBUSER, FOTO_TBUSER, PASSWORD_TBUSER, LEVEL_TBUSER');
	      	$this->db->from($this->table);
	      	$this->db->where('`tbuser`.`NIM_TBUSER`', $id);
			$result = $this->db->get();	
		}
		
		if($result->num_rows() > 0)
		{
			return $result->result();
		}

		return false;
	}

	public function get_password_by_id($id =null)
	{	
		if($id) 
		{
			$this->db->select('NIM_TBUSER, PASSWORD_TBUSER');
			$this->db->from($this->table);
			$this->db->where('NIM_TBUSER',$id);
			$query = $this->db->get();
		}
		
		if($query->num_rows() > 0) {
			$results = $query->result();
		}
		
		return $results;
	}

	private function _get_datatables_query($id =null)
	{
		$this->db->select('`praktikum`.`KODE_PRAKTIKUM` AS `KODE_PRAKTIKUM`, `praktikum`.`NAMA_PRAKTIKUM` AS `NAMA_PRAKTIKUM`, ucase(`peserta`.`KELAS_PESERTA`) AS `KELAS_PESERTA`, `peserta`.`NILAI_PESERTA` AS `NILAI_PESERTA`, `peserta`.`STATUS_PESERTA` AS `STATUS_PESERTA`');
      	$this->db->from($this->table);
      	$this->db->join('tbuser', 'NIM_PESERTA = NIM_TBUSER', 'LEFT');
      	$this->db->join('praktikum', 'PRAK_PESERTA = KODE_PRAKTIKUM', 'LEFT');
      	$this->db->where('`peserta`.`NIM_PESERTA`', $id);

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
		$this->_get_datatables_query($id =null);
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
	public function get_one($condition)
	{
		$query = $this->db->get_where($this->table, $condition);

		if($query)
		{
			return $query->row();
		}

		return false;
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