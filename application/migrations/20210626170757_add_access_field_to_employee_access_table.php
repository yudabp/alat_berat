<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Add_access_field_to_employee_access_table extends CI_Migration
{
    public function __construct()
	{
	    parent::__construct();
		$this->load->dbforge();
	}
	
	public function up()
	{
	    $fields = array(
            'dbr' => array(
                'type'          => 'TINYINT',
                'constraint'    => 1,
                'default'       => '0',
                'after'         => 'ip'
            ),
            'hrm' => array(
                'type'          => 'TINYINT',
                'constraint'    => 1,
                'default'       => '0',
                'after'         => 'dbr'
            ),
            'lve' => array(
                'type'          => 'TINYINT',
                'constraint'    => 1,
                'default'       => '0',
                'after'         => 'hrm'
            ),
            'cln' => array(
                'type'          => 'TINYINT',
                'constraint'    => 1,
                'default'       => '0',
                'after'         => 'lve'
            ),
            'acc' => array(
                'type'          => 'TINYINT',
                'constraint'    => 1,
                'default'       => '0',
                'after'         => 'cln'
            ),
            'prl' => array(
                'type'          => 'TINYINT',
                'constraint'    => 1,
                'default'       => '0',
                'after'         => 'acc'
            ),
            'srv' => array(
                'type'          => 'TINYINT',
                'constraint'    => 1,
                'default'       => '0',
                'after'         => 'prl'
            ),
            'prd' => array(
                'type'          => 'TINYINT',
                'constraint'    => 1,
                'default'       => '0',
                'after'         => 'srv'
            ),
            'wrh' => array(
                'type'          => 'TINYINT',
                'constraint'    => 1,
                'default'       => '0',
                'after'         => 'prd'
            ),
            'mch' => array(
                'type'          => 'TINYINT',
                'constraint'    => 1,
                'default'       => '0',
                'after'         => 'wrh'
            ),
            'lgu' => array(
                'type'          => 'TINYINT',
                'constraint'    => 1,
                'default'       => '0',
                'after'         => 'mch'
            ),
            'stg' => array(
                'type'          => 'TINYINT',
                'constraint'    => 1,
                'default'       => '0',
                'after'         => 'lgu'
            ),
        );

        $this->dbforge->add_column('employee_access', $fields);
    }
    
	public function down()
	{
	    $this->dbforge->drop_column('employee_access', array('dbr','hrm','lve','cln','acc','prl','srv','prd','wrh','mch','lgu','stg'));
    }
}
/* End of file '20210626170757_add_access_field_to_employee_access_table' */
/* Location: .//opt/lampp/htdocs/alat_berat/application/migrations/20210626170757_add_access_field_to_employee_access_table.php */
