<?php defined('BASEPATH') or exit('No direct script access allowed');
class Files_Upload extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('multiple_files');
        $this->upload_path = realpath(APPPATH . '../assets/uploads/files');

//get the location to upload images
        $this->upload_location = base_url() . 'assets/uploads/files';

    }
    public function index()
    {
        $data = array();
        if ($this->input->post('submitForm') && !empty($_FILES['upload_Files']['name'])) {
            $filesCount = count($_FILES['upload_Files']['name']);
            for ($i = 0; $i < $filesCount; $i++) {$_FILES['upload_File']['name'] = $_FILES['upload_Files']['name'][$i];
                $_FILES['upload_File']['type'] = $_FILES['upload_Files']['type'][$i];
                $_FILES['upload_File']['tmp_name'] = $_FILES['upload_Files']['tmp_name'][$i];
                $_FILES['upload_File']['error'] = $_FILES['upload_Files']['error'][$i];
                $_FILES['upload_File']['size'] = $_FILES['upload_Files']['size'][$i];
                $uploadPath = 'assets/uploads/files/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('upload_File')) {
                    $fileData = $this->upload->data();
                    $uploadData[$i]['school_image_name'] = $fileData['school_image_name'];
                    $uploadData[$i]['created_on'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['modified_on'] = date("Y-m-d H:i:s");
                }
            }
            if (!empty($uploadData)) {
                //Insert file information into the database
                $insert = $this->files->insert($uploadData);
                $statusMsg = $insert ? 'Files uploaded successfully.' : 'Some problem occurred, please try again.';
                $this->session->set_flashdata('statusMsg', $statusMsg);
            }
        }
        //Get files data from database
        $data['school_images'] = $this->files->getRows();
        //Pass the files data to view
        $this->load->view('administration_schools', $data);
    }
}
