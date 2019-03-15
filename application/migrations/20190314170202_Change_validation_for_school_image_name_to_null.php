<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Change_validation_for_school_image_name_to_null extends CI_Migration
{
    public function up()
    {
        $table = "school";
        $fields = array(
            'school_image_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null',

            ),
            'school_thumb_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null',
            ),
        );
        $this->dbforge->modify_column($table, $fields);
    }
    public function down()
    {
        $table = "school";
        $fields = array(
            'school_image_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,

            ),
            'school_thumb_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ),
        );
        $this->dbforge->modify_column($table, $fields);

    }
}