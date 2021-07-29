<?php

class Array_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function status_module()
    {
        $arr=array('New','OK','Deleted');
        return $arr;
    }


    public function title_arr()
    {
        $q=$this->db->query("SELECT * FROM module_title");
	    $rs=$q->result();
	    
	    $arr=array();
	    if($rs!='')
	    {
	        foreach($rs as $r)
	        {
	            $arr[$r->mt_id]=$r->mt_title;
	        }
	    }
	    
	    return $arr;
    }

}

?>