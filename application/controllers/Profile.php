<?php 

class Profile extends CI_CONTROLLER{
    public function __construct()
    {
        parent::__construct();

        $this->load->library("session");
        $this->load->helper("form");
        $this->load->library("session");
        $this->load->model("profile_model");
        $this->load->model("login_model");
    }

    public function profile_settings()
    {
        $username = $this->session->userdata("username");
        
        $this->profile_model->profile_settings();
        
        $result = $this->login_model->get_user_data($username);

        $user_data = [
            "first_name" => $result[0]->first_name,
            "last_name" => $result[0]->last_name
        ];

        $this->session->unset_userdata("first_name", "last_name");

        $this->session->set_userdata($user_data);
        
        redirect("profile");
    }

    public function upload_image()
        {
            $config["allowed_types"] = "jpg|png|jpeg|gif";
            $config["upload_path"] = "./assets/images/";

            $this->load->library("upload", $config);

            if($this->upload->do_upload("profile_picture"))
            {
                $username = $this->session->userdata("username");
                $this->session->unset_userdata("image_name");
                $this->profile_model->upload_image();
                
                $result = $this->login_model->get_user_data($username);

                $user_data = [
                    "image_name" => $result[0]->image_name
                ];
                $this->session->set_userdata($user_data);
                redirect("profile");
            }
            else
            {
                $this->session->set_flashdata("image_fail", "Image error, please try a different image");
                $error = array('error' => $this->upload->display_errors());
                $this->load->view("pages/profile", $error);
            }
                
        }
}