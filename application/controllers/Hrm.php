<?php

use PhpParser\Node\Expr\PostInc;

defined('BASEPATH') OR exit('No direct script access allowed');

class Hrm extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->api->CheckSession();
     date_default_timezone_set("Asia/Jakarta");
     qazwsxedc();
  }

  //overview
  public function hrm_overview(){
    $data['emnum'] = $this->db->get_where('employee',[
        'idcompany'=>$this->session->userdata('idcompany')
        ])->num_rows();
    $data['depnum'] = $this->db->get_where('department',['idcompany'=>$this->session->userdata('idcompany')])->num_rows();
    $data['desnum'] = $this->db->get_where('designation',['idcompany'=>$this->session->userdata('idcompany')])->num_rows();
    $data['announ'] = $this->db->order_by('id','desc')->get_where('announcement',['idcompany'=>$this->session->userdata('idcompany')])->result();
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $data['birthdays'] = $this->db->select("fname, mname, lname, str_to_date(birth, '%d/%m/%Y') as birthday")->from('employee')->where(['idcompany'=>$this->session->userdata('idcompany')])->where('month(str_to_date(birth, "%d/%m/%Y")) = month(NOW())')->get()->result();
    $data['leavesThisMonth'] = $this->db->query("SELECT * FROM `leavereq` JOIN employee on (employee.employeid = leavereq.mainid) LEFT JOIN department on (department.iddepartment=employee.department) where leavereq.idcompany='".$this->session->userdata('idcompany')."' and month(str_to_date(fromdate, '%d/%m/%Y'))=month(now()) GROUP BY leavereq.mainid")->result();
    $data['leavesNextMonth'] = $this->db->query("SELECT * FROM `leavereq` JOIN employee on (employee.employeid = leavereq.mainid) LEFT JOIN department on (department.iddepartment=employee.department) where leavereq.idcompany='".$this->session->userdata('idcompany')."' and month(str_to_date(fromdate, '%d/%m/%Y'))=month(now() + INTERVAL 1 MONTH) GROUP BY leavereq.mainid")->result();
		// var_dump($data);
		// print_r($data);
    // var_dump($this->db->last_query());
    // echo "<pre>";
    // var_dump($this->session->userdata());
    // exit;
    $this->load->view('hrm/overview',$data);
  }
	
  //department
  public function department()
  {
		$data['view'] = $this->ShowModel->getDataWHere('department',['idcompany'=>$this->session->userdata('idcompany')])->result();
    // $data['view'] = $this->ShowModel->getDataWHere('department',['departmentstatus'=>'0','idcompany'=>$this->session->userdata('idcompany')])->result();
    $data['employe'] = $this->db->get_where('employee',['idcompany'=>$this->session->userdata('idcompany')])->result();
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('hrm/department',$data);
  }
  public function saveDep(){
		$id = $this->uuid->v4();
    $department_title = $this->input->post('department_title');
    $description = $this->input->post('description');
    $department_lead = $this->input->post('department_lead');
    $parent_department = $this->input->post('parent_department');
    if($parent_department==""){
			$depstatus = "0";
    }else{
			$depstatus ="1";
    }
    $inSave = $this->InsertModel->indata('department',[
			'iddepartment' =>$id,
      'idcompany' =>$this->session->userdata('idcompany'),
      'departmenttitle' =>$department_title,
      'departmentdesc'=>$description,
      'departmentlead' =>$department_lead,
      'parentdepartment' =>$parent_department,
      'departmentstatus'=>$depstatus
			]);
	}
	public function delDep(){
		$id = $this->input->post('id');
		$inGet = $this->db->get_where('department',['iddepartment'=>$id])->row();
		if($inGet->departmentstatus == 0){
			$this->DeleteModel->delItem('department',['parentdepartment'=>$inGet->departmenttitle,'idcompany'=>$this->session->userdata('idcompany')]);
		}
		$this->DeleteModel->delItem('department',['iddepartment'=>$id]);
		$this->session->set_flashdata('suc','Data has been deleted');
	}
	public function edtDep(){
		$id = $this->input->post('id');
		$data = $this->ShowModel->getDataWHere('department',['iddepartment'=>$id])->row_array();
		echo json_encode($data);
	}
	public function showSubDep(){
		$id = $this->input->post('id');
		$data = $this->ShowModel->getDataWHere('department',['parentdepartment'=>$id,'idcompany'=>$this->session->userdata('idcompany')])->result();
		echo json_encode($data);
	}
	public function uptDep(){
		$id_dep = $this->input->post('id_dep');
		$department_title = $this->input->post('department_title');
		$description = $this->input->post('description');
		$department_lead = $this->input->post('department_lead');
		$parent_department = $this->input->post('parent_department');
		$inUpt = $this->InsertModel->uptdata('department',[
			'departmenttitle' =>$department_title,
			'departmentdesc'=>$description,
			'departmentlead' =>$department_lead,
			'parentdepartment' =>$parent_department
		],['iddepartment'=>$id_dep]);
	}
	
	//employee
	public function employee()
	{
		$get_url = file_get_contents('http://api.literasia.co.id/static/api/provinces.json');
		$data['provinsi'] = json_decode($get_url);
		$data['viewdep'] = $this->ShowModel->getDataWHere('department',['departmentstatus'=>'0','idcompany'=>$this->session->userdata('idcompany')])->result();
		$data['viewdes'] = $this->ShowModel->getDataWHere('designation',['idcompany'=>$this->session->userdata('idcompany')])->result();
		$data['viewloc'] = $this->ShowModel->getDataWHere('branch_office',['idcompany'=>$this->session->userdata('idcompany')])->result();
		$data['viewlead'] = $this->ShowModel->getDataWHere('department',['departmentstatus'=>'1','idcompany'=>$this->session->userdata('idcompany')])->result();
		$data['view'] = $this->db->select('*')
		->join('department','department.iddepartment = employee.department')
		->join('designation','designation.iddesignation = employee.jobtitle')
		->join('employee_access','employee_access.mainid = employee.mainid')
		->get_where('employee',['employee.idcompany'=>$this->session->userdata('idcompany')])
		->result();
		// $data['view'] = $this->db->select('*')
		// ->join('employee_access','employee_access.mainid = employee.mainid')
		// ->get_where('employee',['employee.idcompany'=>$this->session->userdata('idcompany')])
		// ->result();
		$data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
		// $data['roles'] = $this->db->get_where('role',['idcompany'=>$this->session->userdata('idcompany')])->result();
		// var_export($data);
		$this->load->view('hrm/employee',$data);
  }

  public function saveemployee(){
    $mainid = $this->uuid->v4("mainid");
    $first_name = $this->input->post('first_name');
    $middle_name = $this->input->post('middle_name');
    $last_name = $this->input->post('last_name');
    $employee_id = $this->input->post('employee_id');
    $email = $this->input->post('email');
    $employee_type = $this->input->post('employee_type');
    $employee_status = $this->input->post('employee_status');
    $date_of_hire = $this->input->post('date_of_hire');
    $department = $this->input->post('department');
    $job_title = $this->input->post('job_title');
    $location = $this->input->post('location');
    $reporting_to = $this->input->post('reporting_to');
    $source_of_hire = $this->input->post('source_of_hire');
    $payrate = $this->input->post('payrate');
    $pay_type = $this->input->post('pay_type');
    $work_phone = $this->input->post('work_phone');
    $phone = $this->input->post('phone');
    $hand_phone = $this->input->post('hand_phone');
    $other_email = $this->input->post('other_email');
    $date_of_birth = $this->input->post('date_of_birth');
    $nationality = $this->input->post('nationality');
    $gender = $this->input->post('gender');
    $marital_status = $this->input->post('marital_status');
    $driving_license = $this->input->post('driving_license');
    $address = $this->input->post('address');
    $state = $this->input->post('state');
    $city = $this->input->post('city');
    $zip_code = $this->input->post('zip_code');
    $notification = $this->input->post('notification');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $allow = $this->input->post('allow');
		$role = $this->input->post('role');
    $avai = explode('/',$date_of_hire);
		if (date("Y") == $avai[2]) {
			$ava = 12 - $avai[1];
		}else {
			$ava = 12;
		}

    if(isset($notification)){
      $notif = $notification;
    }else{
      $notif = "no";
    }

    if(isset($allow)){
      $allowed = $allow;
    }else{
      $allowed = "no";
    }

    $inCheck = $this->ShowModel->getDataWHere('employee_access',['username'=>$username,'idcompany'=>$this->session->userdata('idcompany')]);
    if(!empty($username) && $inCheck->num_rows() > 0){
      $this->session->set_flashdata('item','Username sudah ada');
      redirect('employees');
    }else{
      if(!empty($_FILES['photo']['name'])){
  	            $renamefile  = imgRandom();
  	            //Config File
  	            $config['upload_path'] = './assets/staffprofil/';
  	            $config['allowed_types'] = 'jpg|jpeg|png';
  	            $config['file_name'] = $renamefile;

  	            $this->load->library('upload', $config);
  	            $uploading = $this->upload->do_upload('photo');

  	        	if($uploading){
  		            $hasil = $this->upload->data();
  		            $name_img = $hasil['file_name'];
  	          	}
  	        }else{
                  $name_img ="";
            }

      $inEnter = $this->InsertModel->indata('employee',[
        'mainid'=>$mainid,
        'idcompany'=>$this->session->userdata('idcompany'),
        'employeid'=>$employee_id,
        'fname'=>$first_name,
        'lname'=>$last_name,
        'mname'=>$middle_name,
        'email'=>$email,
        'employetype'=>$employee_type,
        'employestatus'=>$employee_status,
        'datehire'=>$date_of_hire,
        'department'=>$department,
        'jobtitle'=>$job_title,
        'location'=>$location,
        'reportingto'=>$reporting_to,
        'sourceofhire'=>$source_of_hire,
        'payrate'=>$payrate,
        'paytype'=>$pay_type,
        'workphone'=>$work_phone,
        'phone'=>$phone,
        'handphone'=>$hand_phone,
        'otheremail'=>$other_email,
        'birth'=>$date_of_birth,
        'nationality'=>$nationality,
        'gender'=>$gender,
        'status'=>$marital_status,
        'drivinglicense'=>$driving_license,
        'address'=>$address,
        'city'=>$city,
        'state'=>$state,
        'zipcode'=>$zip_code,
        'photo' => $name_img,
        'sendnotif'=>$notif,
        'allow' =>$allowed,
        'available'=>$ava
      ]);
      $inGet    =   $this->db->order_by('created_at','desc')
                    ->get_where('employee',['idcompany'=>$this->session->userdata('idcompany')])
                    ->row();
      $inSave = $this->db->insert('employee_access',[
        'idaccess'=>$mainid,
        'idcompany' =>$this->session->userdata('idcompany'),
        'mainid'=>$inGet->mainid,
        'username' => $username,
        'password' => password_hash($password,PASSWORD_DEFAULT)
      ]);

			// $inRole = $this->db->insert('employee_role',[
			// 	'mainid'=>$mainid,
			// 	'role_id'=>$role
			// ]);
      if($inEnter==TRUE && $inSave){
        $this->session->set_flashdata('suc','Data has been added');
        redirect('employees');
      }else{
        echo"fail";
      }
    }
  }

  public function delEmp(){
    //$id = $this->input->post('id');
    $id = $this->uri->segment(2);
    $inGet = $this->ShowModel->getDataWHere('employee',['mainid'=>$id]);
    if($inGet->num_rows() > 0){
      $a = $inGet->row();
      if($a->photo!=""){
        $data_path = "./assets/staffprofil/".$a->photo;
        unlink($data_path);
      }
    }
    $inDel = $this->DeleteModel->delItem('employee',['mainid'=>$id]);
    $inDelAccess = $this->DeleteModel->delItem('employee_access',['mainid'=>$id]);
    $inDelLeave = $this->DeleteModel->delItem('leavereq',['mainid'=>$id]);
    $inDelRole = $this->DeleteModel->delItem('employee_role',['mainid'=>$id]);
    if($inDel && $inDelAccess && $inDelLeave && $inDelRole){
      $this->session->set_flashdata('suc','Data has been deleted');
      redirect('employees');
    }
  }

  public function edtEmp(){
    $id = $this->input->post('id');
    //$data = $this->ShowModel->getDataWHere('employee',['mainid'=>$id])->row_array();
    $data = $this->db->join('employee_access','employee_access.mainid = employee.mainid')
														// ->join('employee_role','employee_role.mainid = employee.mainid')
                            ->get_where('employee',['employee.mainid'=>$id])
                            ->row_array();
    echo json_encode($data);
  }

  public function viewEmp(){
    // $id = $this->input->get('id');
    $id = $this->input->post('id');
    $data['data'] = $this->db->join('department','department.iddepartment = employee.department')
														// ->join('employee_role','employee_role.mainid = employee.mainid')
                            ->join('designation','designation.iddesignation = employee.jobtitle')
                            ->get_where('employee',['employee.mainid'=>$id])
                            ->row_array();
		$prov_id = $data['data']['state'];
		$city_id = $data['data']['city'];
		$get_prov = file_get_contents("http://api.literasia.co.id/static/api/province/".$prov_id.".json");
		$get_city = file_get_contents("http://api.literasia.co.id/static/api/regency/".$city_id.".json");
		$data['provinsi'] = json_decode($get_prov);
		$data['city'] = json_decode($get_city);
		$data['p_basic'] = $this->db->get_where('payroll_basic',['mainid'=>$id])->row();
		// print_r($data['provinsi']);
    // exit;
    echo json_encode($data);
    // $this->load->view('hrm/detail employee');
  }

  public function detailEmp()
  {
		$id = $this->input->get('id');
    $data['val'] = $this->db->join('department','department.iddepartment = employee.department')
                  ->join('designation','designation.iddesignation = employee.jobtitle')
                  ->get_where('employee',['employee.mainid'=>$id])
                  ->row();
    $data['leave'] = $this->db->select('*')
							->from('leavereq')
							->where('mainid', $id)
		 					->get();
		$data['p_basic'] = $this->db->get_where('payroll_basic',['mainid'=>$id])->row();
		// $data['p_allowance'] = $this->db->get_where('payroll_allowance',['mainid'=>$id])->result();
    $this->load->view('hrm/detail employee', $data);
  }

  public function uptEmp(){
    $mainid = $this->input->post('id');
    $first_name = $this->input->post('first_name');
    $middle_name = $this->input->post('middle_name');
    $last_name = $this->input->post('last_name');
    $employee_id = $this->input->post('employee_id');
    $email = $this->input->post('email');
    $employee_type = $this->input->post('employee_type');
    $employee_status = $this->input->post('employee_status');
    $date_of_hire = $this->input->post('date_of_hire');
    $department = $this->input->post('department');
    $job_title = $this->input->post('job_title');
    $location = $this->input->post('location');
    $reporting_to = $this->input->post('reporting_to');
    $source_of_hire = $this->input->post('source_of_hire');
    $payrate = $this->input->post('payrate');
    $pay_type = $this->input->post('pay_type');
    $work_phone = $this->input->post('work_phone');
    $phone = $this->input->post('phone');
    $hand_phone = $this->input->post('hand_phone');
    $other_email = $this->input->post('other_email');
    $date_of_birth = $this->input->post('date_of_birth');
    $nationality = $this->input->post('nationality');
    $gender = $this->input->post('gender');
    $marital_status = $this->input->post('marital_status');
    $driving_license = $this->input->post('driving_license');
    $address = $this->input->post('address');
    $state = $this->input->post('state');
    $city = $this->input->post('city');
    $zip_code = $this->input->post('zip_code');
    $notification = $this->input->post('notification');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $allow = $this->input->post('allow');
		$role = $this->input->post('role');
    $avai = explode('/',$date_of_hire);
		if (date("Y") == $avai[2]) {
			$ava = 12 - $avai[1];
		}else {
			$ava = 12;
		}

    $inGet = $this->ShowModel->getDataWHere('employee',['mainid'=>$mainid]);
    $inCheck = $this->db->get_where('employee_access',['username'=>$username]);
    // if($inCheck->num_rows() > 0){
    //   $this->session->set_flashdata('item','Username sudah ada');
    //   redirect('employees');
    // }
    // else{
      $a = $inGet->row();
      if(!empty($_FILES['photo']['name'])){

        if($inGet->num_rows() > 0){

          if($a->photo!=""){
            $data_path = "./assets/staffprofil/".$a->photo;
            unlink($data_path);
          }
        }
  	            $renamefile  = imgRandom();
  	            //Config File
  	            $config['upload_path'] = './assets/staffprofil/';
  	            $config['allowed_types'] = 'jpg|jpeg|png';
  	            $config['file_name'] = $renamefile;

  	            $this->load->library('upload', $config);
  	            $uploading = $this->upload->do_upload('photo');

  	        	if($uploading){
  		            $hasil = $this->upload->data();
  		            $name_img = $hasil['file_name'];
  	          	}
  	        }else{
                $name_img = $a->photo;
            }

      $inEnter = $this->InsertModel->uptdata('employee',[
        'employeid'=>$employee_id,
        'fname'=>$first_name,
        'lname'=>$last_name,
        'mname'=>$middle_name,
        'email'=>$email,
        'employetype'=>$employee_type,
        'employestatus'=>$employee_status,
        'datehire'=>$date_of_hire,
        'department'=>$department,
        'jobtitle'=>$job_title,
        'location'=>$location,
        'reportingto'=>$reporting_to,
        'sourceofhire'=>$source_of_hire,
        'payrate'=>$payrate,
        'paytype'=>$pay_type,
        'workphone'=>$work_phone,
        'phone'=>$phone,
        'handphone'=>$hand_phone,
        'otheremail'=>$other_email,
        'birth'=>$date_of_birth,
        'nationality'=>$nationality,
        'gender'=>$gender,
        'status'=>$marital_status,
        'drivinglicense'=>$driving_license,
        'address'=>$address,
        'city'=>$city,
        'state'=>$state,
        'zipcode'=>$zip_code,
        'photo' => $name_img,
        'sendnotif'=>$notification,
        'allow' =>$allow,
        'available'=>$ava
      ],['mainid'=>$mainid]);

      if($password!=""){
        $inSave = $this->db->where(['mainid'=>$mainid])
                            ->update('employee_access',[
          'username' => $username,
          'password' => password_hash($password,PASSWORD_DEFAULT)
        ]);
      }else{
        $inSave = $this->db->where(['mainid'=>$mainid])
                            ->update('employee_access',[
          'username' => $username,
        ]);
      }

			$inRole = $this->InsertModel->uptdata('employee_role',[
				'role_id'=>$role
			],['mainid'=>$mainid]);

      if($inEnter==TRUE && $inSave && $inRole){
        $this->session->set_flashdata('suc','Data has been updated');
        redirect('employees');
      }else{
        echo"fail";
      }
    // }
  }

  public function designation(){
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $data['view'] = $this->ShowModel->getDataWHere('designation',['idcompany'=>$this->session->userdata('idcompany')])->result();
    $this->load->view('hrm/designation',$data);
  }
  public function saveDes(){
    $id = $this->uuid->v4();
    $designation_title = $this->input->post('designation_title');
    $description = $this->input->post('description');
    $inSave = $this->InsertModel->indata('designation',[
      'iddesignation' =>$id,
      'idcompany'=>$this->session->userdata('idcompany'),
      'designationtitle' =>$designation_title,
      'designationdecs'=>$description,
    ]);
  }
  public function delDes(){
    //$id = $this->input->post('id');
    $id = $this->uri->segment(2);
    $inDel = $this->DeleteModel->delItem('designation',['iddesignation'=>$id]);
    if($inDel){
      $this->session->set_flashdata('suc','Data has been deleted');
      redirect('designations');
    }
  }
  public function edtDes(){
    $id = $this->input->post('id');
    $data = $this->ShowModel->getDataWHere('designation',['iddesignation'=>$id])->row_array();
    echo json_encode($data);
  }
  public function uptDes(){
    $id_des = $this->input->post('id_des');
    $designation_title = $this->input->post('designation_title');
    $description = $this->input->post('description');
    $inUpt = $this->InsertModel->uptdata('designation',[
      'designationtitle' =>$designation_title,
      'designationdecs'=>$description,
    ],['iddesignation'=>$id_des]);
  }

  public function announcement(){
    $data['view'] = $this->db->order_by('id','desc')->get_where('announcement',['idcompany'=>$this->session->userdata('idcompany')])->result();
    $data['dept'] = $this->ShowModel->getDataWHere('department',['idcompany'=>$this->session->userdata('idcompany')])->result();
    $data['desg'] = $this->ShowModel->getDataWHere('designation',['idcompany'=>$this->session->userdata('idcompany')])->result();
    $data['emp'] = $this->ShowModel->getDataWHere('employee',['idcompany'=>$this->session->userdata('idcompany')])->result();
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('hrm/announcement',$data);
  }

  public function saveAnn(){
    $id = $this->uuid->v4();
    $announcement_title = $this->input->post('announcement_title');
    $description = $this->input->post('description');
    $tipeSelection = $this->input->post('tipeSelection');
    $selected_employee = $this->input->post('selected_employee[]');
    $by_depart = $this->input->post('by_depart');
    $by_des = $this->input->post('by_des');
    if($by_depart!=""){
      $a = $by_depart;
    }else if($by_des!=""){
      $a = $by_des;
    }else{
      $a ="";
    }
    $inSave = $this->InsertModel->indata('announcement',[
      'idann' =>$id,
      'idcompany'=>$this->session->userdata('idcompany'),
      'anntitle' =>$announcement_title,
      'anndesc'=>$description,
      'annsendto'=>$tipeSelection,
      'annsenddetail'=>$a,
    ]);

    if(isset($selected_employee)){
      $inGet = $this->db->order_by('id','desc')
                        ->get_where('announcement',['idcompany'=>$this->session->userdata('idcompany')])
                        ->row();
      $value = array();
        foreach ($selected_employee as $key) {
          array_push($value,array(
            'idcompany'=>$this->session->userdata('idcompany'),
            'diann'=>$key,
            'mainid'=>$inGet->idann
          ));
        }
        $save = $this->db->insert_batch('annsendto',$value);
    }
    // $data['title'] = "Success!";
    // $data['text'] = "Data has been added!";
    // $data['type'] = "success";
    // $data['confirmButtonClass'] = "btn btn-success";

    $this->session->set_flashdata('suc','Data has been added');
    redirect('announcement');
    // json_encode($data);
  }
  public function delAnn(){
    $id = $this->input->post('id');
    $this->DeleteModel->delItem('annsendto',['mainid'=>$id]);
    $this->DeleteModel->delItem('announcement',['idann'=>$id]);
  }
  public function edtAnn(){
    $id = $this->input->post('id');
    $data = $this->ShowModel->getDataWHere('announcement',['idann'=>$id])->row_array();
    echo json_encode($data);
  }
  public function showSelEmp(){
    $id = $this->input->post('id');
    $data = $this->db ->join('annsendto','annsendto.mainid = announcement.idann')
                     ->get_where('announcement',['announcement.idann'=>$id,'idcompany'=>$this->session->userdata('idcompany')])
                     ->result();
    echo json_encode($data);
  }

  public function uptAnn(){
    $id = $this->input->post('id_ann');
    $announcement_title = $this->input->post('announcement_title');
    $description = $this->input->post('description');
    $tipeSelection = $this->input->post('tipeSelection');
    $selected_employee = $this->input->post('selected_employee');
    $by_depart = $this->input->post('by_depart');
    $by_des = $this->input->post('by_des');
    if($by_depart!=""){
      $a = $by_depart;
    }else if($by_des!=""){
      $a = $by_des;
    }else if($tipeSelection=="all" || $tipeSelection=="selected"){
      $a = " ";
    }
    $inSave = $this->InsertModel->uptdata('announcement',[
      'anntitle' =>$announcement_title,
      'anndesc'=>$description,
      'annsendto'=>$tipeSelection,
      'annsenddetail'=>$a,
    ],['idann' =>$id]);

    if($tipeSelection!="selected"){
      $inCheck = $this->db->get_where('annsendto',['mainid'=>$id]);
      if($inCheck->num_rows() > 0){
        $this->DeleteModel->delItem('annsendto',['mainid'=>$id]);
      }
    }else{
      if(isset($selected_employee)){
        $value = array();
          foreach ($selected_employee as $key) {
            array_push($value,array(
              'idcompany'=>$this->session->userdata('idcompany'),
              'diann'=>$key,
              'mainid'=>$id
            ));
          }
          $save = $this->db->insert_batch('annsendto',$value);
      }
    }
    $this->session->set_flashdata('suc','Data has been updated');
    redirect('announcement');
  }
  public function delSel(){
    $id = $this->input->post('id');
    $this->DeleteModel->delItem('annsendto',['idannsendto'=>$id]);
  }

  public function hrm_report()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('hrm/report',$data);
  }

	public function getKab(){
			$provinsi_id = $this->input->get('provinsi_id');
			$get_url = file_get_contents('http://api.literasia.co.id/static/api/regencies/'.$provinsi_id.'.json');
			// print_r($get_url);
			json_decode($get_url);
	}

	public function userAccess()
	{
			$data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
			$data['employees'] = $this->db->join('employee_access','employee_access.mainid = employee.mainid')
			->get_where('employee',['employee.idcompany'=>$this->session->userdata('idcompany')])
			->result();
			$this->load->view('hrm/user-access', $data);
	}

	public function changeUserAccess()
	{
			$mainid = $this->input->post('mainid');
			$isChecked = $this->input->post('isChecked')=='true'?1:0;
			$structure = $this->input->post('structure');
			$this->InsertModel->uptdata('employee_access',[
				$structure => $isChecked,
				],['mainid'=>$mainid]);
			var_dump($this->db->last_query());
	}

	public function showBasic(){
		// $id = $this->input->get('id');
		$id = $this->input->post('id');
		$data['p_emplo'] = $this->db->get_where('employee',['mainid'=>$id])->row();
		$data['p_basic'] = $this->db->get_where('payroll_basic',['mainid'=>$id])->row();
		echo json_encode($data);
	}

	public function saveBasic()
	{
		$id = $this->input->post('id');
		$basic_pay = $this->input->post('basic_pay');
		$tax_number = $this->input->post('tax_number');
		$bank_account_number = $this->input->post('bank_account_number');
		$bank_account_name = $this->input->post('bank_account_name');
		$bank_name = $this->input->post('bank_name');

		$inCheck = $this->ShowModel->getDataWHere('payroll_basic',['mainid'=>$id,'idcompany'=>$this->session->userdata('idcompany')]);

		if ($inCheck->num_rows() > 0) {
			$data = $this->InsertModel->uptdata('payroll_basic',[
				'basic_pay'=>$basic_pay,
				'tax_number'=>$tax_number,
				'bank_account_number'=>$bank_account_number,
				'bank_account_name'=>$bank_account_name,
				'bank_name'=>$bank_name,
			],['mainid' =>$id]);
			$upEmp = $this->InsertModel->uptdata('employee',[
				'payrate'=>$basic_pay,
			],['mainid' =>$id]);
			echo json_encode($data);
		}else {
			$data = $this->InsertModel->indata('payroll_basic',[
				'id' =>$this->uuid->v4(),
				'idcompany'=>$this->session->userdata('idcompany'),
				'mainid' =>$id,
				'basic_pay'=>$basic_pay,
				'tax_number'=>$tax_number,
				'bank_account_number'=>$bank_account_number,
				'bank_account_name'=>$bank_account_name,
				'bank_name'=>$bank_name,
			]);
			$upEmp = $this->InsertModel->uptdata('employee',[
				'payrate'=>$basic_pay,
			],['mainid' =>$id]);
			echo json_encode($data);
		}
	}

	public function showAllowance(){
		// $id = $this->input->get('id');
		$id = $this->input->post('id');
		$data = $this->db->get_where('payroll_allowance',['mainid'=>$id])->result();
		echo json_encode($data);
	}

	public function saveAllowance(){
    $id = $this->uuid->v4();
		$mainid = $this->input->post('id');
    $item = $this->input->post('item');
    $payment = $this->input->post('payment');
    $data = $this->InsertModel->indata('payroll_allowance',[
      'id' =>$id,
			'mainid' =>$mainid,
      'idcompany'=>$this->session->userdata('idcompany'),
      'item' =>$item,
      'amount'=>$payment,
    ]);
		echo json_encode($data);
  }

	public function delAllowance(){
    $id = $this->input->post('id');
    $this->DeleteModel->delItem('payroll_allowance',['id'=>$id]);
  }

	public function showDeduction(){
		// $id = $this->input->get('id');
		$id = $this->input->post('id');
		$data = $this->db->get_where('payroll_deduction',['mainid'=>$id])->result();
		echo json_encode($data);
	}

	public function saveDeduction(){
    $id = $this->uuid->v4();
		$mainid = $this->input->post('id');
    $item = $this->input->post('item');
    $payment = $this->input->post('payment');
    $data = $this->InsertModel->indata('payroll_deduction',[
      'id' =>$id,
			'mainid' =>$mainid,
      'idcompany'=>$this->session->userdata('idcompany'),
      'item' =>$item,
      'amount'=>$payment,
    ]);
		echo json_encode($data);
  }

	public function delDeduction(){
    $id = $this->input->post('id');
    $this->DeleteModel->delItem('payroll_deduction',['id'=>$id]);
  }

	public function showTax(){
		// $id = $this->input->get('id');
		$id = $this->input->post('id');
		$data = $this->db->get_where('payroll_tax',['mainid'=>$id])->result();
		echo json_encode($data);
	}

	public function saveTax(){
    $id = $this->uuid->v4();
		$mainid = $this->input->post('id');
    $item = $this->input->post('item');
    $payment = $this->input->post('payment');
    $data = $this->InsertModel->indata('payroll_tax',[
      'id' =>$id,
			'mainid' =>$mainid,
      'idcompany'=>$this->session->userdata('idcompany'),
      'item' =>$item,
      'amount'=>$payment,
    ]);
		echo json_encode($data);
  }

	public function delTax(){
    $id = $this->input->post('id');
    $this->DeleteModel->delItem('payroll_tax',['id'=>$id]);
  }

	public function showPayment(){
		// $id = $this->input->get('id');
		$id = $this->input->post('id');
		$data = $this->db->get_where('payroll_basic',['mainid'=>$id])->row();
		echo json_encode($data);
	}

	public function savePayment(){
		$mainid = $this->input->post('id');
    $payment = $this->input->post('payment_method');
    $data = $this->InsertModel->uptdata('payroll_basic',[
      'payment_method'=>$payment,
    ],['mainid'=>$mainid]);
		echo json_encode($data);
  }

}
?>
