<?php
class Peserta_model extends CI_Model {

	var $table = "peserta";
	var $primary_key = "ID_PESERTA";
	var $column_order = array(null, 'NIM','NAMA','PTI','ALGO','JARKOM' ); //field yang ada di table user
	var $column_search = array('NIM_TBUSER','NAMA_TBUSER'); //field yang diizin untuk pencarian 
	var $order = array('NIM' => 'asc'); // default order 

	public function __construct()
	{	
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Get All Record from table
	 * @return Object
	 */
	private function _get_datatables_query()
	{
		$this->db->select('`tbuser`.`NIM_TBUSER` AS `NIM`, `tbuser`.`NAMA_TBUSER` AS `NAMA`, max( ( CASE WHEN ( `peserta`.`PRAK_PESERTA` = "TI1340" ) THEN "Rp. 100.000" ELSE "-" END ) ) AS `PTI`, max( ( CASE WHEN ( `peserta`.`PRAK_PESERTA` = "TI2341" ) THEN "Rp. 100.000" ELSE "-" END ) ) AS `ALGO`, max( ( CASE WHEN ( `peserta`.`PRAK_PESERTA` = "TI2342" ) THEN "Rp. 100.000" ELSE "-" END ) ) AS `JARKOM`');
      	$this->db->from($this->table);
      	$this->db->join('tbuser', 'NIM_PESERTA = NIM_TBUSER', 'LEFT');
      	$this->db->join('praktikum', 'PRAK_PESERTA = KODE_PRAKTIKUM', 'LEFT');
      	$this->db->where('`peserta`.`PERIODE_PESERTA`', '2');
      	$this->db->group_by("NIM_PESERTA");
		// $this->db->query("select `tbuser`.`NIM_TBUSER` AS `NIM`,`tbuser`.`NAMA_TBUSER` AS `NAMA`,max((case when (`peserta`.`PRAK_PESERTA` = 'TI1340') then `praktikum`.`BIAYA_PRAKTIKUM` end)) AS `PTI`,max((case when (`peserta`.`PRAK_PESERTA` = 'TI2341') then `praktikum`.`BIAYA_PRAKTIKUM` end)) AS `ALGO`,max((case when (`peserta`.`PRAK_PESERTA` = 'TI2342') then `praktikum`.`BIAYA_PRAKTIKUM` end)) AS `JARKOM`,sum(`praktikum`.`BIAYA_PRAKTIKUM`) AS `TOTAL` from ((`peserta` left join `tbuser` on((`peserta`.`NIM_PESERTA` = `tbuser`.`NIM_TBUSER`))) left join `praktikum` on((`peserta`.`PRAK_PESERTA` = `praktikum`.`KODE_PRAKTIKUM`))) where (`peserta`.`PERIODE_PESERTA` = '2') group by `peserta`.`NIM_PESERTA` order by `peserta`.`NIM_PESERTA`");

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