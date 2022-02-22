<?php 

class Register extends CI_CONTROLLER{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper("form");

        $this->load->library("form_validation");

        $this->load->library("session");

        $this->load->model("Register_model");
    }

    public function register_user()
    {
        $this->form_validation->set_rules('username','Username','required|is_unique[users.username]');
        $this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view("templates/header");
            $this->load->view("pages/register");
        }
        else
        {
            $this->session->set_flashdata("register_success", "You have succesfully registered!");
            
            $this->load->view("templates/header");
            $this->load->view("pages/login");
            
            $this->Register_model->register();
        }
    }
}