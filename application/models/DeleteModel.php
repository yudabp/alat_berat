<?php
if(!defined('BASEPATH')) exit('no file allowed');
class DeleteModel extends CI_Model{
  public function __construct(){
    parent::__construct();
  }
  public function delItem($table,$where){
    return $query = $this->db->delete($table,$where);
    /*if($query){
				return array("result" => "success");
			}
			else{
				return array("result" => "failed");
			}*/
  }
}
