<?php

defined('BASEPATH') OR exit('No direct script access allowed');

include_once APPPATH.'/third_party/mpdf/mpdf.php';

class M_pdf{

    protected $CI;


    public function __construct(){
        $this->CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }


 
    public function load($param=NULL)
    {
         
        if ($params == NULL)
        {
            $param = '"UTF-8","A4","s","s",10,10,10,10,6,3';         
        }
         
        return new mPDF($param);
    }

}