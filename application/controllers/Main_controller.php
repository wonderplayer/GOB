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
			$query = $this->user_model->validate();
			$user_data = $this->user_model->get_user_data();
			//If user is found
			if($query)
			{
				$data = array(
					'Id' => $user_data[0]->Id,
					'Username' => $user_data[0]->Username,
					'Email' => $this->input->post('email'),
					'is_logged_in' => true
				);
				$this->session->set_userdata($data);
				$this->index();
			}
			else
			{
				$data = array();

				if($query = $this->News_model->get_news_preview())
				{
					$data['records'] = $query;
				}
				$this->load->view('unsucc_login');
				$this->load->view('home_view', $data);
				$this->load->view('footer_view');
			}
		}

		//Sign ups user
		function create_user()
		{
			$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]|min_length[4]|is_unique[users.Username]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.Email]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[16]|min_length[4]');
			$this->form_validation->set_rules('password2', 'Password confirmation', 'trim|required|matches[password]');
		
			if($this->form_validation->run() == false)
			{
				$this->goto_registration_view();
			}
			else
			{
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
			redirect('Main_controller/index');
		}

		//Test
		//Adding item to shopping cart
		function Tadd_product_to_cart()
		{
			//Adding static item to shopping cart
			//To add dynamic items needs to be passed values through form
			$data=array(
				'id' => '1',
				'name' => 'Pants',
				'qty' => 1,
				'price' => 19.99,
				'options' => array('Size' => 'medium')
			);
			$this->cart->insert($data);
			echo 'add() called';
		}

		//Test
		//Show cart
		function Tshow_cart()
		{
			$cart = $this->cart->contents();
			echo '<pre>';
			print_r($cart);
		}

		//Test
		//Adds second product to cart
		function Tadd_product_to_cart2()
		{
			//Adding static item to shopping cart
			//To add dynamic items needs to be passed values through form
			$data=array(
				'id' => '2',
				'name' => 'T-shirt',
				'qty' => 2,
				'price' => 7.99,
				'options' => array('Size' => 'large')
			);
			$this->cart->insert($data);
			echo 'add2() called';
		}

		//Test
		//Updates cart
		function Tupdate_cart()
		{
			$data = array(
				'rowid' => 'df92d3b0122d775e4a531aa55810fb92',
				'qty' => 1
				);
			$this->cart->update($data);
		}

		//Test
		//Shows total price in cart
		function Ttotal_cart()
		{
			echo $this->cart->total();
			echo 'update() called';
		}

		//Test
		//Removes product from cart
		function Tremove_product_from_cart()
		{
			$data = array(
				'rowid' => 'df92d3b0122d775e4a531aa55810fb92',
				'qty' => 0
				);
			$this->cart->update($data);
			echo 'remove() called';
		}

		//Test
		//Destroys cart
		function Tdestroy_cart()
		{
			$this->cart->destroy();
			echo 'destroy() called';
		}

		//Goes to shop view
		function goto_shop()
		{
			$data['products'] = $this->Products_model->get_all();
			$data['rarity'] = $this->Products_model->get_rarity();
			$data['type'] = $this->Products_model->get_type();

			$this->load->view('header_view');
			$this->load->view('shop_view', $data);
			$this->load->view('footer_view');
		}

		//Adds product to cart
		function add_product_to_cart()
		{
			$product = $this->Products_model->get_product($this->input->post('id'));
			
			$insert = array(
				'id' => $this->input->post('id'),
				'qty' => 1,
				'price' => $product->Market_price,
				'name' => $product->Name,
				'rarity' => $product->Rarity_Id,
				'type' => $product->Equipment_type_Id
			);
			$this->cart->insert($insert);
			$message = "Prece tika pievienota grozam!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			$data['products'] = $this->Products_model->get_all();
			$data['rarity'] = $this->Products_model->get_rarity();
			$data['type'] = $this->Products_model->get_type();

			$this->load->view('header_view');
			$this->load->view('shop_view', $data);
			$this->load->view('footer_view');
		}

		//Removes product from cart
		function remove_from_cart($rowid)
		{
			$this->cart->update(array(
				'rowid' => $rowid,
				'qty' => 0
				));
			redirect('Main_controller/goto_grozs');
		}

		//Updates cart
		function update_cart()
		{
			$cart_info = $_POST['cart'];
			foreach ($cart_info as $id => $cart) {
				$rowid = $cart['rowid'];
				$price = $cart['price'];
				$amount = $price * $cart['qty'];
				$qty = $cart['qty'];

				$data = array(
					'rowid' => $rowid,
					'price' => $price,
					'amount' => $amount,
					'qty' => $qty
				);

				$this->cart->update($data);
			}
			redirect('Main_controller/goto_grozs');
		}

		//Search product name
		function search_product()
		{
			$name = $this->input->post('search');
			if ($query = $this->Products_model->get_searched($name))
			{
				$data['products'] = $query;
				$data['rarity'] = $this->Products_model->get_rarity();
				$data['type'] = $this->Products_model->get_type();
			}

			$this->load->view('header_view');
			$this->load->view('shop_view', $data);
			$this->load->view('footer_view');
		}

		//Goes to forum view
		function goto_forums()
		{
			$data = array();
			if($query = $this->Forum_model->get_post_preview())
			{
				$data['records'] = $query;
			}
			$this->load->view('header_view');
			$this->load->view('forums_view',$data);
			$this->load->view('footer_view');
		}

		//Shows post
		function show_post()
		{
			$data = array();
			$data['username'] = array();
			$data['user_id'] = array();
			$data['comments'] = array();
			$data['post'] = array();
			if($post = $this->Forum_model->get_post())
			{
				$data['post'] = $post;
			}
			if($comments = $this->Forum_model->get_comments())
			{
				$data['comments'] = $comments;
				if($userid = $this->Forum_model->get_all_users_who_commented($comments[0]->Post_Id))
				{
					$data['user_id'] = $userid;
				}
			}
			foreach ($data['user_id'] as $user) {
				array_push($data['username'] , $this->Forum_model->get_user_by_id($user->User_Id));
			}
			$this->load->view('header_view');
			$this->load->view('post_view', $data);
			$this->load->view('footer_view');
		}

		//Delete post
		function delete_post()
		{
			$this->Forum_model->delete_post();
			redirect('Main_controller/goto_forums');
		}

		//Goes to view to create post
		function goto_create_post()
		{
			$this->load->view('header_view');
			$this->load->view('create_post_view');
			$this->load->view('footer_view');
		}

		//Create post
		function create_post()
		{
			$data=array(
				'User_Id' => $this->session->userdata('Id'),
				'Title' => $this->input->post('title'),
				'Description' => $this->input->post('description'),
			);
			$this->Forum_model->insert_post($data);
			redirect('Main_controller/goto_forums');
		}

		//Add comment
		function add_comment()
		{
			$data = array(
				'User_Id' => $this->session->userdata('Id'),
				'Post_Id' => $this->input->post('post_id')
			);
			$Comment = $this->input->post('comment');
			$disallowed = array(
				'sūds','sūdu','kroplis'
			);
			$Comment = word_censor($Comment,$disallowed,'****');
			$data['Comment'] = $Comment;
			$Post_Id = $this->input->post('post_id');
			$this->Forum_model->insert_comment($data);
			redirect("Main_controller/show_post/$Post_Id");
		}

		//Deletes comment
		function delete_comment()
		{
			$query = $this->Forum_model->delete_comment();
			$id = $query;
			echo '<pre>';
			print_r($id);
			redirect("Main_controller/show_post/" . $id[0]->Post_Id);
		}

		//Go to cart
		function goto_grozs()
		{
			$data['rarity'] = $this->Products_model->get_rarity();
			$data['type'] = $this->Products_model->get_type();

			$this->load->view('header_view');
			$this->load->view('grozs_view',$data);
			$this->load->view('footer_view');
		}

		//Go to checkout
		function checkout()
		{
			$data['rarity'] = $this->Products_model->get_rarity();
			$data['type'] = $this->Products_model->get_type();

			$this->load->view('header_view');
			$this->load->view('checkout_view',$data);
			$this->load->view('footer_view');
		}

		//Buy
		function buy()
		{
			$cart_info = $_POST['cart'];
			foreach ($cart_info as $id => $cart) {
				$User_Id = $this->session->userdata('Id');
				$Equipment_Id = $cart['id'];
				$qty = $cart['qty'];

				$data = array(
					'Quantity' => $qty,
					'User_Id' => $User_Id,
					'Equipment_Id' => $Equipment_Id
				);

				$this->Products_model->buying($data);
			}
			$this->cart->destroy();
			redirect('Main_controller/goto_succ_buy');
		}

		//Go to successful buying view
		function goto_succ_buy()
		{
			$this->load->view('header_view');
			$this->load->view('succ_buying_view');
			$this->load->view('footer_view');
		}

		//Go to inserting equipment, equipment type, equipment rarity
		function goto_create_equipment()
		{
			$data['rarity'] = $this->Products_model->get_rarity();
			$data['type'] = $this->Products_model->get_type();

			$this->load->view('header_view');
			$this->load->view('create_equipment_view',$data);
			$this->load->view('footer_view');
		}

		//Add equipment to database
		function add_equipment()
		{
			$data = array(
				'Name' => $this->input->post('name'),
				'Equipment_type_Id' => $this->input->post('type'),
				'Rarity_Id' => $this->input->post('rarity'),
				'Game_price' => $this->input->post('game_price'),
				'Market_price' => $this->input->post('market_price')
			);
			$this->Products_model->insert_equipment($data);
			redirect('Main_controller/goto_succ_equip_adding');
		}

		//Add equipment type to database
		function add_equipment_type()
		{
			$data['Type'] = $this->input->post('name');
			$this->Products_model->insert_type($data);
			redirect('Main_controller/goto_succ_type_added');
		}

		//Add equipment rarity to database
		function add_equipment_rarity()
		{
			$data['Rarity'] = $this->input->post('name');
			$this->Products_model->insert_rarity($data);
			redirect('Main_controller/goto_succ_rarity_added');
		}

		//Delete equipment rarity
		function delete_rarity()
		{
			$this->Products_model->delete_rarity();
			redirect('Main_controller/goto_create_equipment');
		}

		//Delete equipment type
		function delete_type()
		{
			$this->Products_model->delete_type();
			redirect('Main_controller/goto_create_equipment');
		}

		//Delete equipment
		function delete_equipment()
		{
			$this->Products_model->delete_equipment();
			redirect('Main_controller/goto_shop');
		}

		//Go to successfuly added equipment
		function goto_succ_equip_adding()
		{
			$this->load->view('header_view');
			$this->load->view('succ_equipment_added_view');
			$this->load->view('footer_view');
		}

		//Go to successfuly added equipment type
		function goto_succ_type_added()
		{
			$this->load->view('header_view');
			$this->load->view('succ_type_added_view');
			$this->load->view('footer_view');
		}

		//Go to successfuly added equipment rarity
		function goto_succ_rarity_added()
		{
			$this->load->view('header_view');
			$this->load->view('succ_rarity_added_view');
			$this->load->view('footer_view');
		}

	}