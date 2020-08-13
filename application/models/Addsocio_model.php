<?php

class Addsocio_model extends CI_Model
{

    //Aqui va las sentencias SQL
    public function get_entries()
    {
        $query = $this->db->get('socio');
        if (count($query->result()) > 0) {
            return $query->result();
        }
    }

    public function insert_entry($data)
    {

        return $this->db->insert('socio', $data);
    }

    public function update_entry($data)
    {
        return $this->db->update('socio', $data, array('id_socio' => $data['id_socio']));
    }

    public function delete_entry($id)
    {
        return $this->db->delete('socio', array('id_socio' => $id));
    }

    public function single_entry($id)
    {
        $this->db->select("*");
        $this->db->from("socio");
        $this->db->where("id_socio", $id);
        $query = $this->db->get();
        if (count($query->result()) > 0) {
            return $query->row();
        }
    }

    public function dni_rows_entry($data)
    {
        $sql = "SELECT * FROM socio WHERE cedula_socio = '" . $data . "'";
        $query = $this->db->query($sql);
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function count_rows_entry()
    {
        $sql = "SELECT COUNT(*)as num FROM socio WHERE tipo_socio = 'VIP'";
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            return $row['num'];
        }
    }

    public function count_rows_entry_vip($id)
    {
        $sql = "SELECT COUNT(*)as num FROM socio WHERE tipo_socio = 'VIP' AND id_socio=$id ";
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            return $row['num'];
        }
    }
}
