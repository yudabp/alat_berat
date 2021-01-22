<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Log extends CI_Controller{
  public function __construct(){
    parent::__construct();
     date_default_timezone_set("Asia/Jakarta");
     qazwsxedc();
  }

  public function index(){
    $iduser       = $this->session->userdata('iduser');
    $idcompany    = $this->session->userdata('idcompany');
    
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $data['current_log'] = $this->db->query("SELECT * from log_user where id_user='$iduser' and idcompany='$idcompany' and type='Login' and month(waktu)=month(now()) order by waktu desc limit 1")->row();
    $data['all_log'] = $this->db->query("SELECT * from log_user join superakses on(log_user.id_user=superakses.iduser) where log_user.idcompany='$idcompany' and month(log_user.waktu)=month(now())")->result();
    // var_dump($data['current_log']);
    // var_dump($this->db->last_query());
    // exit;
    $this->load->view('log/loguser', $data);
  }
}
