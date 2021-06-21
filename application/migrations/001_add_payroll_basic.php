<?php
/**
 * @author   Natan Felles <natanfelles@gmail.com>
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Migration_create_table_users
 *
 * @property CI_DB_forge         $dbforge
 * @property CI_DB_query_builder $db
 */
class Migration_Add_payroll_basic extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(
           array(
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
              'basic_pay' => array(
                 'type' => 'TEXT',
                 'null' => true,
              ),
              'tax_number' => array(
                 'type' => 'VARCHAR',
                 'constraint' => '100',
				 'null' => true,
              ),
              'bank_account_number' => array(
                 'type' => 'VARCHAR',
                 'constraint' => '100',
				 'null' => true,
              ),
              'bank_account_name' => array(
                 'type' => 'VARCHAR',
                 'constraint' => '100',
				 'null' => true,
              ),
              'bank_name' => array(
                 'type' => 'VARCHAR',
                 'constraint' => '100',
				 'null' => true,
              ),
           )
        );

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('payroll_basic');
    }

    public function down()
    {
        $this->dbforge->drop_table('payroll_basic');
    }
}
