<?php


class Supplier_Model extends CI_Model {

    public function index(){
        return $this->db->get("suppliers")->result_array();
    }

    public function store($supplier){
        $this->db->insert('suppliers', $supplier);
    }

}