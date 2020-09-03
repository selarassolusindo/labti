<?php
class Jadwal_model extends CI_Model {

	var $table = "jadwal_pelaksanaan";
	var $primary_key = "NO_JADWAL_PRAKTIKUM";
	var $column_order = array(null, 'PRAKTIKUM_JADWAL_PRAKTIKUM','DOSEN_PAGI_JADWAL_PRAKTIKUM','ASISTEN_PAGI_JADWAL_PRAKTIKUM','PELAKSANAAN_PAGI_JADWAL_PRAKTIKUM', 'DOSEN_SORE_JADWAL_PRAKTIKUM', 'ASISTEN_SORE_JADWAL_PRAKTIKUM', 'PELAKSANAAN_SORE_JADWAL_PRAKTIKUM', 'PERIODE_JADWAL_PRAKTIKUM', 'KELOMPOK_JADWAL_PRAKTIKUM'); //field yang ada di table user
	var $column_search = array('PRAKTIKUM_JADWAL_PRAKTIKUM'); //field yang diizin untuk pencarian
	var $order = array('NO_JADWAL_PRAKTIKUM' => 'DESC'); // default order

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Get All Record from table
	 * @return Object
	 */
	public function get_all_with_relation()
	{

		$this->db->select('jadwal_pelaksanaan.NO_JADWAL_PRAKTIKUM, praktikum.KODE_PRAKTIKUM, praktikum.NAMA_PRAKTIKUM, jadwal_pelaksanaan.DOSEN_PAGI_JADWAL_PRAKTIKUM, jadwal_pelaksanaan.ASISTEN_PAGI_JADWAL_PRAKTIKUM, jadwal_pelaksanaan.PELAKSANAAN_PAGI_JADWAL_PRAKTIKUM, jadwal_pelaksanaan.DOSEN_SORE_JADWAL_PRAKTIKUM, jadwal_pelaksanaan.ASISTEN_SORE_JADWAL_PRAKTIKUM, jadwal_pelaksanaan.PELAKSANAAN_SORE_JADWAL_PRAKTIKUM,  jadwal_pelaksanaan.PERIODE_JADWAL_PRAKTIKUM, jadwal_pelaksanaan.KELOMPOK_JADWAL_PRAKTIKUM');
	    $this->db->from('praktikum');
	    $this->db->join('jadwal_pelaksanaan', 'PRAKTIKUM_JADWAL_PRAKTIKUM = KODE_PRAKTIKUM', 'INNER');
		$this->db->order_by("jadwal_pelaksanaan.NO_JADWAL_PRAKTIKUM", "DESC");
		$result = $this->db->get();

		if($result->num_rows() > 0)
		{
			return $result->result();
		}

		return false;
	}

