<?php

class Admin_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    

    public function login($email,$password)
    {
        $q=$this->db->query("SELECT * FROM admin WHERE admin_email='$email' AND admin_password='$password'");
        $rs=$q->first_row();

        return $rs;
    }
}

?>