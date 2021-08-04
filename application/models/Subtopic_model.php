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


    public function search_subtopic($sub)
    {
        $where = "ms_title LIKE '%$sub%'";
        $q = $this->db->where($where)
                      ->get('module_subtopic');
        
        $rs=$q->result();

        return $rs;
    }


    public function search_subtopic_title($sub,$id)
    {
        $q=$this->db->query("SELECT * FROM module_subtopic WHERE mt_id='$id' AND ms_title LIKE '%$sub%'");
        
        $rs=$q->result();

        return $rs;
    }


    public function all_subtopic()
    {
        $q = $this->db->get('module_subtopic');

        $rs=$q->result();

        return $rs;
    }


    public function all_subtopic_title($id)
    {
        $q=$this->db->query("SELECT * FROM module_subtopic WHERE mt_id='$id'");

        $rs=$q->result();

        return $rs;
    }

}

?>