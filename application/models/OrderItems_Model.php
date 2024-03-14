<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderItems_Model extends CI_Model {

	public function __construct(){
		
		parent::__construct();
		permission();
		$this->load->model("Order_Model");
		$this->load->model("Supplier_Model");
		$this->load->model("Product");

	}

	public function store($orderItem){
		$this->db->insert('order_items', $orderItem);
		
	}

	public function show($orderId){
        return $this->db->get_where("order_items", array(
            "order_id" => $orderId
        ))->result_array();
    }
}
