<?php

class Consumo_model extends CI_Model
{

    //Aqui va las sentencias SQL
   
    public function get_socios_entries()
    {
        $query = $this->db->get('socio');
        if (count($query->result()) > 0) {
            return $query->result();
        }
    }


    public function insert_entry($data)
    {

        return $this->db->insert('factura', $data);
    }


    public function delete_entry($id)
    {
        return $this->db->delete('factura', array('id_factura' => $id));
    }
    public function fondo_update_socio_entry($id, $valorc)
    {
        $sql = "SELECT fondos_socio FROM socio WHERE id_socio=$id ";
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $valor = $row['fondos_socio'];
        }
        $res = $valor - $valorc;
        $this->db->where('id_socio', $id);
        $this->db->set('fondos_socio', $res);
        return $this->db->update('socio');
    }

    public function get_fondo_socio_entry($id)
    {
        $sql = "SELECT * FROM socio WHERE id_socio=$id ";
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $valor= $row['fondos_socio'];
        }
        return $valor;
    }
}
