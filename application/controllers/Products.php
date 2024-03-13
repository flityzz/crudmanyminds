<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function index(){
		$this->load->model("Product");
		$data["products"] = $this->Product->index();

		

		$data["title"] = "Products";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);

		$this->load->view('pages/products', $data);
		
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function new(){
		$data["title"] = "Products";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);

		$this->load->view('pages/form-products', $data);
		
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function store(){
		$product = $_POST;
		
		$product['active'] = 1;

		$this->load->model("Product");
		$this->Product->store($product);
		redirect('dashboard');
	}

	public function edit($id){
		$this->load->model("Product");
		$data["product"] = $this->Product->show($id);

		$data["title"] = "Edit Product";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);

		$this->load->view('pages/form-products', $data);
		
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function update($id){
		$this->load->model("Product");

		$product = $_POST;

		$this->Product->update($id,$product);

		redirect('products');
	}

	public function active($id){
		$this->load->model("Product");
		$data["product"] = $this->Product->show($id);
		$product = $data["product"];

		$product["active"] = 1;
		$this->Product->update($id,$product);

		redirect('products');
	}

	public function delete($id){
		$this->load->model("Product");
		$data["product"] = $this->Product->show($id);
		$product = $data["product"];

		$product["active"] = 0;
		$this->Product->update($id,$product);

		redirect('products');
	}
}
