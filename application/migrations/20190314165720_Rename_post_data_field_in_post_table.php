<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Rename_post_data_field_in_post_table extends CI_Migration
{

    public function up()
    {

        $fields = array(
            'post_data' => array(
                'name' => 'post_date',
                'type' => 'DATE',
            ),
        );
        $this->dbforge->modify_column('post', $fields);
    }

    public function down()
    {
        $fields = array(
            'post_date' => array(
                'name' => 'post_data',
                'type' => 'DATE',

            ),
        );
        $this->dbforge->modify_column('post', $fields);
    }
}
