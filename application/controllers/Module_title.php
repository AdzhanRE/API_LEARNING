<?php
header("Access-Control-Allow-Origin: *");
class Module_title extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('title_model','tm');
        $this->load->model('crud_model','crudm');
        $this->load->model('array_model','am');
    }


    //utk viewkan semua title, list semua title
    public function index()
    {

        $table="module_title";

        $msg['data']=$this->crudm->list_all($table);
        $msg['status']=$this->am->status_module();

        $msg['title']="List of all title";

        echo json_encode($msg);
    }


    //utk view spesific title, perlu GET id title
    public function view($id)
    {

        $table="module_title";
        $table_id="mt_id";

        $msg['data']=$this->crudm->view($table,$table_id,$id);
        $msg['status']=$this->am->status_module();

        $msg['title']="The title you choose";

        echo json_encode($msg);
    }


    //utk save atau update title
    //utk save pastikan buat GET id title 0
    //utk update pastikan GET id title
    public function save($id)
    {

        $table="module_title";
        $table_id="mt_id";

        $p=$this->input->post();

        $data=array(
            'mt_title'=>$p['mt_title'],
            'mt_desc'=>$p['mt_desc'],
            'mt_status'=>$p['mt_status'],
            'admin_id'=>$p['admin_id']
        );

        if($id==0)
        {
            $msg['alert']=$this->crudm->add($table,$data);
        }
        else
        {
            $msg['alert']=$this->crudm->update($table,$table_id,$id,$data);
        }

        $msg['link_to']='module-page';

        echo json_encode($msg);
    }


    //utk delete title, GET id title tersebut
    public function delete($id)
    {

        $table="module_title";
        $table_id="mt_id";

        $msg=$this->crudm->delete($table,$table_id,$id);

        echo json_encode($msg);
    }
}

?>