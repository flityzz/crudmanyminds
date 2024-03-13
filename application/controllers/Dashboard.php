<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->model("Product");
		$data["products"] = $this->Product->index();

		

		$data["title"] = "Dashboard";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);

		$this->load->view('pages/dashboard', $data); // page view name
		
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}
}
