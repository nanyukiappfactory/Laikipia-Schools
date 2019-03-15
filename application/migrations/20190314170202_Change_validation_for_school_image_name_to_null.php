<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Change_validation_for_school_image_name_to_null extends CI_Migration
{
    public function up()
    {
        $table = "school";
        $fields = array(
            'school_image_name' => array('type' => 'VARCHAR', 'NULL' => true),
        );
        $this->dbforge->add_column($table, $fields);
    }
    public function down()
    {
        $table = "school";
        $this->dbforge->drop_column($table, 'school_image_name');
    }
}
