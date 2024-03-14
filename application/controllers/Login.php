<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct(){
		//call model 
		parent::__construct();
		$this->load->model("Login_Model");
        $this->load->model("Ip_Details_Model");
	}

	public function index(){
		$data["title"] = "Login";
		
		$this->load->view('pages/login', $data); 
	}

    public function store(){
        $loginAttempts = $this->Ip_Details_Model->attempts($_SERVER['REMOTE_ADDR'], time() - 15);
    
        if($loginAttempts >= 3){
            $data["message"] = 'Your account has been blocked. Please try again in 15 seconds.';
            $data["attempts"] = $loginAttempts;
            $data["title"] = "Login";
            $this->load->view('pages/login', $data);
            return;
        }
    
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
    
        $user = $this->Login_Model->store($email, $password);
    
        if($user){
            $this->session->set_userdata("logged_user", $user);
            redirect('dashboard');
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
            $loginTime = time();
    
            $ip_detail['ip'] = $ip;
            $ip_detail['login_time'] = $loginTime;
    
            $this->Ip_Details_Model->store($ip_detail);
            $data["title"] = "Login";
            $data["message"] = 'Wrong credentials';
            $this->load->view('pages/login', $data);
        }
    }
    
    public function logout(){
        $this->session->unset_userdata("logged_user");
        redirect('login');
    }
}