	private function _get_datatables_query()
	{
		$this->db->select('jadwal_pelaksanaan.NO_JADWAL_PRAKTIKUM, jadwal_pelaksanaan.PRAKTIKUM_JADWAL_PRAKTIKUM, praktikum.NAMA_PRAKTIKUM, jadwal_pelaksanaan.DOSEN_PAGI_JADWAL_PRAKTIKUM, jadwal_pelaksanaan.ASISTEN_PAGI_JADWAL_PRAKTIKUM, jadwal_pelaksanaan.PELAKSANAAN_PAGI_JADWAL_PRAKTIKUM, jadwal_pelaksanaan.DOSEN_SORE_JADWAL_PRAKTIKUM, jadwal_pelaksanaan.ASISTEN_SORE_JADWAL_PRAKTIKUM, jadwal_pelaksanaan.PELAKSANAAN_SORE_JADWAL_PRAKTIKUM, jadwal_pelaksanaan.PERIODE_JADWAL_PRAKTIKUM`');
	    $this->db->from($this->table);
	    $this->db->join('praktikum', 'PRAKTIKUM_JADWAL_PRAKTIKUM = KODE_PRAKTIKUM', 'LEFT');

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

	public function get_dosen()
	{
		$this->db->select('NAMA_TBUSER, GELAR_TBUSER, GELAR_DEPAN_TBUSER');
	    $this->db->from('tbuser');
	    $this->db->where('KETERANGAN_TBUSER', 'dosen');
		$result = $this->db->get();

		if($result->num_rows() > 0)
		{
			return $result->result();
		}

		return false;
	}

	public function get_dosen_sore()
	{
		$this->db->select('NAMA_TBUSER, GELAR_TBUSER, GELAR_DEPAN_TBUSER');
	    $this->db->from('tbuser');
	    $this->db->where('KETERANGAN_TBUSER', 'dosen sore');
		$result = $this->db->get();

		if($result->num_rows() > 0)
		{
			return $result->result();
		}

		return false;
	}

	// public function get_asisten()
	// {
	// 	$this->db->select('NAMA_TBUSER, GELAR_TBUSER, GELAR_DEPAN_TBUSER');
	//     $this->db->from('tbuser');
 //      	$array = array('KELAS_TBUSER' => 'pagi', 'KETERANGAN_TBUSER' => 'asisten');
	// 	$this->db->where($array);
	// 	$result = $this->db->get();

	// 	if($result->num_rows() > 0)
	// 	{
	// 		return $result->result();
	// 	}

	// 	return false;
	// }

	public function get_asisten()
	{
		$this->db->select('NAMA_TBUSER, GELAR_TBUSER, GELAR_DEPAN_TBUSER');
	    $this->db->from('tbuser');
      	$array = array('KETERANGAN_TBUSER' => 'asisten');
		$this->db->where($array);
		$result = $this->db->get();

		if($result->num_rows() > 0)
		{
			return $result->result();
		}

		return false;
	}

	public function get_periode()
	{
		$this->db->select('NO_JADWAL_PEMBUKAAN, TAHUN_JADWAL_PEMBUKAAN, PERIODE_JADWAL_PEMBUKAAN');
	    $this->db->from('jadwal_pembukaan');
		$this->db->order_by("NO_JADWAL_PEMBUKAAN", "DESC");
		$result = $this->db->get();

		if($result->num_rows() > 0)
		{
			return $result->result();
		}

		return false;
	}

	public function get_praktikum()
	{
		$this->db->select('ID_PRAKTIKUM, KODE_PRAKTIKUM, NAMA_PRAKTIKUM, SMST_PRAKTIKUM, BIAYA_PRAKTIKUM');
	    $this->db->from('praktikum');
		$this->db->order_by("ID_PRAKTIKUM", "ASC");
		$result = $this->db->get();

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

	public function get_data_grafik() {
		$s = '
			select
				a.PRAKTIKUM_JADWAL_PRAKTIKUM
			    , d.TAHUN_JADWAL_PEMBUKAAN
			    , d.PERIODE_JADWAL_PEMBUKAAN
			    , c.NAMA_PRAKTIKUM
			    , count(a.PRAKTIKUM_JADWAL_PRAKTIKUM) as jumlah_peserta
			from
				jadwal_pelaksanaan a
			    left join peserta b on a.PRAKTIKUM_JADWAL_PRAKTIKUM = b.PRAK_PESERTA
			    left join praktikum c on a.PRAKTIKUM_JADWAL_PRAKTIKUM = c.KODE_PRAKTIKUM
			    left join jadwal_pembukaan d on a.IDPERIODE_JADWAL_PRAKTIKUM = d.NO_JADWAL_PEMBUKAAN
			where
				IDPERIODE_JADWAL_PRAKTIKUM = (select max(IDPERIODE_JADWAL_PRAKTIKUM) as id_jadwal_pembukaan from jadwal_pelaksanaan)
				and b.THNPELAKSANAAN_PESERTA = d.TAHUN_JADWAL_PEMBUKAAN
		    and b.PERIODE_PESERTA = d.PERIODE_JADWAL_PEMBUKAAN
		    and b.KETERANGAN_PESERTA = 'peserta'
			group by
				a.PRAKTIKUM_JADWAL_PRAKTIKUM
		';
		return $this->db->query($s)->result();
	}

}
