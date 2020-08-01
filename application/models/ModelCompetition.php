<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelCompetition extends CI_Model
{
    public function getAllCompetition()
    {
        return $this->db->query("SELECT * FROM competition comp,season sesi  WHERE comp.id_season = sesi.id_season")->result_array();
    }

    public function tambah_data($data)
    {
        $this->db->insert('competition', $data);
    }

    public function getCompetitionById($id)
    {
        return $this->db->get_where('competition', ['id_competition' => $id])->row_array();
    }

    public function ubah_data($id, $data)
    {
        $this->db->where('id_competition', $id);
        $this->db->update('competition', $data);
    }
}
