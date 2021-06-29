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
		$data["sparepart_detail"] = $this->db->select("*")->get_where("warehouse_stok", ["idcompany" => $this->session->userdata('idcompany')])->result();

		$spareitems = [];
		foreach ($data['sparepart'] as $i => $s) {
			array_push($spareitems, [
				"idsparepart" => $s->idsparepart,
				"name" => $s->name,
				"code" => $s->code,
				"stock" => 0,
				"price" => 0
			]);
		}

		$warehouse = [];
		foreach ($data["warehouse"] as $k => $v) {
			array_push($warehouse, [
				"idcompany" => $v->idcompany,
				"branch_id" => $v->branch_id,
				"name" => $v->branch,
				"sparepart" => $spareitems
			]);
		}

		foreach ($data["sparepart_detail"] as $k1 => $v1) {
			foreach ($warehouse as $k2 => $v2) {
				foreach ($v2["sparepart"] as $k3 => $v3) {
					// echo $v2["branch_id"]." == $v1->idbranch |=| ";
					// echo $v2["name"]." | ". $v3["name"];
					if($v2["branch_id"] == $v1->idbranch && $v1->idsparepart == $v3["idsparepart"]){
						// echo "|masuk|". " |=> ".$k2."[]".$k3;
						$warehouse[$k2]["sparepart"][$k3]["stock"] = $v1->stock;
						$warehouse[$k2]["sparepart"][$k3]["price"] = $v1->price;
						// echo "<br>";
						break;
					}	
					// echo "<br>";
				}
			}
			// echo "<br>================================================<br>";
		}
		// print_r($warehouse);
		// die();
		$data["items"] = $warehouse;
		$this->load->view('warehouse/warehouse',$data);
  }

	public function add_sparepart(){
		$data = [
			"idwarehouseaction" => $this->uuid->v4(),
			"idcompany" => $this->input->post("idcompany"),
			"idbranch" => $this->input->post("idbranch"),
			"idsparepart" => $this->input->post("idsparepart"),
			"type" => $this->input->post("type"),
			"jumlah" => $this->input->post("in"),
			"created_at" => $this->input->post("date")
		];
		$stok = $this->db->insert("warehouse_action",  $data);

		$where =  ['idsparepart' => $this->input->post("idsparepart"), "idbranch" => $this->input->post("idbranch")];
		$cek = $query = $this->db->get_where('warehouse_stok',$where)->row();

		if(count($cek)){
			$currentStock =  $cek->stock + $this->input->post("in");
			$this->db->where($where)->update("warehouse_stok", [
				"price" => $this->input->post("price"),
				"stock" => $currentStock
			]);
		}else{
			$data = [
				"idwarehousestock" => $this->uuid->v4(),
				"idcompany" => $this->input->post("idcompany"),
				"idbranch" => $this->input->post("idbranch"),
				"idsparepart" => $this->input->post("idsparepart"),
				"price" => $this->input->post("price"),
				"stock" => $this->input->post("in"),
			];
			$this->db->insert("warehouse_stok", $data);
		}

		echo json_encode(["success" => true, "msg"=>"berhasil tambah sparepart"]);
	}

	public function request_sparepart(){
		$data = [
			"idwarehouseaction" => $this->uuid->v4(),
			"idcompany" => $this->input->post("idcompany"),
			"idbranch" => $this->input->post("idbranch"),
			"idsparepart" => $this->input->post("idsparepart"),
			"type" => $this->input->post("type"),
			"jumlah" => $this->input->post("stock"),
			"created_at" => $this->input->post("date")
		];
		$stok = $this->db->insert("warehouse_action",  $data);

		$where =  ['idsparepart' => $this->input->post("idsparepart"), "idbranch" => $this->input->post("idbranch")];
		$where2 =  ['idsparepart' => $this->input->post("idsparepart"), "idbranch" => $this->input->post("transfer-to")];
		$cek =  $this->db->get_where('warehouse_stok',$where)->row();
		$cek2 =  $this->db->get_where('warehouse_stok',$where2)->row();
		$branch = $this->db->get_where('branch_office',["branch_id"=>$cek2->idbranch])->row();
		if($data["jumlah"] >= $cek2->stock){
			echo json_encode(["success" => false, "msg"=>"stok sparepart pada branch '$branch->branch' tidak mencukupi!"]);
			return;
		}

		if(count($cek)){
			$currentStock = $cek->stock + $this->input->post("stock");
			$this->db->where($where)->update("warehouse_stok", [
				"stock" => $currentStock
			]);

			$currentStock =  $cek2->stock - $this->input->post("stock");
			$this->db->where($where2)->update("warehouse_stok", [
				"stock" => $currentStock
			]);
		}else{
			$data = [
				"idwarehousestock" => $this->uuid->v4(),
				"idcompany" => $this->input->post("idcompany"),
				"idbranch" => $this->input->post("idbranch"),
				"idsparepart" => $this->input->post("idsparepart"),
				"price" => $cek2->price,
				"stock" => $this->input->post("stock"),
			];
			$this->db->insert("warehouse_stok", $data);

			$currentStock =  $cek2->stock - $this->input->post("stock");
			$this->db->where($where2)->update("warehouse_stok", [
				"stock" => $currentStock
			]);
		}
		echo json_encode(["success" => true, "msg"=>"berhasil request sparepart"]);
	}

	public function transfer_sparepart(){
		$data = [
			"idwarehouseaction" => $this->uuid->v4(),
			"idcompany" => $this->input->post("idcompany"),
			"idbranch" => $this->input->post("idbranch"),
			"idsparepart" => $this->input->post("idsparepart"),
			"type" => $this->input->post("type"),
			"jumlah" => $this->input->post("stock"),
			"created_at" => $this->input->post("date")
		];
		$stok = $this->db->insert("warehouse_action",  $data);


		$where =  ['idsparepart' => $this->input->post("idsparepart"), "idbranch" => $this->input->post("idbranch")];
		$where2 =  ['idsparepart' => $this->input->post("idsparepart"), "idbranch" => $this->input->post("transfer-to")];
		$cek = $query = $this->db->get_where('warehouse_stok',$where)->row();
		$cek2 = $query = $this->db->get_where('warehouse_stok',$where2)->row();

		if($data["jumlah"] >= $cek->stock){
			echo json_encode(["success" => false, "msg"=>"stok sparepart tidak mencukupi untuk di transfer!"]);
			return;
		}

		if(count($cek2)){
			$currentStock =  $cek->stock - $this->input->post("stock");
			$this->db->where($where)->update("warehouse_stok", [
				"stock" => $currentStock
			]);
	
			$currentStock =  $cek2->stock + $this->input->post("stock");
			$this->db->where($where2)->update("warehouse_stok", [
				"stock" => $currentStock
			]);
		}else{
			$data = [
				"idwarehousestock" => $this->uuid->v4(),
				"idcompany" => $this->input->post("idcompany"),
				"idbranch" => $this->input->post("transfer-to"),
				"idsparepart" => $this->input->post("idsparepart"),
				"price" => $cek->price,
				"stock" => $this->input->post("stock"),
			];
			$this->db->insert("warehouse_stok", $data);
			
			$currentStock =  $cek->stock - $this->input->post("stock");
			$this->db->where($where)->update("warehouse_stok", [
				"stock" => $currentStock
			]);
		}
		
		echo json_encode(["success" => true, "msg"=>"berhasil transfer sparepart"]);
	}

	public function branchBycompany(){
		$data["warehouse"] = $this->db->select('*')->get_where('branch_office', ["type" => "Warehouse",'idcompany'=>$this->session->userdata('idcompany')])->result();
		echo json_encode($data);
	}
}
?>
