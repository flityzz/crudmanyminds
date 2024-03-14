<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		permission();
		$this->load->model("Order_Model");
		$this->load->model("Supplier_Model");
		$this->load->model("Product");
		$this->load->model("User");
		$this->load->model("OrderItems_Model");
	}

	public function index(){
		$data["title"] = "Orders";
		$data["orders"] = $this->Order_Model->index();
		$data["suppliers"] = $this->Supplier_Model->index();
		$data["products"] = $this->Product->index();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);

		$this->load->view('pages/orders', $data);
		
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function new(){
		$data["title"] = "Orders";
		$data["orders"] = $this->Order_Model->index();
		$data["suppliers"] = $this->Supplier_Model->index();
		$data["products"] = $this->Product->index();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);

		$this->load->view('pages/form-orders', $data);
		
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function store(){
		$input = $_POST;
		
		$loggedUserId = $_SESSION['logged_user']['id'];
		$supplierId = $input['supplier_id'];
		$observation = $input['observation'];
		$status = 'active';

		$order = array(
			'user_id' => $loggedUserId,
			'supplier_id' => $supplierId,
			'observation' => $observation,
			'status' => $status
		);

		$orderId = $this->Order_Model->store($order);

		if($orderId){

			
			foreach ($input['quantities'] as $productId => $quantity) {
				if ($quantity > 0) {
					
					$unitPrice = $this->Product->show($productId);
					$unitPrice = $unitPrice['price'];

					$orderItem = array(
						'order_id' => $orderId,
						'product_id' => $productId,
						'quantity' => $quantity,
						'unit_price' => $unitPrice
					);
					
					
					$this->OrderItems_Model->store($orderItem);
					
					
				}
			}

			
		}

		redirect('orders');
		
	}

	public function edit($id){
		
		$data["order"] = $this->Order_Model->show($id);
		
		$data["suppliers"] = $this->Supplier_Model->index();
		
		$data["orderItem"] = $this->OrderItems_Model->show($id);

		$data["products"] = $this->Product->index();

		$data["title"] = "Edit Order";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);

		$this->load->view('pages/form-orders', $data);
		
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function update($id){
		
		$input = $_POST;

		
		$supplierId = $input['supplier_id'];
		$observation = $input['observation'];
		

		$order = array(
			
			'supplier_id' => $supplierId,
			'observation' => $observation,
			
		);

		$this->Order_Model->update($id,$order);
		
		redirect('orders');
	}

	public function delete($id){
		$data["order"] = $this->Order_Model->show($id);
		$order = $data["order"];

		$order["status"] = 'finalized';

		$this->Order_Model->update($id,$order);

		redirect('orders');
	}

	public function active($id){
		
		$data["order"] = $this->Order_Model->show($id);
		$order = $data["order"];

		$product["status"] = "active";
		$this->Order_Model->update($id,$product);

		redirect('orders');
	}
}
