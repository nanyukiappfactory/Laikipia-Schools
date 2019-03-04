<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Files extends CI_Model
{
    public function getRows($id = '')
    {
        $this->db->select('school_image_id,school_image,created_on');
        $this->db->from('school_images');
        if ($id) {
            $this->db->where('school_image_id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $this->db->order_by('created_on', 'desc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result) ? $result : false;
    }
    public function insert($data = array())
    {
        $insert = $this->db->insert_batch('school_images', $data);
        return $insert ? true : false;
    }
}
