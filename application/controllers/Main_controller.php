<?php
	class Main_controller extends CI_Controller
	{
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

		function delete_news()
		{
			$this->News_model->delete_news();
			$this->index();
		}

		function update_news()
		{
			$Id = $this->input->post('id');
			$data = array(
				'Title' => $this->input->post('title'),
				'Description' => $this->input->post('description'),
				'Date' => date("Y-m-d H:i:s",time())
			);

			$this->News_model->update_news($data, $Id);
			$this->index();
		}

		function goto_create_news()
		{
			$this->load->view('header_view');
			$this->load->view('create_news_view');
			$this->load->view('footer_view');
		}

		function goto_shop()
		{
			$this->load->view('header_view');
			$this->load->view('shop_view');
			$this->load->view('footer_view');
		}

		function goto_forums()
		{
			$this->load->view('header_view');
			$this->load->view('forums_view');
			$this->load->view('footer_view');
		}

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
	}