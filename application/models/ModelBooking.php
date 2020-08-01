<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBooking extends CI_Model
{
    public function input_data($data)
    {
        $this->db->insert('booking', $data);
    }

    public function delete_data($id)
    {
        $this->db->delete('booking', array('id_user' => $id));
    }

    public function delete_data_by_kode($kode)
    {
        $this->db->delete('booking', array('kd_booking' => $kode));
    }

    public function update_data($kode, $data)
    {
        $this->db->where('kd_booking', $kode);
        $this->db->update('booking', $data);
    }


    public function update_data_by_user($id, $data)
    {
        $this->db->where('id_user', $id);
        $this->db->update('booking', $data);
    }

    public function getDataBookingById($id)
    {
        return $this->db->query("SELECT * FROM booking bo, lapangan la, invoice inv 
        WHERE bo.kd_lapangan = la.kd_lapangan 
        AND bo.kd_invoice = inv.kd_invoice AND bo.id_user = '$id'")->row_array();
    }

    public function getMax($table, $field)
    {
        $this->db->select_max($field);
        return $this->db->get($table)->row_array()[$field];
    }

    public function getMaxByKode()
    {
        $this->db->select_max('kd_booking');
        $this->db->order_by('kd_booking', 'desc');
        return $this->db->get('booking');
    }

    public function getAllBooking()
    {
        return $this->db->query("SELECT * FROM booking bo, lapangan la, invoice inv 
        WHERE bo.kd_lapangan = la.kd_lapangan 
        AND bo.kd_invoice = inv.kd_invoice")->result_array();
    }

    public function getJadwalLapangan($kode)
    {
        return $this->db->query("SELECT * FROM booking bo, lapangan la WHERE bo.kd_lapangan = la.kd_lapangan AND bo.kd_lapangan = '$kode' ORDER BY bo.tgl_booking DESC")->result_array();
    }
}
