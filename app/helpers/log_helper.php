<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function helper_log($str = ""){
    $CI =& get_instance();
  
    // paramester
    $param['LOG_NIM']       = $CI->session->userdata('nim');
    $param['LOG_NAMA']      = ucwords($CI->session->userdata('username'))."";
    $param['LOF_DESC']      = $str;
 
    //load model log
    $CI->load->model('userlog_model');
 
    //save to database
    $CI->userlog_model->save_log($param);
 
}