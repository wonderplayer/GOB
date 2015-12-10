<?php
	class Main_controller extends CI_Controller
	{
		function index()
		{
			$data = array();

			if($query = $this->News_model->get_news())
			{
				$data['records'] = $query;
			}
			$this->load->view('home_view', $data);
		}

		function add_news()
		{
			$data=array(
				'Title' => $this->input->post('title'),
				'Description' => $this->input->post('description'),
				'Date' => date("Y-m-d",time())
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
			$data = array(
				'Title' => 'New title',
				'Description' => 'Content should be updated'
			);

			$this->News_model->update_news($data);
		}
	}