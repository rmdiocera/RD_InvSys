<?php
	class Categories extends CI_Controller {
		public function index() {
			$data['categories'] = $this->Categories_model->get_categories();

			$this->load->view('includes/header');
			$this->load->view('categories_list', $data);
		}

		public function add() {
			$data = array('name' => $this->input->post('name'));
			$this->Categories_model->add_category($data);
			redirect('categories');
		}

		public function edit($id) {
			$data['category'] = $this->Categories_model->edit_category($id);
			$this->load->view('categories_details', $data);
		}

		public function update($id) {
			$data = array('name' => $this->input->post('name'));
			$this->Categories_model->update_category($id, $data);
			redirect('categories');
		}

		public function delete($id) {
			$this->Categories_model->delete_category($id);
			redirect('categories');
		}

		
	}