<?php
header("Access-Control-Allow-Origin: *");
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin_model','am');
    }


    //utk viewkan semua admin, list semua admin
    public function index()
    {
        $msg['data']=$this->am->list_all();

        $msg['title']="List of all admin";

        echo json_encode($msg);
    }


    //utk view spesific admin, perlu GET id admin
    public function view($id)
    {
        $msg['data']=$this->am->view($id);

        $msg['title']="The admin you choose";

        echo json_encode($msg);
    }


    //utk save atau update admin
    //utk save pastikan buat GET id admin 0
    //utk update pastikan GET id admin
    public function save($id)
    {
        $p=$this->input->post();

        $data=array(
            'admin_fname'=>$p['admin_fname'],
            'admin_lname'=>$p['admin_lname'],
            'admin_notel'=>$p['admin_notel'],
            'admin_email'=>$p['admin_email'],
            'admin_password'=>$p['admin_password']
        );

        if($id==0)
        {
            $msg['alert']=$this->am->add($data);
        }
        else
        {
            $msg['alert']=$this->am->update($id,$data);
        }

        $msg['link_to']='login-page';

        echo json_encode($msg);
    }


    //utk delete admin, GET id admin tersebut
    public function delete($id)
    {
        $msg=$this->am->delete($id);

        echo json_encode($msg);
    }


    //utk login, ni gune POST
    public function login()
    {
        $p=$this->input->post();

        $email=$p['admin_email'];
        $password=$p['admin_password'];

        $rs=$this->am->login($email,$password);

        $msg=array();

        if($rs!='')
        {
            $id=$rs->admin_id;

            $msg['alert']='success';
            $msg['link_to']='home-page';
            $msg['admin_id']=$id;
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