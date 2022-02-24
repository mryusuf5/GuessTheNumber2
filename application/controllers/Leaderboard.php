<?php

class Leaderboard extends CI_CONTROLLER{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper("form");

        $this->load->library("form_validation");

        $this->load->library("session");

        $this->load->model("Game_model");
    }

    public function index()
    {
        $scores["scores"] = $this->Game_model->get_scores();

        $this->load->view("templates/logged_in/header");
        $this->load->view("pages/leaderboard", $scores);
        $this->load->view("templates/footer");
    }
}