<?php

class Question_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

   public function view_all($ms_id,$u_id)
   {
    $q=$this->db->query("SELECT * FROM question WHERE ms_id='$ms_id' AND user_id='$u_id'");
    $rs=$q->result();

    return $rs;
   }

}

?>