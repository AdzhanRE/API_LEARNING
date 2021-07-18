<?php
header("Access-Control-Allow-Origin: *");
class Module_title extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('title_model','tm');
    }


    //utk viewkan semua title, list semua title
    public function index()
    {
        $msg['data']=$this->tm->list_all();

        $msg['title']="List of all title";

        echo json_encode($msg);
    }


    //utk view spesific title, perlu GET id title
    public function view($id)
    {
        $msg['data']=$this->tm->view($id);

        $msg['title']="The title you choose";

        echo json_encode($msg);
    }


    //utk save atau update title
    //utk save pastikan buat GET id title 0
    //utk update pastikan GET id title
    public function save($id)
    {
        $p=$this->input->post();

        $data=array(
            'mt_title'=>$p['mt_title'],
            'mt_desc'=>$p['mt_desc'],
            'mt_status'=>$p['mt_status'],
            'admin_id'=>$p['admin_id']
        );

        if($id==0)
        {
            $msg['alert']=$this->tm->add($data);
        }
        else
        {
            $msg['alert']=$this->tm->update($id,$data);
        }

        $msg['link_to']='module-page';

        echo json_encode($msg);
    }


    //utk delete title, GET id title tersebut
    public function delete($id)
    {
        $msg=$this->tm->delete($id);

        echo json_encode($msg);
    }
}

?>