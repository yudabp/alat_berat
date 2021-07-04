<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Create_warehouse_action_table extends CI_Migration
{
    public function __construct()
	{
	    parent::__construct();
		$this->load->dbforge();
	}
	
	public function up()
	{
	    $fields = array(
            'idwarehouseaction' => [
                'type'=>'VARCHAR',
                'constraint'=> '255',
                'unsigned'=>TRUE,
			],
			'idcompany' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'idbranch' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'idsparepart' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'type' => [
				'type' => 'ENUM',
				'constraint' => ['add', 'request', 'transfer'],
			],
			'warehouse to' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'jumlah' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'created_at datetime default current_timestamp'
			
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('idwarehouseaction', TRUE);
        $this->dbforge->create_table('warehouse_action', TRUE);
    }
    
	public function down()
	{
	    $this->dbforge->drop_table('warehouse_action', TRUE);
    }
}
/* End of file '20210702193417_create_warehouse_action_table' */
/* Location: ./D:\Xampp\htdocs\akses\alat_berat\application\migrations/20210702193417_create_warehouse_action_table.php */
