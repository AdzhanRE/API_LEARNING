<?php

class Crud_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function list_all($table)
    {
        $q=$this->db->query("SELECT * FROM '$table'");
        $rs=$q->result();

        return $rs;
    }


    public function view($table,$table_id,$id)
    {
        $q=$this->db->query("SELECT * FROM '$table' WHERE '$table_id'='$id'");
        $rs=$q->first_row();

        return $rs;
    }


    public function add($table,$data)
    {
        $q=$this->db->insert($table,$data);

        if(!$q)
        {
            $error=$this->db->error();
            print_r($error);

            $arr['msg']='';
        }
        else
        {
            $arr['msg']='success';
        }

        return $arr;
    }


    public function update($table,$table_id,$id,$data)
    {
        $q=$this->db->where($table_id,$id)
                    ->update($table,$data);

        if(!$q)
        {
            $error=$this->db->error();
            print_r($error);

            $arr['msg']='';
        }
        else
        {
            $arr['msg']='success';
        }

        return $arr;
    }


    public function delete($table,$table_id,$id)
    {
        $q=$this->db->where($table_id,$id)
                    ->delete($table);

        if(!$q)
        {
            $error=$this->db->error();
            print_r($error);

            $arr['msg']='';
        }
        else
        {
            $arr['msg']='success';
        }

        return $arr;
    }

}

?>