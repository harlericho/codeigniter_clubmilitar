<?php

class Login_model extends CI_Model
{

    //Aqui va las sentencias SQL
    public function get_entries()
    {
        $query = $this->db->get('usuario');
        if (count($query->result()) > 0) {
            return $query->result();
        }
    }
    public function get_entry_login($data)
    {
        $sql = "SELECT * FROM usuario WHERE email_usu = '" . $data['email_usu'] . "' AND pass_usu='" . $data['pass_usu'] . "'";
        $query = $this->db->query($sql);
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
}
