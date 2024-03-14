<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){ 
		parent::__construct();
		permission();
		$this->load->model("Product");
		$this->load->model("User");
	}

	public function index()
	{
		$data["products"] = $this->Product->index();
		$data["users"] = $this->User->index();

		$data["title"] = "Dashboard";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);

		$this->load->view('pages/dashboard', $data); 
		
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}
}
