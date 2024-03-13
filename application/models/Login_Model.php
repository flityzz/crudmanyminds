<?php 

class Login_Model extends CI_Model{

    public function store($email,$password){
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        
        $user = $this->db->get("users")->row_array();
        return $user;
    }
}