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

    // public function get_all_categories()
    // {
    //     $this->db->select('category.*, post.post_id, post.post_title');
    //     $this->db->from('category');
    //     $this->db->join('post', 'post.category_id=category.category_id', 'left');
    //     $this->db->group_by('category.category_id');
    //     return $this->db->get();
    // }

    public function get_categories()
    {

        $this->db->select('category.category_id,category.category_name, post.post_id, post.post_title');
         $this->db->distinct('category.category_id');
        $this->db->from('category');
        $this->db->join('post', 'post.category_id=category.category_id', 'left');
        $this->db->order_by('post_title', 'ASC');
        return $this->db->get();
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
