<?php

class Login extends CI_CONTROLLER{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper("form");

        $this->load->library("form_validation");

        $this->load->library("session");

    }
    
    public function login_user()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $this->form_validation->set_rules("username", "Username", "required");
        $this->form_validation->set_rules("password", "Password", "required");

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view("templates/header");
            $this->load->view("pages/login");
        }
        else
        {
            $this->load->model("Login_model");
            if($this->Login_model->can_login($username, md5($password)))
            {
                $session_data = [
                    "username" => $username
                ];
                $this->session->set_userdata($session_data);
                $result =  $this->Login_model->get_user_data($username);
                $user_data = [
                    "first_name" => $result[0]->first_name ?? null,
                    "last_name" => $result[0]->last_name ?? null,
                    "image_name" => $result[0]->image_name ?? null,
                    "user_id" => $result[0]->id ?? null
                ];
                $this->session->set_userdata($user_data);
                redirect("home");
            }
            else
            {
                $this->session->set_flashdata("login_fail", "Couldn't find the username");
                $this->load->view("templates/header");
                $this->load->view("pages/login");
            }
        }
        
    }
    
    public function Logout()
    {
        $this->session->sess_destroy();
        redirect("home");
    }
}