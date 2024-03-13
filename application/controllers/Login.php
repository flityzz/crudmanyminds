<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct(){
		//call model 
		parent::__construct();
		$this->load->model("Login_Model");
	}

	public function index(){

		$data["title"] = "Login";
		
		$this->load->view('pages/login', $data); 
		
		
	}

    public function store(){
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $user = $this->Login_Model->store($email, $password);

        if($user){
            $this->session->set_userdata("logged_user",$user);
            redirect('dashboard');
        }else{
            redirect('login');
        }
    }

    public function logout(){
        $this->session->unset_userdata("logged_user");
        redirect('login');
    }
}
