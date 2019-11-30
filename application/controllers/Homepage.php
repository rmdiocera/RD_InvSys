<?php
	class Homepage extends CI_Controller {
		public function index() {
			$data['transactions'] = $this->Homepage_model->get_transactions();
			$data['products'] = $this->Homepage_model->get_total_products();
			$data['records'] = $this->Homepage_model->get_transaction_records();

			$this->load->view('includes/header');
			$this->load->view('index', $data);
		}
	}