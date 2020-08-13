<?php

class Registro_model extends CI_Model
{

    //Aqui va las sentencias SQL
    public function get_entries()
    {
        $query = $this->db->get('usuario');
        if (count($query->result()) > 0) {
            return $query->result();
        }
    }

    public function insert_entry($data)
    {

        return $this->db->insert('usuario', $data);
    }
}
