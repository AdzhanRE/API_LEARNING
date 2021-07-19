<?php

class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    public function login($email,$password)
    {
        $q=$this->db->query("SELECT * FROM user WHERE user_email='$email' AND user_password='$password'");
        $rs=$q->first_row();

        return $rs;
    }
}

?>