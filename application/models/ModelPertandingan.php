<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPertandingan extends CI_Model
{
    public function getAllPertandingan()
    {
        return $this->db->get('pertandingan')->result_array();
    }

    public function tambahData($data)
    {
        $this->db->insert('pertandingan', $data);
    }

    public function getPertandinganById($id)
    {
        return $this->db->get_where('pertandingan', ['id_pertandingan' => $id])->row_array();
    }

    public function ubahPertandingan($id, $data)
    {
        $this->db->where('id_pertandingan', $id);
        $this->db->update('pertandingan', $data);
    }

    public function hapusPertandingan($id)
    {
        $this->db->where('id_pertandingan', $id);
        $this->db->delete('pertandingan');
    }
}
