<?php

class Addautorizado_model extends CI_Model
{

    //Aqui va las sentencias SQL
    public function get_entries()
    {
        $this->db->select('id_autorizada,nombres_autorizada,nombres_socio,tipo_socio');
        $this->db->from('autorizada');
        $this->db->join('socio', 'socio.id_socio=autorizada.id_socio');
        $query = $this->db->get();
        if (count($query->result()) > 0) {
            return $query->result();
        }
    }

    public function get_socios_entries()
    {
        $query = $this->db->get('socio');
        if (count($query->result()) > 0) {
            return $query->result();
        }
    }


    public function insert_entry($data)
    {

        return $this->db->insert('autorizada', $data);
    }

    public function update_entry($data)
    {
        return $this->db->update('autorizada', $data, array('id_autorizada' => $data['id_autorizada']));
    }

    public function delete_entry($id)
    {
        return $this->db->delete('autorizada', array('id_autorizada' => $id));
    }

    public function single_entry($id)
    {
        $this->db->select("*");
        $this->db->from("autorizada");
        $this->db->where("id_autorizada", $id);
        $query = $this->db->get();
        if (count($query->result()) > 0) {
            return $query->row();
        }
    }
}
