<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelLapangan extends CI_Model
{
    public function getLapangan()
    {
        return $this->db->get('lapangan')->result_array();
    }

    public function getLapanganByKode($id)
    {
        return $this->db->get_where('lapangan', ['kd_lapangan' => $id])->row_array();
    }

    public function input_data($data)
    {
        $this->db->insert('lapangan', $data);
    }

    public function hapusLapangan($data)
    {
        $this->db->where('kd_lapangan', $data);
        $this->db->delete('lapangan');
    }

    public function ubahLapangan($kode, $data)
    {
        $this->db->where('kd_lapangan', $kode);
        $this->db->update('lapangan', $data);
    }

    public function getLapanganLimit($per_halaman, $uri, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nm_lapangan', $keyword);
        }
        $this->db->limit($per_halaman, $uri);
        return $this->db->get('lapangan')->result_array();
    }

    public function getLap($per_halaman, $uri)
    {
        $this->db->limit($per_halaman, $uri);
        return $this->db->get('lapangan')->result_array();
    }

    public function countAllLapangan()
    {
        return $this->db->get('lapangan')->num_rows();
    }


    public function getMaxByKode()
    {
        $this->db->select_max('kd_lapangan');
        $this->db->order_by('kd_lapangan', 'desc');
        return $this->db->get('lapangan');
    }
}
