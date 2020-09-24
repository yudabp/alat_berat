<?php 
class Architecture extends CI_Controller{

	function all_project(){
		$data['data'] = $this->db->query("SELECT * FROM add_project")->result();
		$this->load->view('architecture/all_project', $data);
	}
	// ------------add project-------------
	function add_project(){
		$data['jkljj'] = $this->db->query("SELECT * FROM project_types")->result();
		$data['date'] = $this->db->query("SELECT * FROM contacts")->result();
		$data['prov'] = $this->db->query("SELECT * FROM provinces")->result();
		$this->load->view('architecture/add_project', $data);
	}
	function regency(){
		$get_prov = $this->input->post("get_prov");
		$date= $this->db->query("SELECT * FROM regencies where province_id='$get_prov'")->result();
		$data = array(
			"valuedata" => $date
		);
		echo json_encode($data);
	}
	function distric(){
		$get_kab = $this->input->post("get_kab");
		$date = $this->db->query("SELECT * FROM districts where regency_id='$get_kab'")->result();
		$data = array("valuedat" => $date);
		echo json_encode($data);
	}
	function vallige(){
		$get_kel = $this->input->post("get_kel");
		$date = $this->db->query("SELECT * FROM villages where district_id='$get_kel'")->result();
		$data = array("valueda" => $date);
		echo json_encode($data);
	}
	function subbmit(){
		$code = $this->input->post("code");
		$name_project = $this->input->post("nname_projet");
		$category = $this->input->post("ccategory");
		$pic = $this->input->post("pic");
		$level = $this->input->post("level");
		$date = $this->input->post("date_from");
		$addres = $this->input->post("address");
		$province = $this->input->post("province_id");
		$regency = $this->input->post("regency_id");
		$distric = $this->input->post("district_id");
		$village = $this->input->post("village_all");
		$name_client = $this->input->post("name_client");
		$ktp = $this->input->post("customer_KTP");
		$client_addres = $this->input->post("customer_address");
		$kirim = $this->input->post("kirim");

		$send_all = array(
			'code' => $code,
			'project_name' => $name_project,
			'category' => $category,
			'pic' => $pic,
			'level' => $level,
			'date' => $date,
			'addres' => $addres,
			'province' => $province,
			'regency' => $regency,
			'district' => $distric,
			'village' => $village,
			'name_client' => $name_client,
			'ktp' => $ktp,
			'client_addres' => $client_addres
		);


		if(isset($kirim)){
			$this->db->insert("add_project", $send_all);
			redirect("all-project");
		}


	}


	// ----------------------end---------------------



	function categori(){
		$data['cat'] = $this->db->query("SELECT * FROM project_types")->result();
		$this->load->view('architecture/categories', $data);
	}
	function rab_borongan(){
		$this->load->view('architecture/rab_borongan');
	}
	function rab_penawaran(){
		$this->load->view('architecture/rab_penawaran');
	}
	function worker_level(){
		$data['wage'] = $this->db->query("SELECT * FROM worker_types")->result();
		$this->load->view('architecture/worker_level', $data);
	}
	function worker_types(){
		$data['data'] = $this->db->query("SELECT * FROM worker_subtypes")->result();
		$this->load->view('architecture/worker_types', $data);
	}
	function deleted(){
		$diambil = $this->input->post("id");
		$this->db->query("DELETE FROM project_types WHERE idtypes='$diambil'");
		redirect('categories');
	}
	function get_data_status(){
		$get = $this->input->post('id');
		$ambil = $this->db->query("SELECT * FROM project_types where idtypes='$get' ")->row_array();
		$data = array(
			"inilah" => $ambil
		);
		echo json_encode($data);
	}

