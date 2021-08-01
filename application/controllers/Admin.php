<?php
header("Access-Control-Allow-Origin: *");
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin_model','am');
        $this->load->model('crud_model','crudm');
    }


    //utk viewkan semua admin, list semua admin
    public function index()
    {

        $table="admin";

        $msg['data']=$this->crudm->list_all($table);

        $msg['title']="List of all admin";

        echo json_encode($msg);
    }


    //utk view spesific admin, perlu GET id admin
    public function view($id)
    {

        $table="admin";
        $table_id="admin_id";

        $msg['data']=$this->crudm->view($table,$table_id,$id);

        $msg['title']="The admin you choose";

        echo json_encode($msg);
    }


    //utk save atau update admin
    //utk save pastikan buat GET id admin 0
    //utk update pastikan GET id admin
    public function save($id)
    {

        $table="admin";
        $table_id="admin_id";

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
            $msg['alert']=$this->crudm->add($table,$data);
        }
        else
        {
            $msg['alert']=$this->crudm->update($table,$table_id,$id,$data);
        }

        $msg['link_to']='login-page';

        echo json_encode($msg);
    }


    //utk delete admin, GET id admin tersebut
    public function delete($id)
    {

        $table="admin";
        $table_id="admin_id";

        $msg['alert']=$this->crudm->delete($table,$table_id,$id);

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