<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Create_table_pay_calendar extends CI_Migration
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
			'calendar_name' => array(
				'type'=>'VARCHAR',
				'constraint'=>'100',
				'null'=>true,
			),
			'calendar_type' => array(
				'type'=>'VARCHAR',
				'constraint'=>'100',
				'null'=>true,
			),
			'normal_pay_day' => array(
				'type'=>'VARCHAR',
				'constraint'=>'100',
				'null'=>true,
			),
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('pay_calendar', TRUE);
    }
    
	public function down()
	{
	    $this->dbforge->drop_table('pay_calendar', TRUE);
    }
}
/* End of file '20210702014757_create_table_pay_calendar' */
/* Location: .//opt/lampp/htdocs/alat_berat/application/migrations/20210702014757_create_table_pay_calendar.php */
