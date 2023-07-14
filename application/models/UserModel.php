<?php

class UserModel extends CI_Model
{
    public function get_user($data)
    {
        $q = $this->db->get_where('user', $data);  //select * from user where username = $data["username"] AND password = $data["password"];
        return $q->row(); 
    }

    public function insert_user($input_data) {
        
        $query = $this->db->get_where('user', array("username" => $input_data["username"]));

        if($query->row() !== NULL) {
            return false;
        } else {
          $this->db->insert('user', $input_data);
        }
    }
    
}