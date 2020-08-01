<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelInvoice extends CI_Model
{

    public function input_data($data)
    {
        $this->db->insert('invoice', $data);
    }

    public function delete_data($id)
    {
        $this->db->delete('invoice', array('id_user' => $id));
    }

    public function update_data($id, $data)
    {
        $this->db->where('id_user', $id);
        $this->db->update('invoice', $data);
    }

    public function update_data_invoice($kode, $data)
    {
        $this->db->where('kd_invoice', $kode);
        $this->db->update('invoice', $data);
    }

    public  function getInvoiceByKode($kode)
    {
        return $this->db->query("SELECT * FROM invoice inv, users us, bank ba 
        WHERE inv.id_user = us.id_user
        AND inv.id_bank = ba.id_bank AND inv.kd_invoice = '$kode'")->row_array();
    }

    public function getMaxByInvoice()
    {
        $this->db->select_max('kd_invoice');
        return $this->db->get('invoice');
    }

    public function getDataInvoiceById($id)
    {
        return $this->db->query("SELECT * FROM invoice inv, users us, bank ba 
        WHERE inv.id_user = us.id_user
        AND inv.id_bank = ba.id_bank AND inv.id_user = '$id'")->row_array();
    }

    public function getAllInvoice()
    {
        return $this->db->query("SELECT * FROM invoice inv, users us, bank ba 
        WHERE inv.id_user = us.id_user
        AND inv.id_bank = ba.id_bank")->result_array();
    }


    public function downloadInvoice($kode)
    {
        return $this->db->get_where('invoice', array('kd_invoice' => $kode))->row_array();
    }
}
