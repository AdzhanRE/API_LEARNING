<?php

class Title_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function list_all()
    {
        $q=$this->db->query("SELECT * FROM module_title");
        $rs=$q->result();

        return $rs;
    }


    public function view($id)
    {
        $q=$this->db->query("SELECT * FROM module_title WHERE mt_id='$id'");
        $rs=$q->first_row();

        return $rs;
    }


    public function add($data)
    {
        $q=$this->db->insert('module_title',$data);

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
        $q=$this->db->where('mt_id',$id)
                    ->update('module_title',$data);

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
        $q=$this->db->where('mt_id',$id)
                    ->delete('module_title');

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