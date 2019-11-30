<?php
    class Homepage_model extends CI_Model {
        public function __construct() {
			$this->load->database();
        }
        
        public function get_transactions() {
            $this->db->select('products.name as product_name, transactions.from_warehouse, transactions.to_warehouse, transactions.quantity, transactions.date');
            $this->db->from('transactions');
            $this->db->join('products', 'products.id = transactions.product_id');
            $this->db->order_by('date', 'DESC');
            return $this->db->get()->result();
        }

        public function get_total_products() {
            $this->db->select('products.name, SUM(quantity) as quantity');
            $this->db->from('warehouse_products');
            $this->db->join('products', 'products.id = warehouse_products.product_id');
            $this->db->group_by('name');
            return $this->db->get()->result();
        }

        public function get_transaction_records() {
            $this->db->select('YEAR(date) as year_record, MONTHNAME(date) as month_record, COUNT(date) as total');
            $this->db->from('transactions');
            $this->db->group_by('YEAR(date), MONTH(date)');
            return $this->db->get()->result();
        }
    }