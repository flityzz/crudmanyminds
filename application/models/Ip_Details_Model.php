<?php 

class Ip_Details_Model extends CI_Model{

    public function store($ip_detail){

        $this->db->insert('ip_details', $ip_detail);
    }

    public function attempts($ip,$loginTime){
        $query = $this->db->where("ip", $ip)
        ->where("login_time >", $loginTime)
        ->get("ip_details")
        ->result_array();

        return count($query);
        
    }
}