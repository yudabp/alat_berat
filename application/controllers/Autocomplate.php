<?php 
class Autocomplate extends CI_Controller{

	function name(){
		$data['name'] = $this->db->query("SELECT * FROM fname")->result();
		$this->load->view('architecture/add_project', $data);
		// echo json_encode($data);
	}
}
?>