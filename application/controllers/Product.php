<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->api->CheckSession();
     date_default_timezone_set("Asia/Jakarta");
     qazwsxedc();
  }

  //overview
  public function overview()
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
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    // $this->load->view('hrm/employee',$data);
    $data['count_truck'] = $this->db->get_where('product_truck',['idcompany'=>$this->session->userdata('idcompany')])->num_rows();
    $data['count_heq'] = $this->db->get_where('product_h_equipment',['idcompany'=>$this->session->userdata('idcompany')])->num_rows();
    $data['count_sparepart'] = $this->db->get_where('product_sparepart',['idcompany'=>$this->session->userdata('idcompany')])->num_rows();
    $this->load->view('product/overview', $data);
  }

  // TRUCK
  public function truck()
  {
    $driver = $this->ShowModel->getDataWHere('designation', [
      'idcompany' => $this->session->userdata('idcompany'), 'designationtitle'=>'Driver'
    ])->result();
    // var_dump($designation[0]->designationtitle);
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $data['drivers'] = $this->ShowModel->getDataWHere('employee', [
      'idcompany' => $this->session->userdata('idcompany'), 'jobtitle'=>$driver[0]->iddesignation
    ])->result();
    $data['types'] = $this->ShowModel->getDataWHere('product_setting_type', [
      'idcompany' => $this->session->userdata('idcompany')
    ])->result();
    $data['brands'] = $this->ShowModel->getDataWHere('product_setting_brand', [
      'idcompany' => $this->session->userdata('idcompany')
    ])->result();
    // $data['trucks'] = $this->ShowModel->getDataWHere('product_truck', [
    //   'idcompany' => $this->session->userdata('idcompany')
    // ])->result();
    $data['trucks'] = $this->db->select('*')
                             ->join('product_setting_type TYPE','TYPE.idtype = TRUCK.type')
                             ->join('product_setting_brand BRAND','BRAND.idbrand = TRUCK.brand')
                             ->get_where('product_truck TRUCK',['TRUCK.idcompany'=>$this->session->userdata('idcompany')])
                             ->result();
    // echo "<pre>";
    // var_dump($data['drivers']);
    // exit;
    $this->load->view('product/truck', $data);
  }
  public function getServiceAndTrips($idtruck)
  {
    $data['services'] = $this->ShowModel->getDataWHere('product_truck_service', [
      'idtruck'=>$idtruck,
      'idcompany' => $this->session->userdata('idcompany')
    ])->result_array();
    $data['trips'] = $this->ShowModel->getDataWHere('service_mining', [
      'plat_no'=>$idtruck,
      'idcompany' => $this->session->userdata('idcompany')
    ])->result_array();
    echo json_encode($data); 
  }
  public function saveTruck(){
    
    // ambil request
    $plat_no    = $this->input->post('plat_no');
    $brand      = $this->input->post('brand');
    $type       = $this->input->post('type');
    $reg_date   = $this->input->post('reg_date');
    $driver     = $this->input->post('driver');
    $chassis_no = $this->input->post('chassis_no');
    $machine_no = $this->input->post('machine_no');

     // simpan ke database
    $id           = $this->uuid->v4();
    $inSave       = $this->InsertModel->indata('product_truck',[
      'idtruck'   => $id,
      'idcompany' => $this->session->userdata('idcompany'),
      'plat_no'   => $plat_no,
      'brand'     => $brand,
      'type'      => $type,
      'reg_date'  => $reg_date,
      'driver'    => $driver,
      'chassis_no'=> $chassis_no,
      'machine_no'=> $machine_no,
      'status'    => 'Active'
    ]);
  }
  public function delTruck(){
    $id     = $this->input->post('idtruck');
    $inDel  = $this->DeleteModel->delItem('product_truck',['idtruck'=>$id]);
    
    if($inDel){
      $this->session->set_flashdata('suc','Data has been deleted');
    }
    
    $data   = array("callback" => "yes");
    echo json_encode($data);
  }
  public function edtTruck(){
    $id   = $this->input->post('id');
    $data['truck'] = $this->ShowModel->getDataWHere('product_truck',['idtruck'=>$id])->row_array();
    $data['services'] = $this->ShowModel->getDataWHere('product_truck_service', [
      'idtruck'=>$idtruck,
      'idcompany' => $this->session->userdata('idcompany')
    ])->result_array();
    $data['trips'] = $this->ShowModel->getDataWHere('service_mining', [
      'plat_no'=>$idtruck,
      'idcompany' => $this->session->userdata('idcompany')
    ])->result_array();
    echo json_encode($data);
  }
  public function uptTruck(){
    $idtruck    = $this->input->post('idtruck');
    $plat_no    = $this->input->post('plat_no');
    $type       = $this->input->post('type');
    $brand      = $this->input->post('brand');
    $reg_date   = $this->input->post('reg_date');
    $driver     = $this->input->post('driver');
    $chassis_no = $this->input->post('chassis_no');
    $machine_no = $this->input->post('machine_no');
    
    $inUpt = $this->InsertModel->uptdata('product_truck',[
      'plat_no'   => $plat_no,
      'type'      => $type,
      'brand'     => $brand,
      'reg_date'  => $reg_date,
      'driver'    => $driver,
      'chassis_no'=> $chassis_no,
      'machine_no'=> $machine_no,

    ],['idtruck'=>$idtruck]);
  }
  // END TRUCK

  // SERVICE TRUCK
  public function service_truck()
  {
    $id = $this->uri->segment(2);
    $data['trucks'] = $this->ShowModel->getDataWHere('product_truck',['idtruck'=>$id])->result();
    $this->load->view('product/service-truck',$data);
  }
  // END SERVICE TRUCK

  // TRUCK SERVICE
  public function saveTruckService(){
    
    // ambil request
    $idtruck        = $this->input->post('idtruck');
    $service_date   = $this->input->post('service_date');
    $service_type   = $this->input->post('service_type');
    $driver_note    = $this->input->post('driver_note');
    $actions        = $this->input->post('action');
    $mechanic_note  = $this->input->post('mechanic_note');

    $id             = $this->uuid->v4();
    // simpan service action ke database
    foreach($actions as $action){
      $idaction     = $this->uuid->v4();
      $actionsSave  = $this->InsertModel->indata('product_truck_service_actions',[
        'idaction'  => $idaction,
        'idservice' => $id,     
        'idcompany' => $this->session->userdata('idcompany'),
        'action'    => $action
      ], false);
      // guna parameter false agar model tidak return dan lanjut pengulangan
    }
    // simpan service ke database
    $serviceSave      = $this->InsertModel->indata('product_truck_service',[
      'idservice'     => $id,
      'idtruck'       => $idtruck,
      'idcompany'     => $this->session->userdata('idcompany'),
      'service_date'  => $service_date,
      'service_type'  => $service_type,
      'driver_note'   => $driver_note,
      'mechanic_note' => $mechanic_note,
      'isDone'        => false
    ], false);

    $inUpt = $this->InsertModel->uptdata('product_truck',[
      'status'  => 'Repair'
    ],['idtruck'=>$idtruck]);
  }

  public function edtTruckService(){
    $id   = $this->input->post('id');
    $data['service'] = $this->ShowModel->getDataWHere('product_truck_service',['idservice'=>$id])->row_array();
    $data['actions'] = $this->ShowModel->getDataWHere('product_truck_service_actions',['idservice'=>$id])->result();
    echo json_encode($data);
    // echo $data;
  }

  public function uptTruckService()
  {
    $idservice      = $this->input->post('idservice');
    $service_date   = $this->input->post('service_date');
    $service_type   = $this->input->post('service_type');
    $driver_note    = $this->input->post('driver_note');
    $mechanic_note  = $this->input->post('mechanic_note');

    // update ke database
    $inUpt = $this->InsertModel->uptdata('product_truck_service',[
      'service_date'  => $service_date,
      'service_type'  => $service_type,
      'driver_note'   => $driver_note,
      'mechanic_note' => $mechanic_note
    ],['idservice'=>$idservice]);
  }

  public function doneTruckService()
  {
    $idtruck        = $this->input->post('idtruck');
    $idservice      = $this->input->post('idservice');
    $mechanic_note  = $this->input->post('mechanic_note');

    $truckSave = $this->InsertModel->uptdata('product_truck',[
      'status'  => 'Active'
    ],['idtruck'=>$idtruck], false);
    $serviceSave = $this->InsertModel->uptdata('product_truck_service',[
      'mechanic_note'  => $mechanic_note,
      'isDone'=>'1'
    ],['idservice'=>$idservice]);

  }
  //END TRUCK SERVICE

  // HEAVY EQUIPMENT
  public function heavy_equipment()
  {
    $operator = $this->ShowModel->getDataWHere('designation', [
      'idcompany' => $this->session->userdata('idcompany'), 'designationtitle'=>'Operator'
    ])->result();
    // var_dump($designation[0]->designationtitle);
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $data['operators'] = $this->ShowModel->getDataWHere('employee', [
      'idcompany' => $this->session->userdata('idcompany'), 'jobtitle'=>$operator[0]->iddesignation
    ])->result();
    // echo $this->db->last_query();
    // var_dump($data['operators']);
    // exit;
    $data['types'] = $this->ShowModel->getDataWHere('product_setting_type', [
      'idcompany' => $this->session->userdata('idcompany')
    ])->result();
    $data['brands'] = $this->ShowModel->getDataWHere('product_setting_brand', [
      'idcompany' => $this->session->userdata('idcompany')
    ])->result();
    // $data['trucks'] = $this->ShowModel->getDataWHere('product_truck', [
    //   'idcompany' => $this->session->userdata('idcompany')
    // ])->result();
    $data['heqs'] = $this->db->select('*')
                             ->join('product_setting_type TYPE','TYPE.idtype = HEQ.type')
                             ->join('product_setting_brand BRAND','BRAND.idbrand = HEQ.brand')
                             ->get_where('product_h_equipment HEQ',['HEQ.idcompany'=>$this->session->userdata('idcompany')])
                             ->result();
    $this->load->view('product/h-equipment', $data);
  }

  public function saveHEquipment(){
    
    // ambil request
    $description    = $this->input->post('description');
    $brand      = $this->input->post('brand');
    $type       = $this->input->post('type');
    $reg_date   = $this->input->post('reg_date');
    $operator     = $this->input->post('operator');
    $chassis_no = $this->input->post('chassis_no');
    $machine_no = $this->input->post('machine_no');

     // simpan ke database
    $id           = $this->uuid->v4();
    $inSave       = $this->InsertModel->indata('product_h_equipment',[
      'idhequipment'   => $id,
      'idcompany' => $this->session->userdata('idcompany'),
      'description'   => $description,
      'brand'     => $brand,
      'type'      => $type,
      'reg_date'  => $reg_date,
      'operator'    => $operator,
      'chassis_no'=> $chassis_no,
      'machine_no'=> $machine_no,
      'status'    => 'Active'
    ]);
  }
  public function delHEquipment(){
    $id     = $this->input->post('idhequipment');
    $inDel  = $this->DeleteModel->delItem('product_h_equipment',['idhequipment'=>$id]);
    
    if($inDel){
      $this->session->set_flashdata('suc','Data has been deleted');
    }
    
    $data   = array("callback" => "yes");
    echo json_encode($data);
  }
  public function edtHEquipment(){
    $id   = $this->input->post('id');
    $data = $this->ShowModel->getDataWHere('product_h_equipment',['idhequipment'=>$id])->row_array();
    echo json_encode($data);
  }
  public function uptHEquipment(){
    $idhequipment    = $this->input->post('idhequipment');
    $description    = $this->input->post('description');
    $type       = $this->input->post('type');
    $brand      = $this->input->post('brand');
    $reg_date   = $this->input->post('reg_date');
    $operator     = $this->input->post('operator');
    $chassis_no = $this->input->post('chassis_no');
    $machine_no = $this->input->post('machine_no');
    
    $inUpt = $this->InsertModel->uptdata('product_h_equipment',[
      'description'   => $description,
      'type'      => $type,
      'brand'     => $brand,
      'reg_date'  => $reg_date,
      'operator'    => $operator,
      'chassis_no'=> $chassis_no,
      'machine_no'=> $machine_no,

    ],['idhequipment'=>$idhequipment]);
  }
  // END HEAVY EQUIPMENT

  // SERVICE HEAVY EQUIPMENT
  public function service_h_equipment()
  {
    $id = $this->uri->segment(2);
    $data['equipments'] = $this->ShowModel->getDataWHere('product_h_equipment',['idhequipment'=>$id])->result();
    $this->load->view('product/service-h-equipment',$data);
  }
  // END SERVICE HEAVY EQUIPMENT

  // HEAVY EQUIPMENT SERVICE
  public function saveHEqService(){
    
    // ambil request
    $idhequipment   = $this->input->post('idhequipment');
    $service_date   = $this->input->post('service_date');
    $service_type   = $this->input->post('service_type');
    $description    = $this->input->post('description');
    $actions        = $this->input->post('action');
    $mechanic_note  = $this->input->post('mechanic_note');

    $id             = $this->uuid->v4();
    // simpan service action ke database
    foreach($actions as $action){
      $idaction     = $this->uuid->v4();
      $actionsSave  = $this->InsertModel->indata('product_h_equipment_service_actions',[
        'idaction'  => $idaction,
        'idservice' => $id,     
        'idcompany' => $this->session->userdata('idcompany'),
        'action'    => $action
      ], false);
      // guna parameter false agar model tidak return dan lanjut pengulangan
    }
    // simpan service ke database
    $serviceSave      = $this->InsertModel->indata('product_h_equipment_service',[
      'idservice'     => $id,
      'idhequipment'  => $idhequipment,
      'idcompany'     => $this->session->userdata('idcompany'),
      'service_date'  => $service_date,
      'service_type'  => $service_type,
      'description'   => $description,
      'mechanic_note' => $mechanic_note,
      'isDone'        => false
    ], false);

    $inUpt = $this->InsertModel->uptdata('product_h_equipment',[
      'status'  => 'Repair'
    ],['idhequipment'=>$idhequipment]);
  }

  public function edtHEqService(){
    $id   = $this->input->post('id');
    $data['service'] = $this->ShowModel->getDataWHere('product_h_equipment_service',['idservice'=>$id])->row_array();
    $data['actions'] = $this->ShowModel->getDataWHere('product_h_equipment_service_actions',['idservice'=>$id])->result();
    echo json_encode($data);
    // echo $data;
  }

  public function uptHEqService()
  {
    $idservice      = $this->input->post('idservice');
    $service_date   = $this->input->post('service_date');
    $service_type   = $this->input->post('service_type');
    $description    = $this->input->post('description');
    $mechanic_note  = $this->input->post('mechanic_note');

    // update ke database
    $inUpt = $this->InsertModel->uptdata('product_h_equipment_service',[
      'service_date'  => $service_date,
      'service_type'  => $service_type,
      'description'   => $description,
      'mechanic_note' => $mechanic_note
    ],['idservice'=>$idservice]);
  }

  public function doneHEqService()
  {
    $idhequipment        = $this->input->post('idhequipment');
    $idservice      = $this->input->post('idservice');
    $mechanic_note  = $this->input->post('mechanic_note');

    $truckSave = $this->InsertModel->uptdata('product_h_equipment',[
      'status'  => 'Active'
    ],['idhequipment'=>$idhequipment], false);
    $serviceSave = $this->InsertModel->uptdata('product_h_equipment_service',[
      'mechanic_note'  => $mechanic_note,
      'isDone'=>'1'
    ],['idservice'=>$idservice]);

  }
  //END HEAVY EQUIPMENT SERVICE

  // SPAREPART
  public function sparepart()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $data['types'] = $this->ShowModel->getDataWHere('product_setting_type', [
      'idcompany' => $this->session->userdata('idcompany')
    ])->result();
    $data['brands'] = $this->ShowModel->getDataWHere('product_setting_brand', [
      'idcompany' => $this->session->userdata('idcompany')
    ])->result();
    $data['sparts'] = $this->db->select('*')
                             ->join('product_setting_type TYPE','TYPE.idtype = SP.type')
                             ->join('product_setting_brand BRAND','BRAND.idbrand = SP.brand')
                             ->get_where('product_sparepart SP',['SP.idcompany'=>$this->session->userdata('idcompany')])
                             ->result();
    $this->load->view('product/sparepart', $data);
  }

  public function saveSPart(){
    
    // ambil request
    $name    = $this->input->post('sparepart_name');
    $type    = $this->input->post('type');
    $brand    = $this->input->post('brand');
    $reg_date    = $this->input->post('reg_date');
    $stock    = $this->input->post('stock');

     // simpan ke database
    $id           = $this->uuid->v4();
    $inSave       = $this->InsertModel->indata('product_sparepart',[
      'idsparepart'   => $id,
      'idcompany' => $this->session->userdata('idcompany'),
      'name'   => $name,
      'brand'     => $brand,
      'type'      => $type,
      'reg_date'  => $reg_date,
      'stock'    => $stock
    ]);
  }
  public function delSPart(){
    $id     = $this->input->post('idsparepart');
    $inDel  = $this->DeleteModel->delItem('product_sparepart',['idsparepart'=>$id]);
    
    if($inDel){
      $this->session->set_flashdata('suc','Data has been deleted');
    }
    
    $data   = array("callback" => "yes");
    echo json_encode($data);
  }
  public function edtSPart(){
    $idsparepart   = $this->input->post('idsparepart');
    $data = $this->ShowModel->getDataWHere('product_sparepart',['idsparepart'=>$idsparepart])->row_array();
    echo json_encode($data);
  }
  public function uptSPart(){
    $idsparepart    = $this->input->post('idsparepart');
    $name    = $this->input->post('sparepart_name');
    $type       = $this->input->post('type');
    $brand      = $this->input->post('brand');
    $reg_date   = $this->input->post('reg_date');
    $stock     = $this->input->post('stock');
    
    $inUpt = $this->InsertModel->uptdata('product_sparepart',[
      'name'   => $name,
      'brand'     => $brand,
      'type'      => $type,
      'reg_date'  => $reg_date,
      'stock'    => $stock

    ],['idsparepart'=>$idsparepart]);
  }
  // END SPAREPART

  public function setting()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $data['types'] = $this->ShowModel->getDataWHere('product_setting_type', [
      'idcompany' => $this->session->userdata('idcompany')
    ])->result();
    $data['brands'] = $this->ShowModel->getDataWHere('product_setting_brand', [
      'idcompany' => $this->session->userdata('idcompany')
    ])->result();
    // echo "<pre>";
    // var_dump($data['types']);
    // exit;
    $this->load->view('product/product-setting', $data);
  }
  // SETTING TYPE
  public function type_adding(){
    $idcompany = $this->session->userdata("idcompany");
    $idtype = $this->uuid->v4();
    $type_name = $this->input->post("type_name");

    $this->db->insert("product_setting_type", ['idtype' => $idtype, "idcompany" => $idcompany, "type_name" => $type_name]);

    $data = array("callback" => "yes");
    echo json_encode($data);
  }

  public function type_edit(){
    $idtype = $this->input->post("type_id");
    $idcompany = $this->session->userdata("idcompany");

    $data = $this->db->get_where("product_setting_type", ['idtype' => $idtype, "idcompany" => $idcompany])->row_array();

    echo json_encode($data);
  }
  
  public function type_update(){
    $idtype = $this->input->post("type_id");
    $idcompany = $this->session->userdata("idcompany");
    $type_name = $this->input->post("type_name");

    $this->db->update("product_setting_type", ['type_name' => $type_name], ['idtype' => $idtype, 'idcompany' => $idcompany]);

    $data = array("callback" => "yes");
    echo json_encode($data);
  }

  public function type_delete(){
    $idtype = $this->input->post("type_id");
    // echo $idtype;
    // exit;
    $idcompany = $this->session->userdata("idcompany");

    $this->db->delete("product_setting_type", ['idtype' => $idtype, 'idcompany' => $idcompany]);

    $data= array("callback" => "yes");
    echo json_encode($data);
  }
  // END SETTING TYPE



  // SETTING BRAND
  public function brand_adding(){
    $idcompany = $this->session->userdata("idcompany");
    $idbrand = $this->uuid->v4();
    $brand_name = $this->input->post("brand_name");

    $this->db->insert("product_setting_brand", ['idbrand' => $idbrand, "idcompany" => $idcompany, "brand_name" => $brand_name]);

    $data = array("callback" => "yes");
    echo json_encode($data);
  }

  public function brand_edit(){
    $idbrand = $this->input->post("brand_id");
    $idcompany = $this->session->userdata("idcompany");

    $data = $this->db->get_where("product_setting_brand", ['idbrand' => $idbrand, "idcompany" => $idcompany])->row_array();

    echo json_encode($data);
  }
  
  public function brand_update(){
    $idbrand = $this->input->post("brand_id");
    $idcompany = $this->session->userdata("idcompany");
    $brand_name = $this->input->post("brand_name");

    $this->db->update("product_setting_brand", ['brand_name' => $brand_name], ['idbrand' => $idbrand, 'idcompany' => $idcompany]);

    $data = array("callback" => "yes");
    echo json_encode($data);
  }

  public function brand_delete(){
    $idbrand = $this->input->post("brand_id");
    // echo $idbrand;
    // exit;
    $idcompany = $this->session->userdata("idcompany");

    $this->db->delete("product_setting_brand", ['idbrand' => $idbrand, 'idcompany' => $idcompany]);

    $data= array("callback" => "yes");
    echo json_encode($data);
  }
  // END SETTING BRAND

}
?>
