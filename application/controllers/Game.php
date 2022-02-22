<!-- <?php 

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
            // $this->load->view("templates/logged_in/header");
            // $this->load->view("pages/gameplay");
            $this->Game_model->create_game();
            redirect("gameplay");
               

        }
    }

    public function check_number()
    {
        $this->load->model("Game_model");

        $result = $this->Game_model->get_random_num($this->session->userdata("user_id"));

        $number = $this->input->post("guessed_number");

        if($number == $result[0]->random_num)
        {
            redirect("leaderboard");
        }
        else if($number != $result[0]->random_num)
        {
            $data = [
                "colder" => "you are getting colder!",
                "freezing" => "you are FREEZING!",
                "warmer" => "you are getting warmer!",
                "burning" => "you are BURNING!",
            ];

            $this->load->view("templates/logged_in/header.php");
            $this->load->view("pages/gameplay", $data);
            $this->load->view("templates/footer.php");
        }
    }
}