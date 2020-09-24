<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Api{
    protected $_ci;
     function __construct(){
        $this->_ci =& get_instance();
        //$data['_config_content']=$this->_ci->load->view($theme,$data,true);
    }
    function CheckSession(){
        $session = $this->_ci->session->userdata('status_login');
        $level = $this->_ci->session->userdata('level');
        $suspended = $this->_ci->session->userdata('suspended');
      	if($session!=TRUE || $suspended=='yes'){
          $this->_ci->session->set_flashdata('item','Mohon maaf akun anda telah disuspend');
          session_destroy();
          redirect(site_url(''));
      	}
    }
    function CheckLogin(){
      $session = $this->_ci->session->userdata('status_login');
      $level = $this->_ci->session->userdata('level');
      $suspended = $this->_ci->session->userdata('suspended');
      if($session==TRUE && $suspended=="no"){
        redirect(site_url('beranda'));
      }
    }

    function CheckLoginRoot(){
      $session = $this->_ci->session->userdata('status_login');
      $level = $this->_ci->session->userdata('level');
      if($session==TRUE){
          redirect(site_url('su-dashboard'));
      }
    }

    function imgRandom($length = 15) {
	    $characters = '0123456789';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;
	}
}
