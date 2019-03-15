<?php
class Site_model extends CI_Model
{

    public function display_page_title()
    {
        $page = explode("/", uri_string());
        $total = count($page);
        $last = $total - 1;
        $name = $this->site_model->decode_web_name($page[$last]);

        if (is_numeric($name)) {
            $last = $last - 1;
            $name = $this->site_model->decode_web_name($page[$last]);
        }
        $page_url = ucwords(strtolower($name));

        return $page_url;
    }

    public function decode_web_name($web_name)
    {
        // $field_name = str_replace("-", " ", $web_name);
        $field_name = preg_replace('/\s/', '-', $web_name);

        return $field_name;
    }

    public function get_all_categories()
    {
        $this->db->select('category.*, post.post_id, post.post_title');
        $this->db->from('category');
        $this->db->join('post', 'post.category_id=category.category_id', 'left');
         $this->db->where('post.deleted=0 AND post.post_status=1 AND category.deleted=0 AND category.category_status=1');
         //$this->db->where('post.deleted=0 AND post.post_status=1');
         //$this->db->where('category.category_status=1');
        $query =  $this->db->get();
        // echo json_encode($query->result());die();
        return $query;
    }

    public function all_categories()
    {
        $this->db->select('*');
        $this->db->from('category');
       // $this->db->join('post', 'post.category_id=category.category_id', 'left');
        $this->db->where('category.deleted=0 AND category.category_status=1');
         
        $query =  $this->db->get();
        return $query;
    }

    public function count_items($table, $where, $limit = null)
    {
        if ($limit != null) {
            $this->db->limit($limit);
        }
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->count_all_results();
    }

    public function export_results($table, $where, $order, $order_method, $title)
    {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');

        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($order, $order_method);
        $query = $this->db->get();

        $delimiter = ",";
        $newline = "\r\n";
        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
        $res = force_download(date("Y-m-d H:i:s") . $title . '.csv', $data);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

}