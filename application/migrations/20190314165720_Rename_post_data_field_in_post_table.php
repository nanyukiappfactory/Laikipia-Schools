<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Rename_post_data_field__in_post_table extends CI_Migration
{
    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }
    public function up()
    {

        $fields = array(
            'post_date' => array(
                'name' => 'post_date',
            ),
        );
        $this->dbforge->modify_column('post', $fields);
    }

    public function down()
    {
        $fields = array(
            'post_data' => array(
                'name' => 'post_data',
            ),
        );
        $this->dbforge->modify_column('post_date', $fields);
    }
}