<?php

class Subtopic_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function view_all_topic($table,$table_id,$mt_id)
    {
        $q=$this->db->query("SELECT * FROM $table WHERE $table_id='$mt_id'");
        $rs=$q->result();

        return $rs;
    }

}

?>