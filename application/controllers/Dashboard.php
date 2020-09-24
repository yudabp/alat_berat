<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->api->CheckSession();
		 date_default_timezone_set("Asia/Jakarta");
		 qazwsxedc();
	}

	function index()
	{
		$data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
		$this->load->view('dashboard',$data);
	}
}
?>
