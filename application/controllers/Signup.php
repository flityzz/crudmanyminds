<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
    
    public function __construct(){
		//call model 
		parent::__construct();
		$this->load->model("User");
	}

	public function index(){

		$data["title"] = "Sign-up";
		
		$this->load->view('pages/signup', $data); 
		
		
	}

    public function store(){
        $user = array(
            "username" => $_POST['username'],
            "country" => $_POST['country'],
            "email" => $_POST['email'],
            "password" => md5($_POST['password'])
        );

        $this->User->store($user);
        redirect("login");
    }
}
