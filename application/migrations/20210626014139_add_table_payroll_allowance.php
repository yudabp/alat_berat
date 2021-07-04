<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Add_table_payroll_allowance extends CI_Migration
{
    public function __construct()
	{
	    parent::__construct();
		$this->load->dbforge();
	}
	
	public function up()
	{
	    $fields = array(
            'id' => array(
				'type' => 'VARCHAR',
				'constraint' => '225',
				'unsigned' => true,
			),
			'idcompany' => array(
				'type' => 'VARCHAR',
				'constraint' => '225',
			),
			'mainid' => array(
				'type' => 'VARCHAR',
				'constraint' => '225',
			),
			'item' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => true,
			),
			'amount' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => true,
			),
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('payroll_allowance', TRUE);
    }
    
	public function down()
	{
	    $this->dbforge->drop_table('payroll_allowance', TRUE);
    }
}
/* End of file '20210626014139_add_table_payroll_allowance' */
/* Location: .//opt/lampp/htdocs/alat_berat/application/migrations/20210626014139_add_table_payroll_allowance.php */
