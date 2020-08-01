<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelTeam extends CI_Model
{
    public function getAllTeam()
    {
        return $this->db->get('team')->result_array();
    }

    public function tambahData($data)
    {
        $this->db->insert('team', $data);
    }


    public function getTeamById($id)
    {
        return $this->db->get_where('team', ['id_team' => $id])->row_array();
    }

    public function getTeamLimit($per_halaman, $uri, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nm_team', $keyword);
        }
        $this->db->limit($per_halaman, $uri);
        return $this->db->get('team')->result_array();
    }


    public function ubahTeam($id, $data)
    {
        $this->db->where('id_team', $id);
        $this->db->update('team', $data);
    }

    public function hapusTeam($id)
    {
        $this->db->where('id_team', $id);
        $this->db->delete('team');
    }
}
