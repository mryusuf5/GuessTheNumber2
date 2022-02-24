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
            $data = [
                "message" => "You have successfully generated a random number!",
                "tries_error" => "Pick a different number of tries!"
            ];

            if($this->input->post("tries") <= 15 && $this->input->post("tries") > 0)
            {
                $userdata = [
                    "tries" => $this->input->post("tries")
                ];

                $this->session->set_userdata($userdata);
                $this->load->view("templates/logged_in/header");
                $this->load->view("pages/gameplay", $data);
                $this->Game_model->create_game();
            }
            else
            {
                $this->load->view("templates/logged_in/header");
                $this->load->view("pages/game", $data);
                $this->Game_model->create_game();
            }
        }
    }

    public function check_number()
    {
        $result = $this->Game_model->get_random_num();

        $number = $this->input->post("guessed_number");

        if($number == $result[0]->random_num)
        {
            // $scores["scores"] = $this->Game_model->get_scores();

            $single_score = $this->Game_model->get_single_score();
            
            if($single_score[0]->highest_score < $this->session->userdata("tries") * 5)
            {
                $userdata = [
                    "score" => $this->session->userdata("tries") * 5
                ];
                $this->session->set_userdata($userdata);
                $this->Game_model->put_scores();
            }
            $data = [
                "win" => "Congratulations, you guessed the right number!",
                "scores" => $this->Game_model->get_scores()
            ];
            $this->load->view("templates/logged_in/header.php");
            $this->load->view("pages/leaderboard", $data);
            $this->load->view("templates/footer.php");
        }
        else if($number != $result[0]->random_num)
        {
            $freezing = $result[0]->random_num + 20;
            $freezing2 = $result[0]->random_num - 20;
            $colder = $result[0]->random_num + 10;
            $colder2 = $result[0]->random_num - 10;
            $warmer = $result[0]->random_num + 5;
            $warmer2 = $result[0]->random_num - 5;
            $burning = $result[0]->random_num + 2;
            $burning2 = $result[0]->random_num - 2;
            $close = $result[0]->random_num;
            $close2 = $result[0]->random_num;

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

            $tries = $this->session->userdata("tries");

            $tries--;

            $userdata = [
                "tries" => $tries
            ];

            $this->session->set_userdata($userdata);

            if($tries != 0)
            {
                $this->load->view("templates/logged_in/header.php");
                $this->load->view("pages/gameplay", $data);
                $this->load->view("templates/footer.php");
            }
            else if($tries <= 0)
            {
                $data = [
                    "lose_message" => "Sadly enough you failed, try again!"
                ];
                $this->load->view("templates/logged_in/header.php");
                $this->load->view("pages/game", $data);
                $this->load->view("templates/footer.php");
            }

        }
    }
}