<?php
class Sites_model extends CI_Model
{
	public function display_page_title()
	{
		$page = explode("/",uri_string());
		$total = count($page);
		$last = $total - 1;
		$name = $this->sites_model->decode_web_name($page[$last]);
		
		if(is_numeric($name))
		{
			$last = $last - 1;
			$name = $this->sites_model->decode_web_name($page[$last]);
        }
        if(empty($name))
        {
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
    public function get_schools()
    {
        $this->db->select('*');
        $this->db->from('school');
        $this->db->group_by('school_name', 'ASC');
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
        $this->db->limit('0,3');
        $this->db->order_by('post_date', 'ASC');
        return $this->db->get();
 
    }
}