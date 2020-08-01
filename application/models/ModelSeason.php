<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelSeason extends CI_Model
{
    public function getAllSeason()
    {
        return $this->db->get('season')->result_array();
    }

    public function tambahSeason($data)
    {
        $this->db->insert('season', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_season', $id);
        $this->db->delete('season');
    }

    public function getSeasonById($id)
    {
        return $this->db->get_where('season', ['id_season' => $id])->row_array();
    }

    public function ubahSeason($id, $data)
    {
        $this->db->where('id_season', $id);
        $this->db->update('season', $data);
    }
}
