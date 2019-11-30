<?php
	class Products_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}

		public function get_products() {
			$this->db->select('id, name, description, price'); 
    		$this->db->from('products'); 
    		return $this->db->get()->result();
		}

		// public function get_products_by_category($id) {
		// 	$this->db->select('name');
		// 	$this->db->from('products');
		// 	$this->db->join('product_category', 'product_category.product_id = products.id');
		// 	$this->db->where('category_id', $id);
    	// 	return $this->db->get()->result();
		// }

		public function get_categories($product_id) {
			$this->db->select('name');
			$this->db->from('categories');
			$this->db->join('product_category', 'product_category.category_id = categories.id');
			$this->db->where('product_id', $product_id);
    		return $this->db->get()->result();
		}

		public function get_recent_product_id() {
			$this->db->select('id');
			$this->db->from('products');
			$this->db->limit(1);
			$this->db->order_by('id',"DESC");
			return $this->db->get()->result();
		}

		public function add_product($data) {
			$this->db->insert('products', $data['product']);
		}

		public function add_product_category($product_category) {
			$this->db->insert('product_category', $product_category);
		}

		public function edit_product($id) {
			$this->db->select('id, name, description, price');
			$this->db->from('products');
			$this->db->where('id', $id);
			return $this->db->get()->result();
		}

		public function update_product($id, $data) {
			$this->db->where('id', $id);
			$this->db->update('products', $data);
		}

		public function delete_product($id) {
			$this->db->where('id', $id);
			$this->db->delete('products');
		}

	}