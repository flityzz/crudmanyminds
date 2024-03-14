<?php 

class User extends CI_Model{

    public function store($user){
        $this->db->insert('users', $user);
    }

    public function index(){
        return $this->db->get("users")->result_array();
    }

    public function show($id){
        return $this->db->get_where("users", array(
            "id" => $id
        ))->row_array();
    }
}