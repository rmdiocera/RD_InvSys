<?php
	class Categories_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}

		public function get_categories() {
			$this->db->select('id, name'); 
			$this->db->from('categories'); 
    		return $this->db->get()->result();
		}

		public function add_category($data) {
			$this->db->insert('categories', $data);
		}

		public function edit_category($id) {
			$this->db->select('id, name');
			$this->db->from('categories');
			$this->db->where('id', $id);
			return $this->db->get()->result();
		}

		public function update_category($id, $data) {
			$this->db->where('id', $id);
			$this->db->update('categories', $data);
		}

		public function delete_category($id) {
			$this->db->where('id', $id);
			$this->db->delete('categories');
		}
	}