<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelNews extends CI_Model
{
    public function getAllNews()
    {
        return $this->db->get('news')->result_array();
    }

    public function tambahNews($data)
    {
        $this->db->insert('news', $data);
    }

    public function hapusNews($id)
    {
        $this->db->delete('news', ['id' => $id]);
    }

    public function getNewsById($id)
    {
        return $this->db->get_where('news', ['id' => $id])->row_array();
    }

    public function ubahNews($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('news', $data);
    }

    public function getNewsLimit($per_halaman, $uri, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('judul', $keyword);
        }
        $this->db->limit($per_halaman, $uri);
        return $this->db->get('news')->result_array();
    }
}
