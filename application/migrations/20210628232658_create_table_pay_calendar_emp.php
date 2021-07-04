<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Create_table_pay_calendar_emp extends CI_Migration
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
                'type'=>'VARCHAR',
                'constraint'=>'225',
                'unsigned'=>TRUE,
			),
			'idcompany' => array(
				'type'=>'VARCHAR',
				'constraint'=>'225',
				'null'=>true,
			),
			'mainid' => array(
				'type'=>'VARCHAR',
				'constraint'=>'225',
				'null'=>true,
			),
			'id_calendar' => array(
				'type'=>'VARCHAR',
				'constraint'=>'225',
				'null'=>true,
			),
			'salary' => array(
				'type'=>'TEXT',
				'null'=>true,
			),
			'total_allowance' => array(
				'type'=>'TEXT',
				'null'=>true,
			),
			'total_deduction' => array(
				'type'=>'TEXT',
				'null'=>true,
			)
        );
		$this->dbforge->drop_table('pay_calendar_emp',TRUE);
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('pay_calendar_emp', TRUE);
    }
    
	public function down()
	{
	    $this->dbforge->drop_table('pay_calendar_emp', TRUE);
    }
}
/* End of file '20210628232658_create_table_pay_calendar_emp' */
/* Location: .//opt/lampp/htdocs/alat_berat/application/migrations/20210628232658_create_table_pay_calendar_emp.php */
