<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Userlog_model extends CI_Model {
 
    public function save_log($param)
    {
        $sql        = $this->db->insert_string('tb_log',$param);
        $ex         = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }

    /**
	 * Get All Record from table
	 * @return Object
	 */
	public function get_traffic()
	{
		$result = $this->db->query("SELECT LOF_DESC FROM tb_log WHERE LOF_DESC = '/user/login' ");

		if($result->num_rows() > 0)
		{
			return $result->num_rows();
		}

		return false;
	}
}