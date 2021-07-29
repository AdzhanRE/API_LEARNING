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

}

?>