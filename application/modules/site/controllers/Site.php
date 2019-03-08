<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site extends MX_Controller
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
        $v_data['get_dignity_packs'] = $this->sites_model->get_donations();
        $v_data['donations'] = $this->sites_model->get_donations();
        $v_data['news_items'] = $this->sites_model->get_new_items();
        $v_data['pictures'] = $this->sites_model->get_gallery_pictures();

        // echo json_encode(($v_data['pictures'])->result());die();
        // $this->load->view('site/home', $v_data);
        $v_data['schools'] = $this->sites_model->get_schools();
        // $v_data['partners'] = $this->sites_model->get_partners();

        $data['content'] = $this->load->view('site/schools', $v_data, true);
        $data['content2'] = $this->load->view('site/partners', $v_data, true);

        $this->load->view("site/layouts/layout", $data);

    }
}
