<?php

class Admin_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function list_all()
    {
        $q=$this->db->query("SELECT * FROM admin");
        $rs=$q->result();

        return $rs;
    }


    public function view($id)
    {
        $q=$this->db->query("SELECT * FROM admin WHERE admin_id='$id'");
        $rs=$q->first_row();

        return $rs;
    }


    public function add($data)
    {
        $q=$this->db->insert('admin',$data);

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
        $q=$this->db->where('admin_id',$id)
                    ->update('admin',$data);

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
        $q=$this->db->where('admin_id',$id)
                    ->delete('admin');

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


    public function login($email,$password)
    {
        $q=$this->db->query("SELECT * FROM admin WHERE admin_email='$email' AND admin_password='$password'");
        $rs=$q->first_row();

        return $rs;
    }
}

?>