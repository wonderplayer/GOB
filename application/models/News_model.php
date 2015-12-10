<?php
	class News_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		function get_news()
		{
			$query = $this->db->get('news');
			return $query->result();
		}

		function add_news($data)
		{
			$this->db->insert('news',$data);
			return;
		}

		function update_news($data)
		{
			$this->db->where('Id',1);
			$this->db->update('news',$data);
		}

		function delete_news()
		{
			$this->db->where('Id',$this->uri->segment(3));
			$this->db->delete('news');
		}
	}
