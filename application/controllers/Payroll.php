<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payroll extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->api->CheckSession();
     date_default_timezone_set("Asia/Jakarta");
     qazwsxedc();
  }

  public function pay_overview()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('payroll/overview',$data);
  }

  public function pay_calendar()
  {
		$data['emp'] = $this->ShowModel->getDataWHere('employee',['idcompany'=>$this->session->userdata('idcompany')])->result();
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('payroll/pay-calendar',$data);
  }

	public function savePayCal(){
    $id = $this->uuid->v4();
    $select_employee = $this->input->post('select_employee');
    $salary = $this->input->post('salary');
    $inSave = $this->InsertModel->indata('pay_calendar_emp',[
      'id' =>$id,
      'idcompany'=>$this->session->userdata('idcompany'),
      'mainid' =>$select_employee,
      'salary'=>$salary,
    ]);
  }

  public function delPayCal(){
    //$id = $this->input->post('id');
    $id = $this->uri->segment(2);
    $inDel = $this->DeleteModel->delItem('pay_calendar_emp',['id'=>$id]);
    if($inDel){
      $this->session->set_flashdata('suc','Data has been deleted');
      redirect('pay-calendar');
    }
  }

  public function pay_run()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('payroll/pay run',$data);
  }

  public function pay_report()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('payroll/report',$data);
  }
}
?>
