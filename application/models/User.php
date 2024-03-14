<?php 

class User extends CI_Model{

    public function store($user){
        $this->db->insert('users', $user);
    }

    public function index(){
        return $this->db->get("users")->result_array();
    }
}