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

	function get_user_by_id($Id)
	{
		$this->db->where('Id', $Id);
		$query = $this->db->get('users');
		return $query->result();
	}

	function get_all_users_who_commented($post_id)
	{
		$this->db->where('Post_Id', $post_id);
		$this->db->group_by('User_Id');
		$query = $this->db->get('comments');
		return $query->result();
	}
}