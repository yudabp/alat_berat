<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Create_warehouse_stok_table extends CI_Migration
{
    public function __construct()
	{
	    parent::__construct();
		$this->load->dbforge();
	}
	
	public function up()
	{
	    $fields = array(
            'idwarehousestock' => [
                'type'=>'VARCHAR',
                'constraint'=>'255',
                'unsigned'=>TRUE,
			],
            'idcompany' => [
                'type'=>'VARCHAR',
                'constraint'=>'255',
			],
            'idbranch' => [
                'type'=>'VARCHAR',
                'constraint'=>'255',
			],
            'idsparepart' => [
                'type'=>'VARCHAR',
                'constraint'=>'255',
			],
            'stock' => [
                'type'=>'INT',
                'constraint'=> 11,
			],
			'price' => [
				'type' => 'BIGINT',
				'constraint' => 15 
			]
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('idwarehousestock', TRUE);
        $this->dbforge->create_table('warehouse_stok', TRUE);
    }
    
	public function down()
	{
	    $this->dbforge->drop_table('warehouse_stok', TRUE);
    }
}
/* End of file '20210702193402_create_warehouse_stok_table' */
/* Location: ./D:\Xampp\htdocs\akses\alat_berat\application\migrations/20210702193402_create_warehouse_stok_table.php */
