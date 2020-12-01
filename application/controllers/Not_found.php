<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Not_found extends CI_Controller {

	function index()
	{
		$this->load->view('errors/404');
	}
}
?>
