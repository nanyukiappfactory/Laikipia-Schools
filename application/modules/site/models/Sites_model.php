<?php
class Sites_model extends CI_Model
{
    public function display_page_title()
    {
        $page = explode("/", uri_string());
        $total = count($page);
        $last = $total - 1;
        $name = $this->sites_model->decode_web_name($page[$last]);

        if (is_numeric($name)) {
            $last = $last - 1;
            $name = $this->sites_model->decode_web_name($page[$last]);
        }
        if (empty($name)) {
            $name = "Home";
        }
        $page_url = ucwords(strtolower($name));

        return $page_url;
    }

    public function create_web_name($field_name)
    {
        $web_name = str_replace(" ", "-", $field_name);

        return $web_name;
    }

    public function decode_web_name($web_name)
    {
        $field_name = str_replace("-", " ", $web_name);

        return $field_name;
    }

    public function get_about_posts()
    {
        $this->db->select('post.*, category.category_id, category.category_name');
        $this->db->from('post');
        $this->db->join('category', 'post.category_id=category.category_id', 'left');
        return $this->db->get();
    }
    public function get_donors()
    {
        $this->db->select('post.*, category.category_id, category.category_name');
        $this->db->from('post');
        $this->db->join('category', 'post.category_id=category.category_id', 'left');
        return $this->db->get();

    }
    public function get_partners()
    {
        $this->db->select('post.*, category.category_id, category.category_name');
        $this->db->from('post');
        $this->db->join('category', 'post.category_id=category.category_id', 'left');
        return $this->db->get();
    }
    public function get_schools($boys_pack_amount = 475, $girls_pack_amount = 1125)
    {
        $this->db->select('school.*, ((school.school_boys_number * ' . $boys_pack_amount . ') + (school.school_girls_number * ' . $girls_pack_amount . ')) AS target_amount, SUM(donation.donation_amount) AS total_donated');
        $this->db->from('school');
        $this->db->join('donation', 'school.school_id = donation.school_id', 'left');
        $this->db->where("school_status = 1");
        $this->db->limit(5);
        $this->db->group_by('school.school_id');
        $this->db->order_by('donation.created_on', 'DESC');
        return $this->db->get();
    }
    //get all schools no limit
    public function get_all_schools($boys_pack_amount = 475, $girls_pack_amount = 1125)
    {
        $this->db->select('school.*, ((school.school_boys_number * '.$boys_pack_amount.') + (school.school_girls_number * '.$girls_pack_amount.')) AS target_amount, SUM(donation.donation_amount) AS total_donated');
        $this->db->from('school');
        $this->db->join('donation', 'school.school_id = donation.school_id', 'left');
        $this->db->where("school_status = 1");
        // $this->db->limit(5);
        $this->db->group_by('school.school_id');
        $this->db->order_by('donation.created_on', 'DESC');
        return $this->db->get();
    }

    public function get_donation_totals($boys_pack_amount = 475, $girls_pack_amount = 1125)
    {
        $this->db->select('SUM((school.school_boys_number * ' . $boys_pack_amount . ') + (school.school_girls_number * ' . $girls_pack_amount . ')) AS total_target_amount, SUM(donation.donation_amount) AS total_donated_amount');
        $this->db->from('school');
        $this->db->join('donation', 'school.school_id = donation.school_id', 'left');
        $this->db->where("school_status = 1");
        return $this->db->get();
    }

    public function get_dignity_packs()
    {
        $this->db->select('post.*, category.category_id, category.category_name');
        $this->db->from('post');
        $this->db->join('category', 'post.category_id=category.category_id', 'left');
        return $this->db->get();

    }
    public function get_donations()
    {
        // var_dump($table);die();
        $select = "donation.*, school.*, category.category_id, post.post_id, post.post_title";
        $this->db->select($select);
        $this->db->from('donation');
        $this->db->join('post', 'donation.post_id=post.post_id', 'left');
        $this->db->join('school', 'donation.school_id=school.school_id', 'left');
        $this->db->join('category', 'post.category_id=category.category_id', 'left');
        $query = $this->db->get();
        // echo json_encode(($query)->result());die();

        return $query;

    }

    public function get_new_items()
    {
        $this->db->select('post.*, category.category_id, category.category_name');
        $this->db->from('post');
        $this->db->join('category', 'post.category_id=category.category_id', 'left');
        $this->db->limit('5');
        $this->db->order_by('post_date', 'ASC');
        return $this->db->get();

    }
    public function get_gallery_pictures()
    {
        $this->db->select('post.*, category.category_id, category.category_name');
        $this->db->from('post');
        $this->db->join('category', 'post.category_id=category.category_id', 'left');
        return $this->db->get();

    }
}