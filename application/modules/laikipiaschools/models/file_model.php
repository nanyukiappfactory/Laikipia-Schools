<?php
class File_model extends CI_Model
{
    public function upload_image($upload_path, $field_name, $resize)
    {
        $config = array(
            "allowed_types" => "JPEG|JPG|jpeg|jpg|png|PNG",
            "upload_path" => $upload_path,
            "quality" => "100%",
            "max_size" => "0",
            "min_width" => "100",
            "min_height" => "100",
            "file_name" => md5(date("Y-m-d H:i:s")),
            "overwrite" => true,
        );

        $response = [];
        $this->load->library("upload", $config);

        // var_dump($this->input->post($field_name));die();

        if (!$this->upload->do_upload($field_name)) {
            $response["check"] = false;
            $response["message"] = $this->upload->display_errors();
        } else {
            $image_upload_data = $this->upload->data();
            $file_name = $image_upload_data["file_name"];
            $file_path = $image_upload_data["file_path"];

//Resize uploaded image
            $resize_upload = $this->resize_image($image_upload_data["full_path"], $resize);
            if ($resize_upload == true) {
//create thumbnail
                //Thumbnail size
                $resize_thumb = array(
                    "width" => 100,
                    "height" => 100,
                );
                //   Thumbnail properties
                $thumb_name = "thumbnail_" . $file_name;
                $thumb_array = array("thumb_path" => $file_path . "thumbnail_" . $file_name);

                $create_thumb = $this->resize_image($image_upload_data["full_path"], $resize_thumb, $thumb_array);
                if ($create_thumb == true) {
                    $response["check"] = true;
                    $response["file_name"] = $file_name;
                    $response["thumb_name"] = $thumb_name;
                } else {
                    $response["check"] = false;
                    $response["message"] = $create_thumb;
                }
            } else {
                $response["check"] = false;
                $response["message"] = $resize_upload;
            }
        }

        return $response;
    }

    public function insert_image($upload_data)
    {
        $filePath = $upload_data['file_name'];
        //print_r(LARGEPATH);
        $query = "UPDATE `school_images` set school_image_name='" . $filePath . "'";
        // $this->db->query($query,array($img));
        $arg = array($upload_data);
        if ($this->db->query($query, $arg) == true) {
            return true; // if added to database
        } else {
            return false;
        }
    }

    public function resize_image($source_image, $resize, $thumbnail = false)
    {
        $resize_config = array(
            "source_image" => $source_image,
            "width" => $resize["width"],
            "height" => $resize["height"],
            "master_dim" => "width",
            "maintain_ratio" => true,
        );
        if ($thumbnail != false) {
            $resize_config["new_image"] = $thumbnail["thumb_path"];
            $resize_config["create_thumb"] = false;

        }
        $this->image_lib->initialize($resize_config);

        if (!$this->image_lib->resize()) {
            return $this->image_lib->display_errors();
        } else {
            return true;
        }
    }
    public function upload_multi()
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