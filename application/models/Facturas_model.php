<?php

class Facturas_model extends CI_Model
{

    //Aqui va las sentencias SQL
    public function get_entries()
    {
        $this->db->select('id_factura,concepto_factura,fec_factura,valor,nombres_socio,tipo_socio,fondos_socio');
        $this->db->from('factura');
        $this->db->join('socio', 'socio.id_socio=factura.id_socio');
        $query = $this->db->get();
        if (count($query->result()) > 0) {
            return $query->result();
        }
    }




    public function delete_entry($id)
    {
        return $this->db->delete('factura', array('id_factura' => $id));
    }
}
