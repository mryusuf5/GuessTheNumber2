<?php

class Profile_model extends CI_MODEL{
    public function profile_settings()
    {
        $username = $this->session->userdata("username");

        $first_name = $this->input->post("first_name");
        $last_name = $this->input->post("last_name");

        $this->db->query("UPDATE users SET first_name = '$first_name' WHERE username = '$username'");
        $this->db->query("UPDATE users SET last_name = '$last_name' WHERE username = '$username'");
    }

    public function upload_image()
    {
        $username = $this->session->userdata("username");

        $file_name = $this->upload->data("file_name");

        $this->db->query("UPDATE users SET image_name = '$file_name' WHERE username = '$username'");
    }
}