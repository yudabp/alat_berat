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
class Migration_Add_payment_method_to_payroll_basic extends CI_Migration
{
    public function up()
    {
        $fields = array(
			'payment_method' => array(
				'type' => 'ENUM',
				'constraint' => array('Bank','Cheque','Cash'),
				'null' => true,
			),
        );

        $this->dbforge->add_column('payroll_basic', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('payroll_basic','payment_method');
    }
}
