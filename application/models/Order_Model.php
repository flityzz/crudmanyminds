<?php


class Order_Model extends CI_Model {

    public function index(){
        return $this->db->get("orders")->result_array();
    }

    public function store($order){
        $this->db->insert('orders', $order);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function show($id){
        return $this->db->get_where("orders", array(
            "id" => $id
        ))->row_array();
    }

    public function update($id, $order){

         $this->db->where("id",$id);
         return $this->db->update("orders", $order);
        
    }

}