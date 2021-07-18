<?php

class Question_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function list_all()
    {
        $q=$this->db->query("SELECT * FROM question");
        $rs=$q->result();

        return $rs;
    }


    public function view($id)
    {
        $q=$this->db->query("SELECT * FROM question WHERE q_id='$id'");
        $rs=$q->first_row();

        return $rs;
    }


    public function add($data)
    {
        $q=$this->db->insert('question',$data);

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
        $q=$this->db->where('q_id',$id)
                    ->update('question',$data);

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
        $q=$this->db->where('q_id',$id)
                    ->delete('question');

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