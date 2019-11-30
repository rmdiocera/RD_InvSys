<?php
	class Products extends CI_Controller {
		public function index() {
			$data['products'] = $this->Products_model->get_products();
			// Get id from products
			foreach ($data['products'] as $product) {
				$product_id = $product->id;
				$data['categories'][$product_id] = $this->Products_model->get_categories($product_id);
			}

			$data['category_list'] = $this->Categories_model->get_categories();

			$this->load->view('includes/header');
			$this->load->view('product_list', $data);
		}

		public function add() {
			$data['product'] = array('name' => $this->input->post('name'),
						  'price' => $this->input->post('price'),
						  'description' => $this->input->post('desc'),	
			);

			$this->Products_model->add_product($data);

			$product_id = $this->Products_model->get_recent_product_id();
			$categories = $this->input->post('category');
			
			for($i = 0; $i < count($categories); $i++) {
				foreach($product_id as $p_id) {
					$prod_id = $p_id->id;
				}

				$product_category = array(
					'product_id' => $prod_id,
					'category_id' => $categories[$i]
				);

				$this->Products_model->add_product_category($product_category);
			}
			
			redirect('products');
		}

		// public function filter($id) {
			// $data['category_list'] = $this->Categories_model->get_categories();
			// $data['products'] = $this->Products_model->get_products();
			// // Get id from products
			// foreach ($data['products'] as $product) {
			// 	$product_id = $product->id;
			// 	$data['categories'][$product_id] = $this->Products_model->get_categories($product_id);
			// }
		// 	$data['product'] = $this->Products_model->get_products_by_category($id);
			
		// 	$this->load->view('product_list', $data);
		// }

		public function edit($id) {
			$data['product'] = $this->Products_model->edit_product($id);
			$this->load->view('product_details', $data);
		}

		public function update($id) {
			$data = array('name' => $this->input->post('name'),
						  'price' => $this->input->post('price'),
						  'description' => $this->input->post('desc'),	
			);
			$this->Products_model->update_product($id, $data);
			redirect('products');
		}

		public function delete($id) {
			$this->Products_model->delete_product($id);
			redirect('products');
		}

	}