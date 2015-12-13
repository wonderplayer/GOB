<?php
class Forum_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function get_post_preview()
	{
		$query = $this->db->get('posts');
		return $query->result();
	}

	function get_post()
	{
		$this->db->where('Id', $this->uri->segment(3));
		$query = $this->db->get('posts');
		return $query->result();
	}

	function delete_post()
	{
		$this->db->where('Id', $this->uri->segment(3));
		$this->db->delete('posts');
	}

	function insert_post($data)
	{
		$this->db->insert('posts',$data);
		return;
	}

	function get_comments()
	{
		$this->db->where('Post_Id', $this->uri->segment(3));
		$query = $this->db->get('comments');
		return $query->result();
	}

	function insert_comment($data)
	{
		$this->db->insert('comments',$data);
		return;
	}

	function delete_comment()
	{
		$this->db->where('Id', $this->uri->segment(3));
		$this->db->delete('comments');
	}
}