<?php

class Game_model extends CI_MODEL{
    public function create_game()
    {
        $number1 = $this->input->post("number1");
        $number2 = $this->input->post("number2");
        $random_num = rand($number1, $number2);

        $user_id = $this->session->userdata("user_id");

        $this->db->where("user_id", $this->session->userdata("user_id"));
        $query = $this->db->get("game_numbers");

        if($query->num_rows() > 0)
        {
            $this->db->query("UPDATE game_numbers SET number1 = $number1, number2 = $number2, random_num = $random_num WHERE user_id = $user_id");
        }
        else
        {
            $this->db->query("INSERT INTO game_numbers(number1, number2, user_id, random_num) VALUES($number1, $number2, $user_id, $random_num)");
        }
    }

    public function get_random_num()
    {
        $this->db->select("random_num");
        $this->db->where("user_id", $this->session->userdata("user_id"));
        $query = $this->db->get("game_numbers");

        return $query->result();
    }

    public function get_score()
    {
        $data["highest_score"] = $this->session->userdata("score");
        $this->db->insert("users", $data);
    }
}