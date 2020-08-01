<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelTestimoni extends CI_Model
{
    public function insert_data($data)
    {
        $this->db->insert('testimoni', $data);
    }

    public function getTestimoniLimit($per_halaman, $uri)
    {
        return $this->db->query("SELECT * FROM testimoni tes, users us 
        WHERE tes.id_user = us.id_user ORDER BY tanggal_ulasan DESC LIMIT $per_halaman,$uri")->result_array();
    }

    public function countAllTestimoni()
    {
        return $this->db->get('testimoni')->num_rows();
    }

    public function hapusTestimoni($id)
    {

        $this->db->delete('testimoni', ['id_testimoni' => $id]);
    }

    public function getAllData()
    {
        return $this->db->query("SELECT * FROM testimoni tes, users us 
        WHERE tes.id_user = us.id_user")->result_array();
    }
}
