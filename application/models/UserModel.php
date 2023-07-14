<?php

class UserModel extends CI_Model
{
    public function get_user($data)
    {
        $q = $this->db->get_where('user', $data);  //select * from user where username = $data["username"] AND password = $data["password"];
        return $q->row();     
    }
    
}