<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBookingHistori extends CI_Model
{
    public function insert_data($data)
    {
        $this->db->insert('booking_histori', $data);
    }

    public function getAllData($per_halaman, $uri)
    {
        return $this->db->query("SELECT * FROM booking_histori his, users us, lapangan lap 
        WHERE his.id_user = us.id_user
        AND his.kd_lapangan = lap.kd_lapangan ORDER BY tgl_booking DESC LIMIT $per_halaman, $uri")->result_array();
    }

    public function getDataById($per_halaman, $uri)
    {
        $id = $this->session->userdata('id_user');
        return $this->db->query("SELECT * FROM booking_histori his, users us, lapangan lap
        WHERE his.id_user = us.id_user
        AND his.kd_lapangan = lap.kd_lapangan AND his.id_user = $id LIMIT $per_halaman,$uri")->result_array();
    }

    public function countAllHistori()
    {
        return $this->db->get('booking_histori')->num_rows();
    }

    public function countAllHistoriById()
    {
        $id = $this->session->userdata('id_user');
        return $this->db->get_where('booking_histori', ['id_user' => $id])->num_rows();
    }
}
