<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asset extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->api->CheckSession();
     date_default_timezone_set("Asia/Jakarta");
  }

  public function warehouse()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('assets/warehouse',$data);
  }

  public function stock()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('assets/stock',$data);
  }
}
