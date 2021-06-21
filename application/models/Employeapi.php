<?php 
class Employeapi extends CI_Model{

    // public function dataget(){
    //    return $this->db->query("SELECT * FROM employee")->result();
    // }

    public function getemploye($id = null){
        if($id == null){
            return $this->db->query("SELECT * FROM employee_access")->result();
        }else{
            return $this->db->query("SELECT * FROM employee_access WHERE 'idcompany'= $id")->result();
        }
    }
    public function created($saveone,$savetwo){
      return  $this->db->insert('employee',$saveone);
      return  $this->db->insert('employee_access',$savetwo);
    }
    public function delete($id){
        $this->db->delete('regis_api', ['idcompany'=>$id]);
        return $this->db->affected_rows();
    }
}
