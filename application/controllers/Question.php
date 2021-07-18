<?php
header("Access-Control-Allow-Origin: *");
class Question extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('question_model','qm');
    }


    //utk viewkan semua question, list semua question
    public function index()
    {
        $msg['data']=$this->qm->list_all();

        $msg['title']="List of all question";

        echo json_encode($msg);
    }


    //utk view spesific question, perlu GET id question
    public function view($id)
    {
        $msg['data']=$this->qm->view($id);

        $msg['title']="The subtopic you choose";

        echo json_encode($msg);
    }


    //utk save atau update question
    //utk save pastikan buat GET id question 0
    //utk update pastikan GET id question
    public function save($id)
    {
        $p=$this->input->post();

        $data=array(
            'q_question'=>$p['q_question'],
            'q_answer'=>$p['q_answer'],
            'user_id'=>$p['user_id'],
            'admin_id'=>$p['admin_id'],
            'ms_id'=>$p['ms_id']
        );

        if($id==0)
        {
            $msg['alert']=$this->qm->add($data);
        }
        else
        {
            $msg['alert']=$this->qm->update($id,$data);
        }

        $msg['link_to']='module-page';

        echo json_encode($msg);
    }


    //utk delete question, GET id question tersebut
    public function delete($id)
    {
        $msg=$this->qm->delete($id);

        echo json_encode($msg);
    }
}

?>