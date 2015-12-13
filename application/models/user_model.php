<?php
	class User_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		function validate()
		{
			$this->db->where('Email', $this->input->post('email'));
			$this->db->where('Password',md5($this->input->post('password')));
			$query = $this->db->get('users');
			if($query->num_rows() == 1 )
			{
				return true;
			}
		}

		function get_user_data()
		{
			$this->db->where('Email', $this->input->post('email'));
			$this->db->where('Password',md5($this->input->post('password')));
			$query = $this->db->get('users');
			if($query->num_rows() == 1 )
			{
				return $query->result();
			}
			return 'nothing';
		}

		function create_user()
		{
			$new_user_insert_data = array(
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password'))
			);

			$insert = $this->db->insert('users', $new_user_insert_data);
			return $insert;
		}
	}