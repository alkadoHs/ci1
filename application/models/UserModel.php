<?php

class UserModel extends CI_Model
{
    public function get_user($data)
    {
        $q = $this->db->query("SELECT * FROM user WHERE username = '".$data["username"]."' AND password = '".$data["password"]."'");
        return $q->result_array();
    }
    
}