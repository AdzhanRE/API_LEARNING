<?php
header("Access-Control-Allow-Origin: *");
class Module_subtopic extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('subtopic_model','subm');
        $this->load->model('crud_model','crudm');
        $this->load->model('array_model','am');
    }


    //utk viewkan semua subtopic, list semua subtopic
    public function index()
    {

        $table="module_subtopic";

        $msg['data']=$this->crudm->list_all($table);
        $msg['status']=$this->am->status_module();

        $msg['title']="List of all subtopic";

        echo json_encode($msg);
    }


    //utk view spesific subtopic, perlu GET id subtopic
    public function view($id)
    {

        $table="module_subtopic";
        $table_id="ms_id";

        $msg['data']=$this->crudm->view($table,$table_id,$id);
        $msg['status']=$this->am->status_module();
        $msg['module_title']=$this->am->title_arr();

        $msg['title']="The subtopic you choose";

        echo json_encode($msg);
    }


    // ye akn amik sume subtopic yg ade same title
    public function view_all_topic($mt_id)
    {
        $table="module_subtopic";
        $table_id="mt_id";// yg nk dicari

        $msg['data']=$this->subm->view_all_topic($table,$table_id,$mt_id);
        $msg['status']=$this->am->status_module();
        $msg['module_title']=$this->am->title_arr();

        $msg['title']="The subtopic you choose";

        echo json_encode($msg);
    }


    //utk save atau update subtopic
    //utk save pastikan buat GET id subtopic 0
    //utk update pastikan GET id subtopic
    public function save($id)
    {

        $table="module_subtopic";
        $table_id="ms_id";

        $p=$this->input->post();

        if($id==0)
        {
            $status=0;
        }
        else
        {
            $status=1;
        }

        $data=array(
            'ms_title'=>$p['ms_title'],
            'ms_content'=>$p['ms_content'],
            'ms_desc'=>$p['ms_desc'],
            'ms_status'=>$status,
            'mt_id'=>$p['mt_id']
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


    //utk delete subtopic, GET id subtopic tersebut
    public function delete($id)
    {

        $table="module_subtopic";
        $table_id="ms_id";

        //$msg=$this->crudm->delete($table,$table_id,$id);


        echo json_encode($msg);
    }
}

?>