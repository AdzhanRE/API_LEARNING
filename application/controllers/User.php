<?php
header("Access-Control-Allow-Origin: *");
class User extends CI_Controller
{

    //$table="user";
    //$table_id="user_id";

    public function __construct()
    {
        parent::__construct();

        $this->load->model('user_model','um');
        $this->load->model('crud_model','crudm');
    }


    //utk viewkan semua user, list semua user
    public function index()
    {
        $table="user";
        
        $msg['data']=$this->crudm->list_all($table);
        $msg['count']=$this->um->count_data();

        $msg['title']="List of all user";

        echo json_encode($msg);
    }


    //utk view spesific user, perlu GET id user
    public function view($id)
    {
        $table="user";
        $table_id="user_id";

        $msg['data']=$this->crudm->view($table,$table_id,$id);

        $msg['title']="The user you choose";

        echo json_encode($msg);
    }


    //utk save atau update user
    //utk save pastikan buat GET id user 0
    //utk update pastikan GET id user
    public function save($id)
    {
        $table="user";
        $table_id="user_id";

        $p=$this->input->post();

        $data=array(
            'user_fname'=>$p['user_fname'],
            'user_lname'=>$p['user_lname'],
            'user_notel'=>$p['user_notel'],
            'user_email'=>$p['user_email'],
            'user_password'=>$p['user_password']
        );

        if($id==0)
        {
            $msg['alert']=$this->crudm->add($table,$data);
        }
        else
        {
            $msg['alert']=$this->crudm->update($table,$table_id,$id,$data);
        }

        $msg['link_to']='login-page';

        echo json_encode($msg);
    }


    //utk delete user, GET id user tersebut
    public function delete($id)
    {
        $table="user";
        $table_id="user_id";

        $msg['alert']=$this->crudm->delete($table,$table_id,$id);

        echo json_encode($msg);
    }


    //utk login, ni gune POST
    public function login()
    {
        $p=$this->input->post();

        $email=$p['user_email'];
        $password=$p['user_password'];

        $rs=$this->um->login($email,$password);

        $msg=array();

        if($rs!='')
        {
            $id=$rs->user_id;

            $msg['alert']='success';
            $msg['link_to']='home-page';
            $msg['user_id']=$id;
        }
        else
        {
            $msg['alert']='';
            $msg['notify']='Incorrect email and password';
        }

        echo json_encode($msg);
    }

}

?>