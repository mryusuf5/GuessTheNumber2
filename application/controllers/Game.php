<?php 

class Game extends CI_CONTROLLER{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper("form");

        $this->load->library("form_validation");

        $this->load->library("session");

        $this->load->model("Game_model");
    }

    public function create_game()
    {
        $this->form_validation->set_rules('number1','number1', "required");
        $this->form_validation->set_rules('number2','number2', "required");

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view("templates/logged_in/header");
            $this->load->view("pages/game");
        }
        else
        {
            $data = ["message" => "You have successfully generated a random number!"];
            $this->load->view("templates/logged_in/header");
            $this->load->view("pages/gameplay", $data);
            $this->Game_model->create_game();
        }
    }

    public function check_number()
    {
        $result = $this->Game_model->get_random_num();

        $number = $this->input->post("guessed_number");

        if($number == $result[0]->random_num)
        {
            $score = $this->session->userdata("tries") * 5;
            $sessiondata = [
                "score" => $score
            ];
            $this->session->set_userdata($sessiondata);
            $this->Game_model->put_score();
            redirect("leaderboard");
        }
        else if($number != $result[0]->random_num)
        {
            
            $tries = 10;
            $tries--;
            $freezing = $result[0]->random_num + 100;
            $freezing2 = $result[0]->random_num - 100;
            $colder = $result[0]->random_num + 75;
            $colder2 = $result[0]->random_num - 75;
            $warmer = $result[0]->random_num + 30;
            $warmer2 = $result[0]->random_num - 30;
            $burning = $result[0]->random_num + 10;
            $burning2 = $result[0]->random_num - 10;
            $close = $result[0]->random_num;
            $close2 = $result[0]->random_num;
            $data = ["tries" => $tries];

            if($number > $freezing || $number < $freezing2)
            {
                $data = ["freezing" => "you are FREEZING!"];
            }
            else if($number > $colder || $number < $colder2)
            {
                $data = ["colder" => "you are getting colder!"];
            }
            else if($number > $warmer || $number < $warmer2)
            {
                $data = ["warmer" => "you are getting warmer!"];
            }
            else if($number > $burning || $number < $burning2)
            {
                $data = ["burning" => "you are BURNING!"];
            }
            else if($number > $close || $number < $close2)
            {
                $data = ["close" => "you are so close!"];
            }

            $this->load->view("templates/logged_in/header.php");
            $this->load->view("pages/gameplay", $data);
            $this->load->view("templates/footer.php");
        }
    }
}