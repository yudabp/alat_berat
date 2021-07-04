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
class Migration_Add_access_field_to_employee_access_table extends CI_Migration
{
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
        // $this->dbforge->drop_table('payroll_basic');
    }
}
