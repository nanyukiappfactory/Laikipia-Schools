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
        //echo json_encode($v_data['abouts']->result());die();
        $v_data['get_donors'] = $this->sites_model->get_donations();
        $v_data['get_dignity_packs'] = $this->sites_model->get_donations();
        $donations = $this->sites_model->get_donation_totals();
        $v_data['news_items'] = $this->sites_model->get_new_items();
        $v_data['pictures'] = $this->sites_model->get_gallery_pictures();
        $v_data['schools'] = $this->sites_model->get_schools();
        $v_data['partners'] = $this->sites_model->get_partners();
        $v_data['allschools'] = $this->sites_model->get_all_schools();
        //echo json_encode($v_data['allschools']->result());die();
        
        $project_donation_total = $project_target_total = $percentage_donated_total = 0;
        if ($donations->num_rows() > 0) {
            foreach ($donations->result() as $row) {
                $project_donation_total = $row->total_donated_amount;
                $project_target_total = $row->total_target_amount;
                $percentage_donated_total = round(($project_donation_total / $project_target_total) * 100);
            }
        }
        $v_data['project_donation_total'] = $project_donation_total;
        $v_data['project_target_total'] = $project_target_total;
        $v_data['percentage_donated_total'] = $percentage_donated_total;
        $data['content'] = $this->load->view('site/home/home', $v_data, true);
        
        $data['title'] = $this->sites_model->display_page_title();

        $this->load->view("site/layouts/layout", $data);

    }
    public function view_other()
    {
        
            $v_data['abouts'] = $this->sites_model->get_about_posts();
            $v_data['get_donors'] = $this->sites_model->get_donations();
            $v_data['get_dignity_packs'] = $this->sites_model->get_donations();
            $donations = $this->sites_model->get_donation_totals();
            $v_data['news_items'] = $this->sites_model->get_new_items();
            $v_data['pictures'] = $this->sites_model->get_gallery_pictures();
            $v_data['schools'] = $this->sites_model->get_schools();
            $v_data['partners'] = $this->sites_model->get_partners();
            $v_data['allschools'] = $this->sites_model->get_all_schools();
            //echo json_encode($v_data['allschools']->result());die();
            
            $project_donation_total = $project_target_total = $percentage_donated_total = 0;
            if ($donations->num_rows() > 0) {
                foreach ($donations->result() as $row) {
                    $project_donation_total = $row->total_donated_amount;
                    $project_target_total = $row->total_target_amount;
                    $percentage_donated_total = round(($project_donation_total / $project_target_total) * 100);
                }
            }
            $v_data['project_donation_total'] = $project_donation_total;
            $v_data['project_target_total'] = $project_target_total;
            $v_data['percentage_donated_total'] = $percentage_donated_total;
            $data['content'] = $this->load->view('site/home/all_schools', $v_data, true);
            $data['title'] = $this->sites_model->display_page_title();
            $this->load->view("site/layouts/layout", $data);
    
        }


        public function read_more($school_id)
        {

                    $v_data['get_donors'] = $this->sites_model->get_donations();
                    $v_data['get_dignity_packs'] = $this->sites_model->get_donations();
                    $donations = $this->sites_model->get_donation_totals();
                    // $v_data['news_items'] = $this->sites_model->get_new_items();
                    $v_data['pictures'] = $this->sites_model->get_gallery_pictures();
                    //$v_data['schools'] = $this->sites_model->get_schools();
                    //$v_data['partners'] = $this->sites_model->get_partners();
                    $v_data['allschools'] = $this->sites_model->get_all_schools();
                    $v_data['school_id'] = $school_id;
                    $v_data['singleschool'] = $this->sites_model->get_single_school($school_id);
                    //echo json_encode($v_data['allschools']->result());die();
                    
                    $project_donation_total = $project_target_total = $percentage_donated_total = 0;
                    if ($donations->num_rows() > 0) {
                        foreach ($donations->result() as $row) {
                            
                            $project_donation_total = $row->total_donated_amount;
                            $project_target_total = $row->total_target_amount;
                            $percentage_donated_total = round(($project_donation_total / $project_target_total) * 100);
                            
                        }
                    }
                    $v_data['project_donation_total'] = $project_donation_total;
                    $v_data['project_target_total'] = $project_target_total;
                    $v_data['percentage_donated_total'] = $percentage_donated_total;
                    $data['content'] = $this->load->view('site/home/school_single', $v_data, true);
                    $data['title'] = $this->sites_model->display_page_title();
                    $this->load->view("site/layouts/layout", $data);
                   
                }
            }
                   
    
        
    
        

        














    

   
