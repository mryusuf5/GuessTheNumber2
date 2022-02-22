<?php 

class Login_model extends CI_MODEL{
    public function can_login($username, $password)
    {
        $this->db->select("*");
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        $query = $this->db->get("users");

        if($query->num_rows() > 0)
            return true ?? false;
    }

    public function get_user_data($username)
    {
        $this->db->select("*");
        $this->db->where("username", $username);
        $query = $this->db->get("users");

        $result = $query->result();

        return $result;
    }
}