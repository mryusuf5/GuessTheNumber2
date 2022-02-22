<?php 

    class Pages extends CI_CONTROLLER{
        public function __construct()
        {
            parent::__construct();
            $this->load->library("session");
            $this->load->helper('url');
        }
        public function index($page = "home")
        {
            if(!file_exists(APPPATH . "views/pages/" . $page . ".php"))
            {
                show_404();
            }

            $data["title"] = ucfirst($page);
            
            if($this->session->has_userdata("username"))
                $this->load->view("templates/logged_in/header");
            else
                $this->load->view("templates/header");
                
            $this->load->view("pages/" . $page, $data);
            $this->load->view("templates/footer");
        }   
    }