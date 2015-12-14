<?php
class Products_model extends CI_Model
{
	function get_all()
	{
		$this->db->order_by('Name','ASC');
		$results = $this->db->get('equipment')->result();
		return $results;
	}

	function get_product($id)
	{
		$this->db->where('Id', $id);
		$result = $this->db->get('equipment')->result();
		return $result[0];
	}

	function get_rarity()
	{
		$query = $this->db->get('rarity');
		return $query->result();
	}

	function get_type()
	{
		$query = $this->db->get('equipment_type');
		return $query->result();
	}

	function get_searched($name)
	{
		$this->db->like('Name',$name);
		$this->db->order_by('Name','ASC');
		$results = $this->db->get('equipment')->result();
		return $results;
	}

	function buying($data)
	{
		$this->db->insert('equipment_buying', $data);
		return;
	}

	function insert_rarity($data)
	{
		$this->db->insert('rarity', $data);
		return;
	}

	function insert_type($data)
	{
		$this->db->insert('equipment_type', $data);
		return;
	}

	function insert_equipment($data)
	{
		$this->db->insert('equipment', $data);
		return;
	}

	function delete_rarity()
	{
		$this->db->where('Id', $this->uri->segment(3));
		$this->db->delete('rarity');
		return;
	}

	function delete_type()
	{
		$this->db->where('Id', $this->uri->segment(3));
		$this->db->delete('equipment_type');
		return;
	}

	function delete_equipment()
	{
		$this->db->where('Id', $this->uri->segment(3));
		$this->db->delete('equipment');
		return;
	}
}