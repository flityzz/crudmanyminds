<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suppliers extends CI_Controller {

    public function __construct(){
		parent::__construct();
		permission();
		$this->load->model("Supplier_Model");
		
	}

    public function index(){
		
		$data["suppliers"] = $this->Supplier_Model->index();

		$data["title"] = "Suppliers";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);

		$this->load->view('pages/suppliers', $data);
		
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

    public function new(){
		$data["title"] = "Supplier";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);

		$this->load->view('pages/form-suppliers', $data);
		
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

    public function store(){
		$supplier = $_POST;
		
		$supplier['active'] = 1;

		$this->Supplier_Model->store($supplier);
		redirect('suppliers');
	}

}