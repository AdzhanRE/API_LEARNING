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


    public function view($table,$id)
    {
        $q=$this->db->query("SELECT * FROM '$table' WHERE user_id='$id'");
        $rs=$q->first_row();

        return $rs;
    }


    public function add($data)
    {
        $q=$this->db->insert('user',$data);

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


    public function update($id,$data)
    {
        $q=$this->db->where('user_id',$id)
                    ->update('user',$data);

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


    public function delete($id)
    {
        $q=$this->db->where('user_id',$id)
                    ->delete('user');

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