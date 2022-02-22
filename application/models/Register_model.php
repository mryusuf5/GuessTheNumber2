<?php 

class Register_model extends CI_MODEL{

    public function register()
    {
        $data["username"] = $this->input->post("username");
        $data["password"] = md5($this->input->post("password"));
        $this->db->insert("users", $data);
    }
}