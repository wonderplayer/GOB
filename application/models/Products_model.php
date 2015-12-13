<?php
class Products_model extends CI_Model
{
	function get_all()
	{
		$results = $this->db->get('equipment')->result();
		return $results;
	}

	function get_product($id){
		$this->db->where('Id', $id);
		$result = $this->db->get('equipment')->result();
		return $result[0];
	}
}