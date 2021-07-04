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
		// $inCheck = $this->ShowModel->getDataWHere('pay_calendar_emp',['main'=>$username,'idcompany'=>$this->session->userdata('idcompany')]);
		// foreach ($employee as $emp) {
		// 	$inCheck = $this->ShowModel->getDataWHere('pay_calendar_emp',['mainid'=>$emp->mainid])->result();
		// 	echo json_encode($inCheck);
		// }
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('payroll/pay-calendar',$data);
  }

	public function savePayCal(){
    $id = $this->uuid->v4();
    $calendar_name = $this->input->post('calendar_name');
    $calendar_type = $this->input->post('calendar_type');
    $normal_pay_day = $this->input->post('normal_pay_day');
    // $total_deduction = $this->input->post('total_deduction');
    $data['inSave'] = $this->InsertModel->indata('pay_calendar',[
      'id' =>$id,
      'idcompany'=>$this->session->userdata('idcompany'),
      'calendar_name' =>$calendar_name,
      'calendar_type'=>$calendar_type,
      'normal_pay_day'=>$normal_pay_day,
    ]);
		// Update Pay Employee
		$data['upPayEmp'] = $this->InsertModel->uptdata('pay_calendar_emp',[
			'id_calendar'=>$id,
		],['id_calendar' => NULL]);
		echo json_encode($data);
  }

  public function delPayCal(){
    $id = $this->input->post('id');
    // $id = $this->uri->segment(2);
    // $data = $this->db->get_where('pay_calendar',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $data['inDelCal'] = $this->DeleteModel->delItem('pay_calendar',['id'=>$id]);
    $data['inDelCalEmp'] = $this->DeleteModel->delItem('pay_calendar_emp',['id_calendar'=>$id]);
		echo json_encode($data);
    // if($inDel){
    //   $this->session->set_flashdata('suc','Data has been deleted');
    //   redirect('pay-calendar');
    // }
  }

	public function getPayrate()
	{
		$id = $this->input->post('id');
		$data['payrate'] = $this->db->get_where('employee',['mainid'=>$id])->row();
		$data['allowance'] = $this->db->get_where('payroll_allowance',['mainid'=>$id])->result();
		$data['deduction'] = $this->db->get_where('payroll_deduction',['mainid'=>$id])->result();
		$data['tax'] = $this->db->get_where('payroll_tax',['mainid'=>$id])->result();
		echo json_encode($data);
	}

	public function showEmp()
	{
		$data = $this->db->select('*')
			->join('employee','employee.mainid = pay_calendar_emp.mainid')
			->join('department','department.iddepartment = employee.department')
			->join('designation','designation.iddesignation = employee.jobtitle')
			->get_where('pay_calendar_emp',['pay_calendar_emp.idcompany'=>$this->session->userdata('idcompany'),'pay_calendar_emp.id_calendar'=>NULL])
			->result();
		echo json_encode($data);
	}

	public function saveEmp(){
    $id = $this->uuid->v4();
    $select_employee = $this->input->post('select_employee');
    $salary = $this->input->post('salary');
    $total_allowance = $this->input->post('total_allowance');
    $total_deduction = $this->input->post('total_deduction');
		$inCheck = $this->ShowModel->getDataWHere('pay_calendar_emp',['mainid'=>$select_employee]);
		if ($inCheck->num_rows() > 0){
			$data = false;
			echo json_encode($data);
		}else {
			$data['inSave'] = $this->InsertModel->indata('pay_calendar_emp',[
				'id' =>$id,
				'idcompany'=>$this->session->userdata('idcompany'),
				'mainid' =>$select_employee,
				'salary'=>$salary,
				'total_allowance'=>$total_allowance,
				'total_deduction'=>$total_deduction,
			]);
			// Update Payrate
			$data['upPayrate'] = $this->InsertModel->uptdata('employee',[
				'payrate'=>$salary,
			],['mainid' => $select_employee]);
			// Update basic_pay
			$data['upBasic'] = $this->InsertModel->uptdata('payroll_basic',[
				'basic_pay'=>$salary,
			],['mainid' => $select_employee]);
			echo json_encode($data);
		}
  }

	public function delEmp(){
    $id = $this->input->post('id');
    $this->DeleteModel->delItem('pay_calendar_emp',['id'=>$id]);
  }

  public function pay_run()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $data['payRun'] = $this->db->get_where('pay_calendar',['idcompany'=>$this->session->userdata('idcompany')])->result();
    $this->load->view('payroll/pay run',$data);
  }

	public function viewRun(){
		$id = $this->input->post('id');
		$data = $this->db->select('*')
			->join('pay_calendar_emp','pay_calendar_emp.id_calendar = pay_calendar.id')
			->join('employee','employee.mainid = pay_calendar_emp.mainid')
			->join('department','department.iddepartment = employee.department')
			->join('designation','designation.iddesignation = employee.jobtitle')
			->get_where('pay_calendar',['pay_calendar.idcompany'=>$this->session->userdata('idcompany'),'pay_calendar.id'=>$id])
			->result();
		echo json_encode($data);
	}

  public function pay_report()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('payroll/report',$data);
  }
}
?>
