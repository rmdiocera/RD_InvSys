<?php
	class Warehouse extends CI_Controller {
		public function index() {
			$data['warehouses'] = $this->Warehouse_model->get_warehouses();

			$this->load->view('includes/header');
			$this->load->view('warehouse_list', $data);
		}

		public function show($id) {
			$data['warehouse'] = $this->Warehouse_model->get_warehouse_details($id);
			$data['items'] = $this->Warehouse_model->get_warehouse_items($id);
			$data['products'] = $this->Products_model->get_products();

			// Get id from products
			// foreach ($data['items'] as $product) {
			// 	$product_id = $product->product_id;
			// 	$data['items'][$product_id] = $this->Warehouse_model->get_product_name($product_id);
			// }

			// var_dump($data['items']);
			$this->load->view('view_warehouse', $data);
		}

		public function add() {
			$data = array(
				'name' => $this->input->post('name'),
				'address' => $this->input->post('address')
			);
			$this->Warehouse_model->add_warehouse($data);
			redirect('warehouse');
		}

		public function add_product_to_warehouse($warehouse_id) {
			$product_id = $this->input->post('product_id');
			$warehouse_items = $this->Warehouse_model->get_warehouse_items($warehouse_id);

			foreach ($warehouse_items as $items) {
				if ($product_id == $items->product_id) {
					redirect('warehouse/show/'.$warehouse_id);
				}				
			}

			$data = array(
				'product_id' => $this->input->post('product_id'),
				'warehouse_id' => $warehouse_id,
				'quantity' => $this->input->post('quantity')
			);

			$this->Warehouse_model->add_product_to_warehouse($data);
			redirect('warehouse/show/'.$warehouse_id);
		}	

		public function edit($id) {
			$data['warehouse'] = $this->Warehouse_model->edit_warehouse($id);
			$this->load->view('warehouse_details', $data);
		}

		public function edit_warehouse_product($product_id, $warehouse_id) {
			$data['product'] = $this->Warehouse_model->edit_warehouse_product($product_id, $warehouse_id);
			$this->load->view('warehouse_product_details', $data);
		}

		public function update($id) {
			$data = array(
				'name' => $this->input->post('name'),
				'address' => $this->input->post('address')
			);
			$this->Warehouse_model->update_warehouse($id, $data);
			redirect('warehouse');
		}

		public function update_warehouse_product($product_id, $warehouse_id) {
			$data = array(	
				'quantity' => $this->input->post('quantity') 
			);

			$this->Warehouse_model->update_warehouse_product($data, $product_id, $warehouse_id);
			redirect('warehouse/show/'.$warehouse_id);
		}

		public function delete($id) {
			$this->Warehouse_model->delete_warehouse($id);
			redirect('warehouse');
		}

		public function delete_warehouse_product($product_id, $warehouse_id) {
			$this->Warehouse_model->delete_warehouse_product($product_id, $warehouse_id);			
			redirect('warehouse/show/'.$warehouse_id);
		}
		
	}