<?php
header("Access-Control-Allow-Origin: *");
class Question extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('question_model','qm');
        $this->load->model('crud_model','crudm');
    }


    //utk viewkan semua question, list semua question
    public function index()
    {

        $table="question";

        $msg['data']=$this->crudm->list_all($table);

        $msg['title']="List of all question";

        echo json_encode($msg);
    }


    //utk view all question yg kait ngn subtopic, perlu GET id question
    public function view_all($ms_id,$u_id)
    {

        $msg['data']=$this->qm->view_all($ms_id,$u_id);

        $msg['title']="All question that have the same id";

        echo json_encode($msg);
    }


    //utk view all question by user id
    public function view_all_q($u_id)
    {

        $msg['data']=$this->qm->view_all_q($u_id);

        $msg['title']="All question that have the same user id";

        echo json_encode($msg);
    }


    //utk view spesific question, perlu GET id question
    public function view($id)
    {

        $table="question";
        $table_id="q_id";

        $msg['data']=$this->crudm->view($table,$table_id,$id);

        $msg['title']="The subtopic you choose";

        echo json_encode($msg);
    }


    //utk save atau update question
    //utk save pastikan buat GET id question 0
    //utk update pastikan GET id question
    public function save($id)
    {

        $table="question";
        $table_id="q_id";

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
            $msg['alert']=$this->crudm->add($table,$data);
        }
        else
        {
            $msg['alert']=$this->crudm->update($table,$table_id,$id,$data);
        }

        $msg['link_to']='module-page';

        echo json_encode($msg);
    }


    //utk delete question, GET id question tersebut
    public function delete($id)
    {

        $table="question";
        $table_id="q_id";

        $msg['alert']=$this->crudm->delete($table,$table_id,$id);

        echo json_encode($msg);
    }
}

?>