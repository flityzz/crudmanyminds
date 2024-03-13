<?php


class Product extends CI_Model {

    public function index(){
        return $this->db->get("products")->result_array();
    }

    public function store($product){
        $this->db->insert('products', $product);
    }

    public function show($id){
        return $this->db->get_where("products", array(
            "id" => $id
        ))->row_array();
    }

    public function update($id, $product){
        $this->db->where("id",$id);
        return $this->db->update("products", $product);
    }

}