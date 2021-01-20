<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

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
    // $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    // $this->load->view('hrm/employee',$data);
    $this->load->view('service/overview');
  }

  public function sewa_alat_berat()
  {
    $operator = $this->ShowModel->getDataWHere('designation', [
      'idcompany' => $this->session->userdata('idcompany'), 'designationtitle'=>'Operator'
    ])->result();
    // var_dump($designation[0]->designationtitle);
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
    $data['prod_heqs'] = $this->ShowModel->getDataWHere('product_h_equipment', [
      'idcompany' => $this->session->userdata('idcompany')
    ])->result();
    // $data['trucks'] = $this->ShowModel->getDataWHere('product_truck', [
    //   'idcompany' => $this->session->userdata('idcompany')
    // ])->result();
    $data['heqs'] = $this->db->select('*')
                             ->join('product_h_equipment PHEQ','PHEQ.idhequipment = HEQ.h_equipment','left')
                             ->join('product_setting_type TYPE','TYPE.idtype = HEQ.type','left')
                             ->join('product_setting_brand BRAND','BRAND.idbrand = HEQ.brand','left')
                             ->get_where('service_h_equipment HEQ',['HEQ.idcompany'=>$this->session->userdata('idcompany')])
                             ->result();
    // echo $this->db->last_query();
                             // echo "<pre>";
    // var_dump($data['heqs']);
    // exit;                         
    $this->load->view('service/sewa-alat-berat', $data);
  }
  public function getServicePrice()
  {
    $brand      = $this->input->post('brand');
    $type       = $this->input->post('type');
    $idcompany  = $this->session->userdata('idcompany');
    $data = $this->ShowModel->getDataWHere('service_price',[
      'brand'=>$brand,
      'type'=>$type,
      'idcompany'=>$idcompany
    ])->row_array();
    echo json_encode($data);
  }
  public function saveServiceHEQ()
  {
    
    // ambil request
    $h_equipment = $this->input->post('h_equipment');
    $date    = $this->input->post('date');
    $brand      = $this->input->post('brand');
    $type       = $this->input->post('type');
    $operator     = $this->input->post('operator');
    $work_start     = $this->input->post('work_start');
    $work_end     = $this->input->post('work_end');
    $price_per_hour = $this->input->post('price_per_hour');

    $hour1 = new DateTime($work_start);
    $hour2 = new DateTime($work_end);
    $total_hour = $hour1->diff($hour2);
    $total_hour = $total_hour->format('%h');
    $total_price =  (int)$price_per_hour * (int)$total_hour;

     // simpan ke database
    $id           = $this->uuid->v4();
    $inSave       = $this->InsertModel->indata('service_h_equipment',[
      'idshequipment'   => $id,
      'idcompany' => $this->session->userdata('idcompany'),
      'h_equipment' => $h_equipment,
      'date'   => $date,
      'brand'     => $brand,
      'type'      => $type,
      'operator'    => $operator,
      'work_start'=> $work_start,
      'work_end'=> $work_end,
      'total_hour'    => $total_hour,
      'price_per_hour'=>$price_per_hour,
      'total_price' => $total_price
    ]);
  }
  public function delServiceHEQ(){
    $id     = $this->input->post('idhequipment');
    $inDel  = $this->DeleteModel->delItem('service_h_equipment',['idhequipment'=>$id]);
    
    if($inDel){
      $this->session->set_flashdata('suc','Data has been deleted');
    }
    
    $data   = array("callback" => "yes");
    echo json_encode($data);
  }
  public function edtServiceHEQ(){
    $id   = $this->input->post('id');
    $data = $this->ShowModel->getDataWHere('service_h_equipment',['idshequipment'=>$id])->row_array();
    echo json_encode($data);
  }
  public function uptServiceHEQ(){
    $idshequipment  = $this->input->post('idshequipment');
    $h_equipment    = $this->input->post('h_equipment');
    $date           = $this->input->post('date');
    $brand          = $this->input->post('brand');
    $type           = $this->input->post('type');
    $operator       = $this->input->post('operator');
    $work_start     = $this->input->post('work_start');
    $work_end       = $this->input->post('work_end');
    $price_per_hour = $this->input->post('price_per_hour');

    $hour1          = new DateTime($work_start);
    $hour2          = new DateTime($work_end);
    $total_hour     = $hour1->diff($hour2);
    $total_hour     = $total_hour->format('%h');
    $total_price    =  (int)$price_per_hour * (int)$total_hour;
    
    $inUpt = $this->InsertModel->uptdata('service_h_equipment',[
      'idcompany'     => $this->session->userdata('idcompany'),
      'h_equipment'   => $h_equipment,
      'date'          => $date,
      'brand'         => $brand,
      'type'          => $type,
      'operator'      => $operator,
      'work_start'    => $work_start,
      'work_end'      => $work_end,
      'total_hour'    => $total_hour,
      'price_per_hour'=>$price_per_hour,
      'total_price'   => $total_price

    ],['idshequipment'=>$idshequipment]);
  }

  public function jasa_tambang()
  {
    $data['clients'] = $this->ShowModel->getDataWHere('contacts', [
      'idcompany' => $this->session->userdata('idcompany')
    ])->result();
    $data['trucks'] = $this->ShowModel->getDataWHere('product_truck', [
      'idcompany' => $this->session->userdata('idcompany')
    ])->result();
    $data['minings'] = $this->db->select('*')
                             ->join('contacts CON','CON.idcontacts = MINING.client','left')
                             ->join('product_truck TRUCK','TRUCK.idtruck = MINING.plat_no','left')
                             ->get_where('service_mining MINING',['MINING.idcompany'=>$this->session->userdata('idcompany')])
                             ->result();
    // echo "<pre>";
    // var_dump($data['minings']);
    // exit;
    $this->load->view('service/jasa-tambang', $data);
  }
  public function saveMining()
  {
    
    // ambil request
    $client         = $this->input->post('client');
    $delivery_no    = $this->input->post('delivery_no');
    $plat_no        = $this->input->post('plat_no');
    $delivery_date  = $this->input->post('delivery_date');
    $working_hour   = $this->input->post('working_hour');
    $est_tonage     = $this->input->post('est_tonage');

     // simpan ke database
    $id           = $this->uuid->v4();
    $inSave       = $this->InsertModel->indata('service_mining',[
      'idmining'      => $id,
      'idcompany'     => $this->session->userdata('idcompany'),
      'client'        => $client,
      'delivery_no'   => $delivery_no,
      'plat_no'       => $plat_no,
      'delivery_date' => $delivery_date,
      'working_hour'  => $working_hour,
      'est_tonage'    => $est_tonage,
      'exact_tonage'  => ""
    ]);
  }
  public function delMining(){
    $id     = $this->input->post('idmining');
    $inDel  = $this->DeleteModel->delItem('service_mining',['idmining'=>$id]);
    
    if($inDel){
      $this->session->set_flashdata('suc','Data has been deleted');
    }
    
    $data   = array("callback" => "yes");
    echo json_encode($data);
  }
  public function edtMining(){
    $idmining   = $this->input->post('idmining');
    $data = $this->ShowModel->getDataWHere('service_mining',['idmining'=>$idmining])->row_array();
    echo json_encode($data);
  }
  public function uptMining(){
    $idmining       = $this->input->post('idmining');
    $client         = $this->input->post('client');
    $delivery_no    = $this->input->post('delivery_no');
    $plat_no        = $this->input->post('plat_no');
    $delivery_date  = $this->input->post('delivery_date');
    $working_hour   = $this->input->post('working_hour');
    $est_tonage     = $this->input->post('est_tonage');
    $exact_tonage   = $this->input->post('exact_tonage');
    
    $inUpt = $this->InsertModel->uptdata('service_mining',[
      'client'        => $client,
      'delivery_no'   => $delivery_no,
      'plat_no'       => $plat_no,
      'delivery_date' => $delivery_date,
      'working_hour'  => $working_hour,
      'est_tonage'    => $est_tonage,
      'exact_tonage'  => $exact_tonage
    ],['idmining'=>$idmining]);
  }

  public function price()
  {
    $data['types'] = $this->ShowModel->getDataWHere('product_setting_type', [
      'idcompany' => $this->session->userdata('idcompany')
    ])->result();
    $data['brands'] = $this->ShowModel->getDataWHere('product_setting_brand', [
      'idcompany' => $this->session->userdata('idcompany')
    ])->result();
    $data['prices'] = $this->db->select('*')
                             ->join('product_setting_type TYPE','TYPE.idtype = PRICE.type')
                             ->join('product_setting_brand BRAND','BRAND.idbrand = PRICE.brand')
                             ->get_where('service_price PRICE',['PRICE.idcompany'=>$this->session->userdata('idcompany')])
                             ->result();
    // echo $this->db->last_query();
    // var_dump($data['prices']);
    // exit;
    $this->load->view('service/price', $data);
  }

  public function savePrice(){
    
    // ambil request
    $type    = $this->input->post('type');
    $brand    = $this->input->post('brand');
    $price    = $this->input->post('price');

     // simpan ke database
    $id           = $this->uuid->v4();
    $inSave       = $this->InsertModel->indata('service_price',[
      'idprice'   => $id,
      'idcompany' => $this->session->userdata('idcompany'),
      'price'     => $price,
      'brand'     => $brand,
      'type'      => $type,
    ]);
  }
  public function delPrice(){
    $id     = $this->input->post('idprice');
    $inDel  = $this->DeleteModel->delItem('service_price',['idprice'=>$id]);
    
    if($inDel){
      $this->session->set_flashdata('suc','Data has been deleted');
    }
    
    $data   = array("callback" => "yes");
    echo json_encode($data);
  }
  public function edtPrice(){
    $idprice   = $this->input->post('idprice');
    $data = $this->ShowModel->getDataWHere('service_price',['idprice'=>$idprice])->row_array();
    echo json_encode($data);
  }
  public function uptPrice(){
    $idprice    = $this->input->post('idprice');
    $type       = $this->input->post('type');
    $brand      = $this->input->post('brand');
    $price     = $this->input->post('price');
    
    $inUpt = $this->InsertModel->uptdata('service_price',[
      'brand'     => $brand,
      'type'      => $type,
      'price'  => $price

    ],['idprice'=>$idprice]);
  }

}
?>
