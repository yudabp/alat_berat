<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpParser\Node\Expr\PostInc;

class Warehouse extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->api->CheckSession();
     date_default_timezone_set("Asia/Jakarta");
     qazwsxedc();
  }

  //overview
  public function index()
  {
    // $data['viewdep'] = $this->ShowModel->getDataWHere('department',['departmentstatus'=>'0','idcompany'=>$this->session->userdata('idcompany')])->result();
    // $data['viewdes'] = $this->ShowModel->getDataWHere('designation',['idcompany'=>$this->session->userdata('idcompany')])->result();
    // $data['viewlead'] = $this->ShowModel->getDataWHere('department',['departmentstatus'=>'1','idcompany'=>$this->session->userdata('idcompany')])->result();
    // $data['view'] = $this->db->select('*')
    //                          ->join('department','department.iddepartment = employee.department')
    //                          ->join('designation','designation.iddesignation = employee.jobtitle')
    //                          ->join('employee_access','employee_access.mainid = employee.mainid')
    //                          ->get_where('employee',['employee.idcompany'=>$this->session->userdata('idcompany')])
    //                          ->result();
    // $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    // $this->load->view('hrm/employee',$data);
		$data["warehouse"] = $this->db->select('*')->get_where('branch_office', ["type" => "Warehouse",'idcompany'=>$this->session->userdata('idcompany')])->result();
		$data["sparepart"] = $this->db->select("*")->get_where("product_sparepart", ['idcompany'=>$this->session->userdata('idcompany')])->result();
		$data["sparepart_detail"] = $this->db->select("*")->get_where("branch_sparepart", ["idcompany" => $this->session->userdata('idcompany')])->result();

		$spareitems = [];
		foreach ($data['sparepart'] as $i => $s) {
			array_push($spareitems, (object)[
				"idsparepart" => $s->idsparepart,
				"name" => $s->name,
				"code" => $s->code,
				"stock" => 0,
				"price" => 0
			]);
		}

		$items = [];
		foreach ($data["warehouse"] as $k => $v) {
			array_push($items, (object)[
				"idcompany" => $v->idcompany,
				"branch_id" => $v->branch_id,
				"name" => $v->branch,
				"sparepart" => $spareitems
			]);
		}

		foreach ($data["sparepart_detail"] as $k1 => $v1) {
			foreach ($items as $k2 => $v2) {
				echo "$v2->branch_id == $v1->idbranch ";
				if($v2->branch_id == $v1->idbranch){
					echo "masuk $v1->stock";
					$items[$k2]->sparepart->stock = $v1->stock;
					$items[$k2]->sparepart->price = $v1->price;
					break;
				}
				echo "<br><br>";
			}
			echo "<br>====================<br>";
		}

		// die(var_dump($items[1]));
		// die(var_dump($data["test"]));
		$this->load->view('warehouse/warehouse',$data);
  }

	public function add_sparepart(){
		if($this->input->post("idbranchsparepart") == ""){
			$this->InsertModel->indata('branch_sparepart',[
				"idbranchsparepart" => $this->uuid->v4(),
				"idsparepart" => $this->input->post("idsparepart"),
				"idbranch" => $this->input->post("idbranch"),
				"idcompany" => $this->input->post("idcompany"),
				"stock" => $this->input->post("in"),
				// "price" => $this->input->post("price"),
				"price" => 30000,
			]);
		}else{
			$this->InsertModel->uptdata('branch_sparepart',[
				"idsparepart" => $this->input->post("idsparepart"),
				"idbranch" => $this->input->post("idbranch"),
				"idcompany" => $this->input->post("idcompany"),
				"stock" => $this->input->post("in"),
				"price" => $this->input->post("price"),
			],["idBranchsparepart" => $this->input->post("idbranchsparepart")]);
		}
	
		echo json_encode(["callback" => $this->input->post("idbranchsparepart")]);
	}

	public function request_sparepart(){
		echo json_encode(["msg" => "request part"]);
	}

	public function transfer_sparepart(){
		echo json_encode(["msg" => "transfer part"]);
	}

	public function branchBycompany(){
		$data["warehouse"] = $this->db->select('*')->get_where('branch_office', ["type" => "Warehouse",'idcompany'=>$this->session->userdata('idcompany')])->result();
		echo json_encode($data);
	}




}
?>
