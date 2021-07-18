<?php

class Subtopic_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function list_all()
    {
        $q=$this->db->query("SELECT * FROM module_subtopic");
        $rs=$q->result();

        return $rs;
    }


    public function view($id)
    {
        $q=$this->db->query("SELECT * FROM module_subtopic WHERE ms_id='$id'");
        $rs=$q->first_row();

        return $rs;
    }


    public function add($data)
    {
        $q=$this->db->insert('module_subtopic',$data);

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
        $q=$this->db->where('ms_id',$id)
                    ->update('module_subtopic',$data);

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
        $q=$this->db->where('ms_id',$id)
                    ->delete('module_subtopic');

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