	function add_categories(){
		$one = $this->input->post("new_category");
		$color = $this->input->post("colorpic");
		$id_types = $this->uuid->v4();
		$idcompany = $this->session->userdata("idcompany");
		$all = array(
			'idtypes' => $id_types,
			'idcompany' => $idcompany,
			'types' => $one,
			'color' => $color,
			'created_at' => date("Y-m-d H:i:s")
		);
		$this->db->insert('project_types', $all);
	}
	function updated(){
		$name = $this->input->post("department_title");
		$idcategory = $this->input->post("get_idcategory");
		
		$this->db->query("UPDATE project_types SET types='$name' WHERE idtypes='$idcategory' ");
	}
	function created_worker(){
		$name = $this->input->post("workername");
		$wage = $this->input->post("workerwage");
		$idworker = $this->uuid->v4();
		$idcompany = $this->session->userdata("idcompany");
		$all = array(
			'idworker' => $idworker,
			'idcompany' => $idcompany,
			'workername' => $name,
			// 'workerwage' => $wage,
			'created_at' => date("Y-m-d")
		);
		$this->db->insert('worker_types', $all);
	}
	function deleted_worker(){
		$getid = $this->input->post("id");
		$this->db->query("DELETE FROM worker_types WHERE idworker='$getid'");
		redirect("worker-level");
	}
	function get_data_worker(){
		$get = $this->input->post('id');
		$ambil = $this->db->query("SELECT * FROM worker_types where idworker='$get' ")->row_array();
		$data = array(
			"inilah" => $ambil
		);
		echo json_encode($data);
	}
	function update_workerlevel(){
	 	$name = $this->input->post("name");
		$idworker = $this->input->post("idworker");
		$wage = $this->input->post("wage");
		$date = date("Y-m-d");
		$this->db->query("UPDATE worker_types SET workername='$name' WHERE idworker='$idworker' ");
		$this->db->query("UPDATE worker_types SET created_at='$date' WHERE idworker='$idworker' ");
	 	// $this->db->query("UPDATE worker_types SET workerwage='$wage' WHERE idworker='$idworker' ");
	 }
	 function created_subtypes(){
		$name = $this->input->post("subtypesname");
		$idworker = $this->uuid->v4();
		$idcompany = $this->session->userdata("idcompany");
		$all = array(
			'idsubtypes' => $idworker,
			'idcompany' => $idcompany,
			'name' => $name,
			'created_at' => date("Y-m-d")
		);
		$this->db->insert('worker_subtypes', $all);
	}
	function deleted_subtypes(){
		$getid = $this->input->post("id");
		$this->db->query("DELETE FROM worker_subtypes WHERE idsubtypes='$getid'");
		redirect("worker-types");
	}
	function get_data_subtypes(){
		$get = $this->input->post('id');
		$ambil = $this->db->query("SELECT * FROM worker_subtypes where idsubtypes='$get' ")->row_array();
		$data = array(
			"inilah" => $ambil
		);
		echo json_encode($data);
	}
	function update_subtypes(){
	 	$name = $this->input->post("name");
		$idworker = $this->input->post("idworker");
		$date = date("Y-m-d");
		 $this->db->query("UPDATE worker_subtypes SET name='$name' WHERE idsubtypes='$idworker' ");
		 $this->db->query("UPDATE worker_subtypes SET created_at='$date' WHERE idsubtypes='$idworker'");
	}
	function created_allproject(){
		$project = $this->input->post("project");
        $pic = $this->input->post("pic");
        $region = $this->input->post("region");
        $custumor = $this->input->post("custumor");
		$idworker = $this->uuid->v4();
		$idcompany = $this->session->userdata("idcompany");
		$subtypes = array(
			'idallproject' => $idworker,
			'idcompany' => $idcompany,
			'allprojectname' => $project,
			'allprojectpic' => $pic,
			'allprojectregion' => $region,
			'allprojectcostumer' => $custumor,
			'created_at' => date("Y-m-d H:i:s")
		);
		$this->db->insert('worker_allproject', $subtypes);
	}
	function edit_allproject(){
		$get = $this->input->post('id');
		$ambil = $this->db->query("SELECT * FROM add_project WHERE code='$get' ")->row_array();
		$data = array(
			"forall" => $ambil
		);
		echo json_encode($data);
	}
	function update_allproject(){
	 	$projet = $this->input->post("edit_allproject");
	 	$pic = $this->input->post("edit_picall");
	 	$region = $this->input->post("edit_regionall");
	 	$custumor = $this->input->post("edit_custumerall");
		$idallproject = $this->input->post("get_idallproject");
	 	$this->db->query("UPDATE add_project SET project_name='$projet' WHERE code='$idallproject' ");
	 	$this->db->query("UPDATE add_project SET pic='$pic' WHERE code='$idallproject' ");
	 	$this->db->query("UPDATE add_project SET province='$region' WHERE code='$idallproject' ");
	 	$this->db->query("UPDATE add_project SET name_client='$custumor' WHERE code='$idallproject' ");

	}
	function delete_allproject(){
		$getid = $this->input->post("id");
		$this->db->query("DELETE FROM add_project WHERE code='$getid'");
		redirect("worker-types");
	}
	

