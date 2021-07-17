<?php
header("Access-Control-Allow-Origin: *");
class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('user_model','um');
    }


    //utk viewkan semua user, list semua user
    public function index()
    {
        $msg['data']=$this->um->list_all();

        $msg['title']="List of all user";

        echo json_encode($msg);
    }


    //utk view spesific user, perlu GET id user
    public function view($id)
    {
        $msg['data']=$this->um->view($id);

        $msg['title']="The user you choose";

        echo json_encode($msg);
    }


    //utk save atau update user
    //utk save pastikan buat GET id user 0
    //utk update pastikan GET id user
    public function save($id)
    {
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
            $msg['alert']=$this->um->add($data);
        }
        else
        {
            $msg['alert']=$this->um->update($id,$data);
        }

        $msg['link_to']='login-page';

        echo json_encode($msg);
    }


    //utk delete user, GET id user tersebut
    public function delete($id)
    {
        $msg=$this->um->delete($id);

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