<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require_once "./application/modules/admin/controllers/Admin.php";

class Donations extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("donations_model");
        $this->load->model("site_model");
        // $this->load->model("payments_model");
    }

    /*
     *
     *    Default action is to show all the donations
     *
     */
    // public function index($donation_id = null, $order = null, $order_method = null)
    public function index($order = 'donation.donation_amount', $order_method = 'ASC')
    {
        // $order = 'donation.donation_amount';
        // $order_method = 'DESC';
        $this->form_validation->set_rules('donation_amount', 'Donation Amount', 'required|numeric');
        $this->form_validation->set_rules('post_id', 'Post', 'required|numeric');
        $this->form_validation->set_rules('school_id', 'School', 'required|numeric');

        if ($this->form_validation->run()) {
            $donation_id = $this->donations_model->create_donation();
            if ($donation_id) {
                $this->session->set_flashdata('success', 'Donation ID: ' . $donation_id . ' Created successfully');
                redirect('laikipiaschools/donations');
            } else {
                $this->session->set_flashdata('error', 'Unable to Create: ' . $donation_id);
                redirect('laikipiaschools/donations');
            }
        } else {
            $where = 'donation.deleted=0';
            // $where = 'donation.deleted=0 AND donation.school_id = school.school_id AND donation.category_id = post.category_id';
            $table = 'donation, school, post';
            // $table = 'donation, school, post';
            $donations_search = $this->session->userdata('donations_search');
            $search_title = $this->session->userdata('donations_search_title');

            if (!empty($donations_search) && $donations_search != null) {
                $where .= $donations_search;
            }

            //pagination
            $segment = 5;
            $this->load->library('pagination');
            $config['base_url'] = site_url() . 'donations/' . $order . '/' . $order_method;
            $config['total_rows'] = $this->site_model->count_items($table, $where);
            $config['uri_segment'] = $segment;
            $config['per_page'] = 20;
            $config['num_links'] = 5;

            $config['full_tag_open'] = '<div class="pagging text-center"><nav aria-label="Page navigation example"><ul class="pagination">';
            $config['full_tag_close'] = '</ul></nav></div>';
            $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close'] = '</span></li>';
            $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close'] = '</span></li>';
            $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close'] = '</span></li>';
            $this->pagination->initialize($config);

            $page = ($this->uri->segment($segment)) ? $this->uri->segment($segment) : 0;
            $v_data["links"] = $this->pagination->create_links();
            $query = $this->donations_model->get_all_donations($table, $where, $config["per_page"], $page, $order, $order_method);

            //change of order method
            if ($order_method == 'DESC') {
                $order_method = 'ASC';
            } else {
                $order_method = 'DESC';
            }

            $data['title'] = 'donations';

            if (!empty($search_title) && $search_title != null) {
                $data['title'] = 'donations filtered by ' . $search_title;
            }
            $v_data['title'] = $data['title'];

            $v_data['order'] = $order;
            $v_data['order_method'] = $order_method;
            $v_data['query'] = $query;
            $v_data['schools'] = $this->donations_model->all_schools();
            $v_data['page'] = $page;
            $v_data['categories'] = $this->site_model->get_all_categories();
            // $v_data['cats'] = $this->site_model->get_categories();

            // echo json_encode($v_data['categories']->result());die();
            //var_dump($v_data['categories']->result());die();
            $v_data['partners'] = $this->donations_model->all_partners();

            $data['content'] = $this->load->view('donations/all_donations', $v_data, true);

            $this->load->view("laikipiaschools/layouts/layout", $data);
        }

    }

    public function close_search()
    {
        $this->session->unset_userdata('donations_search');
        $this->session->unset_userdata('donations_search_title');
        $this->session->set_userdata("success_message", "Search has been closed");
        redirect("administration/donations");
    }

    public function export_donations()
    {
        $order = 'donation.donation_id';
        $order_method = 'DESC';
        $where = 'donation_id > 0';
        $table = 'donation';
        $donations_search = $this->session->userdata('donations_search');
        $search_title = $this->session->userdata('donations_search_title');

        if (!empty($donations_search) && $donations_search != null) {
            $where .= $donations_search;
        }
        $title = 'Donations';

        if (!empty($search_title) && $search_title != null) {
            $title = 'Donations filtered by ' . $search_title;
        }

        if ($this->site_model->export_results($table, $where, $order, $order_method, $title)) {
        } else {
            $this->session->set_userdata('error_message', "Unable to export results");
        }

    }
    public function deactivate_donation($donation_id, $status_id)
    {
        if ($status_id == 1) {
            $new_donation_status = 0;
            $message = 'Deactivated';
        } else {
            $new_donation_status = 1;
            $message = 'Activated';
        }

        $result = $this->donations_model->change_donation_status($donation_id, $new_donation_status);
        if ($result == true) {
            $this->session->set_flashdata('success', "donation ID: " . $donation_id . " " . $message . " successfully!");
        } else {
            $this->session->set_flashdata('error', "donation ID: " . $donation_id . " failed to " . $message);
        }

        redirect('administration/donations');

    }
    
    //edit gi
    public function edit_donation($donation_id)
    {
        $this->form_validation->set_rules('donation_amount', 'DonationAmount', 'required|numeric');
       // $this->form_validation->set_rules('post_id', 'Post', 'required|numeric');
        $this->form_validation->set_rules('school_id', 'School', 'required|numeric');

        if ($this->form_validation->run()) 
        {
            $update_status = $this->donations_model->update_donation($donation_id);
            if ($update_status) {
                redirect("administration/donations");
            }
        } 
        else 
        {
            if(validation_errors())
            {
                $this->session->set_flashdata("error", validation_errors());
                redirect("administration/edit-donation/".$donation_id);
            }

            $query = $this->donations_model->get_single_donation($donation_id);
                   // echo json_encode($query->result());die();

            if ($query->num_rows() > 0) {
                $row = $query->row();
                //var_dump($row);die();
                $donation_amount = $row->donation_amount;
                // var_dump($DonationAmount);die();
                $school = $row->school_id;
                $post = $row->post_id;
                $v_data["query"] = $query;
                $v_data["donation_amount"] = $donation_amount;
                $v_data["school_id"] = $school;
                $v_data['categories'] = $this->site_model->get_all_categories();
                $v_data['schools'] = $this->donations_model->all_schools();
                //var_dump($v_data["school_id"]);die();
                $v_data["post_id"] = $post;
                //var_dump($v_data["post_id"]);die();

                $data = array("title" => $this->site_model->display_page_title(),
                    "content" => $this->load->view("donations/edit_donation", $v_data, true));
                    
                //var_dump($v_data["school_id"]);die();
                $this->load->view("laikipiaschools/layouts/layout", $data);

            } else {
                $this->session->set_flashdata("error", "couldnt");
                redirect("administration/donations");
            }

        }

    }
    





    public function single_donation($donation_id)
    {
        $v_data['query'] = $this->donations_model->get_single_donation($donation_id);
        $v_data['title'] = "View";
        $query = $this->donations_model->get_single_donation($donation_id);

        $data['content'] = $this->load->view('donations/single_donation', $v_data, true);

        $this->load->view("laikipiaschools/layouts/layout", $data);
    }

    public function delete_donation($donation_id)
    {
        if ($this->donations_model->delete_donation($donation_id)) {
            $this->session->set_flashdata('success', 'Deleted successfully');
            redirect('laikipiaschools/donations');
        } else {
            $this->session->set_flashdata('error', 'Unable to delete, Try again!!');
            redirect('laikipiaschools/donations');
        }
    }

}
