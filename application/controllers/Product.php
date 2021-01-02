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
    // $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    // $this->load->view('hrm/employee',$data);
    $this->load->view('product/overview');
  }

  public function product()
  {
    $this->load->view('product/product');
  }

  public function setting()
  {
    $this->load->view('product/product-setting');
  }

}
?>
