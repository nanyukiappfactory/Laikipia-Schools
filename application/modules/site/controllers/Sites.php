<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sites extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("sites_model");

    }
    public function index()
    {
        $v_data['abouts'] = $this->sites_model->get_about_posts();
        $v_data['get_donors'] = $this->sites_model->get_donations();
        $v_data['get_partners'] = $this->sites_model->get_donations();
        $v_data['get_dignity_packs'] = $this->sites_model->get_donations();
        $v_data['donations'] = $this->sites_model->get_donations();
        $v_data['news_items'] = $this->sites_model->get_new_items();
        $v_data['pictures'] = $this->sites_model->get_gallery_pictures();
       
        // echo json_encode(($v_data['schools'])->result());die();
        // $this->load->view('site/home', $v_data);
        $sv_data['donations'] = $this->sites_model->get_donations();
        $data['content'] = $this->load->view('site/schools', $sv_data, true);
        $this->load->view("site/layouts/layout", $data);




    }
}