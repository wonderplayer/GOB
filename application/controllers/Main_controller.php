<?php
	class Main_controller extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
		}
		//Index function just for starting page
		function index()
		{
			$data = array();

			if($query = $this->News_model->get_news_preview())
			{
				$data['records'] = $query;
			}
			$this->load->view('header_view');
			$this->load->view('home_view', $data);
			$this->load->view('footer_view');
		}

		//Adds news in database
		function add_news()
		{
			$data=array(
				'Title' => $this->input->post('title'),
				'Description' => $this->input->post('description'),
				'Date' => date("Y-m-d H:i:s",time())
			);
			$this->News_model->add_news($data);
			$this->index();
		}

		//Deletes news from database
		function delete_news()
		{
			$this->News_model->delete_news();
			$this->index();
		}

		//Updates news in database
		function update_news()
		{
			//Id is required to nkow precisely which news are we supposed to update
			//Tried to push it into array but didn't work
			$Id = $this->input->post('id');
			$data = array(
				'Title' => $this->input->post('title'),
				'Description' => $this->input->post('description'),
				'Date' => date("Y-m-d H:i:s",time())
			);

			$this->News_model->update_news($data, $Id);
			$this->index();
		}

		//Goes to news creating view
		function goto_create_news()
		{
			$this->load->view('header_view');
			$this->load->view('create_news_view');
			$this->load->view('footer_view');
		}

		//Goes to shop view
		function goto_shop()
		{
			$this->load->view('header_view');
			$this->load->view('shop_view');
			$this->load->view('footer_view');
		}

		//Goes to forum view
		function goto_forums()
		{
			$this->load->view('header_view');
			$this->load->view('forums_view');
			$this->load->view('footer_view');
		}

		//Shows only selected news
		function show_news()
		{
			$data = array();

			if($query = $this->News_model->get_news())
			{
				$data['records'] = $query;
			}
			$this->load->view('header_view');
			$this->load->view('news_view', $data);
			$this->load->view('footer_view');
		}

		//Goes to updating news view
		function goto_update_news()
		{
			$data = array();
			if($query = $this->News_model->get_news())
			{
				$data['id'] = $query[0]->Id;
				$data['title'] = $query[0]->Title;
				$data['description'] = $query[0]->Description;
			}
			$this->load->view('header_view');
			$this->load->view('edit_news_view', $data);
			$this->load->view('footer_view');
		}

		//Goes to login
		function goto_login_view()
		{
			$this->load->view('header_view');
			$this->load->view('login_view');
			$this->load->view('footer_view');
		}

		//Goes to registration
		function goto_registration_view()
		{
			$this->load->view('header_view');
			$this->load->view('registration_view');
			$this->load->view('footer_view');
		}

		//Validates credentials of user
		function validate_credentials()
		{
			$this->load->model('user_model');
			$query = $this->user_model->validate();

			//If user is found
			if($query)
			{
				$data = array(
					'Email' => $this->input->post('email'),
					'is_logged_in' => true
				);
				$this->session->set_userdata($data);
				$this->index();
			}
			else
			{
				$this->goto_login_view();
			}
		}

		//Sign ups user
		function create_user()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]|min_length[4]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[16]|min_length[4]');
			$this->form_validation->set_rules('password2', 'Password confirmation', 'trim|required|matches[password]');
		
			if($this->form_validation->run() == false)
			{
				$this->goto_registration_view();
			}
			else
			{
				$this->load->model('user_model');
				if($query = $this->user_model->create_user())
				{

					$this->load->view('header_view');
					$this->load->view('thankyou_view');
					$this->load->view('footer_view');
				}
				else
				{
					$this->goto_registration_view();
				}
			}
		}

		//Logout
		function logout()
		{
			$this->session->sess_destroy();
			$this->index();
		}
	}