<?php
	class News_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		function get_news_preview()
		{
			$query = $this->db->get('news');
			return $query->result();
		}

		function add_news($data)
		{
			$this->db->insert('news',$data);
			return;
		}

		function update_news($data, $Id)
		{
			$this->db->where('Id', $Id);
			$this->db->update('news',$data);
		}

		function delete_news()
		{
			$this->db->where('Id', $this->uri->segment(3));
			$this->db->delete('news');
		}

		function get_news()
		{
			$this->db->where('Id', $this->uri->segment(3));
			$query = $this->db->get('news');
			return $query->result();
		}
	}