	//--------------------- worker ---------------------------------

	function worker(){
		$data['jklj'] = $this->db->query("SELECT * FROM worker")->result();
		$data['nmkl'] = $this->db->query("SELECT * FROM worker_subtypes")->result();
		$data['nmckl'] = $this->db->query("SELECT * FROM worker_types")->result();
		$this->load->view("architecture/worker", $data);
	}
	function add_add_add(){
		$name = $this->input->post("workername");
		$type = $this->input->post("workertype");
		$level = $this->input->post("workerlevel");
		$wage = $this->input->post("workerwage");
		$idworker = $this->uuid->v4();
		$idcompany = $this->session->userdata("idcompany");
		$all = array(
			'idworker' => $idworker,
			'idcompany' => $idcompany,
			'nama' => $name,
			'type' => $type,
			'level' => $level,
			'wage' => $wage,
			'created_at' => date("l ,Y-M-d")
		);
		$this->db->insert('worker', $all);
		$this->db->query("UPDATE contoh SET code='$name'");
	}
	function get_data_worker_c(){
		$get = $this->input->post('id');
		$ambil = $this->db->query("SELECT * FROM worker where idworker='$get' ")->row_array();
		$data = array(
			"inilah" => $ambil
		);
		echo json_encode($data);
	}
	function update_workerlevel_c(){
		$name = $this->input->post("name");
	   $idworker = $this->input->post("idworker");
	   $wage = $this->input->post("wage");
	   $type = $this->input->post("type");
	   $level = $this->input->post("level");
	   $dataa = date("l ,Y-M-d");
		$this->db->query("UPDATE worker SET nama='$name' WHERE idworker='$idworker' ");
		$this->db->query("UPDATE worker SET wage='$wage' WHERE idworker='$idworker' ");
		$this->db->query("UPDATE worker SET created_at='$dataa' WHERE idworker='$idworker' ");
		$this->db->query("UPDATE worker SET type='$type' WHERE idworker='$idworker' ");
		$this->db->query("UPDATE worker SET level='$level' WHERE idworker='$idworker' ");
		$this->db->query("UPDATE contoh SET code='$name'");
	}
	function deleted_worker_c(){
		$getid = $this->input->post("id");
		$this->db->query("DELETE FROM worker WHERE idworker='$getid'");
		redirect("worker");
	}

	//---------------------- workers checkins ---------------------------------------
	function workers_checkins(){
		$data['jklj'] = $this->db->query("SELECT * FROM add_project")->result();
		$this->load->view("architecture/workers_checkins",$data);
	}
	function get_cll(){
		$id = $this->input->post('id');
		$ambil = $this->db->query("SELECT * FROM contacts where first_name='$id'")->row_array();
		$data = array("vallue" => $ambil);
		echo json_encode($data);
	}
	function dataaa(){
		$name = $this->input->post("name");
		
		$fruit = $this->db->query("SELECT * FROM worker")->result();
		// $biji = $this->db->query("SELECT * FROM contoh JOIN worker ON contoh.code=worker.nama WHERE contoh")->result();
		$data = array("onee" => $fruit);
		echo json_encode($data);
	}
	
	function gambar(){
		$from = strtotime($this->input->post("from"));
		$fromm = date('Y-m-d',$from);
		$to = strtotime($this->input->post("id"));
		$too = date('Y-m-d',$to);
		$biji = $this->db->query("SELECT * FROM contoh JOIN worker ON contoh.code=worker.nama WHERE contoh.date BETWEEN '$fromm' AND '$too' ")->row_array();
		$data = array("mvp" => $biji);
		echo json_encode($data);
		
	}
	//---------------------- worker overtimes --------------------------------------

	function workers_overtimes(){
		$this->load->view("architecture/workers-overtimes");
	}

	function contoh(){
		$this->load->view("architecture/color/index");
	}

}

?>