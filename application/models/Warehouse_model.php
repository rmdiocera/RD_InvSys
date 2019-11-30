<?php
	class Warehouse_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}

		public function get_warehouses() {
			$this->db->select('id, name, address'); 
			$this->db->from('warehouses');
			$this->db->order_by('id', 'ASC'); 
    		return $this->db->get()->result();
		}

		public function get_warehouse_details($id) {
			$this->db->select('id, name, address');
			$this->db->from('warehouses');
			$this->db->where('id', $id);
			return $this->db->get()->result();
		}
		
		public function get_warehouse_items($warehouse_id) {
			$this->db->select('products.name, warehouses.id as warehouse_id, warehouse_products.quantity, products.id as product_id, warehouse_products.id as warehouse_product_id');
			// warehouses.name as warehouse_name -> For tutorial refence
			$this->db->from('warehouse_products');
			$this->db->join('warehouses','warehouses.id = warehouse_products.warehouse_id');
			$this->db->join('products','products.id = warehouse_products.product_id');
			$this->db->where('warehouse_id', $warehouse_id);
			return $this->db->get()->result();		
		}

		public function check_product_in_warehouse($warehouse_id, $product_id) {
			$query = $this->db->get_where('warehouse_products', array('warehouse_id' => $warehouse_id, 'product_id' => $product_id));
            if (empty($query->row_array())) {
                return false;
            } else {
                return true;
            }
		}

		public function get_product_details_from($warehouse_id, $product_id) {
			$this->db->select('warehouse_products.quantity, warehouses.name as warehouse_name');
			$this->db->from('warehouse_products');
			$this->db->join('warehouses','warehouses.id = warehouse_products.warehouse_id');
			$this->db->where(array(
				'product_id' => $product_id,
				'warehouse_id' => $warehouse_id
			));
			return $this->db->get()->result();
		}

		public function get_product_details_to($warehouse_id, $product_id) {
			$this->db->select('warehouse_products.quantity, warehouses.name as warehouse_name');
			$this->db->from('warehouse_products');
			$this->db->join('warehouses','warehouses.id = warehouse_products.warehouse_id');
			$this->db->where(array(
				'product_id' => $product_id,
				'warehouse_id' => $warehouse_id
			));
			return $this->db->get()->result();
		}

		public function get_warehouse_destination($warehouse_id) {
			$this->db->select('name');
			$this->db->from('warehouses');
			$this->db->where('id', $warehouse_id);
			return $this->db->get()->result();
		}

		// public function get_products_by_category($id) {
		// 	$this->db->select('name');
		// 	$this->db->from('products');
		// 	$this->db->join('product_category', 'product_category.product_id = products.id');
		// 	$this->db->where('category_id', $id);
    	// 	return $this->db->get()->result();
		// }

		// public function get_product_name($product_id) {
		// 	$this->db->select('name');
		// 	$this->db->from('products');
		// 	$this->db->join('warehouse_products', 'warehouse_products.product_id = products.id');
		// 	$this->db->where('product_id', $product_id);
    	// 	return $this->db->get()->result();
		// }

		public function add_warehouse($data) {
			$this->db->insert('warehouses', $data);
		}

		public function add_product_to_warehouse($data) {
			$this->db->insert('warehouse_products', $data);
		}

		public function add_transaction($data) {
			$this->db->insert('transactions', $data);
		}

		public function edit_warehouse($id) {
			$this->db->select('id, name, address');
			$this->db->from('warehouses');
			$this->db->where('id', $id);
			return $this->db->get()->result();
		}

		public function edit_warehouse_product($product_id, $warehouse_id) {
			$this->db->select('products.name, products.id as product_id, warehouses.id as warehouse_id, warehouse_products.quantity');
			$this->db->from('warehouse_products');
			$this->db->join('products', 'products.id = warehouse_products.product_id');
			$this->db->join('warehouses', 'warehouses.id = warehouse_products.warehouse_id');
			$this->db->where(array(
				'product_id' => $product_id,
				'warehouse_id' => $warehouse_id
			));
			return $this->db->get()->result();
		}

		public function insert_new_quantity($data, $warehouse_id, $product_id) {
			$this->db->where(array(
				'product_id' => $product_id,
				'warehouse_id' => $warehouse_id
			));
			$this->db->update('warehouse_products', $data);
		}

		public function insert_new_product($data) {
			$this->db->insert('warehouse_products', $data);
		}

		public function update_warehouse_product($data, $product_id, $warehouse_id) {
			$this->db->where(array(
				'product_id' => $product_id,
				'warehouse_id' => $warehouse_id
			));
			$this->db->update('warehouse_products', $data);
		}

		public function update_product_quantity($data, $warehouse_id, $product_id) {
			$this->db->where(array(
				'product_id' => $product_id,
				'warehouse_id' => $warehouse_id
			));
			$this->db->update('warehouse_products', $data);
		}

		public function update_warehouse($id, $data) {
			$this->db->where('id', $id);
			$this->db->update('warehouses', $data);
		}

		public function delete_warehouse($id) {
			$this->db->where('id', $id);
			$this->db->delete('warehouses');
		}

		public function delete_warehouse_product($product_id, $warehouse_id) {
			$this->db->where(array(
				'product_id' => $product_id,
				'warehouse_id' => $warehouse_id
			));
			$this->db->delete('warehouse_products');
		}
	}