<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelProfit extends CI_Model
{
    public function insert_data($data)
    {
        $this->db->insert('profit', $data);
    }

    public function update_data($tahun, $data)
    {
        $this->db->where('tahun', $tahun);
        $this->db->update('profit', $data);
    }

    public function getDataByDate()
    {
        $tahun = date('Y');
        return $this->db->query("SELECT * FROM profit WHERE tahun = $tahun")->row_array();
    }

    public function getBulan()
    {
        $this->db->select('bulan');
        $this->db->from('profit');
        $this->db->group_by('bulan');
        return $this->db->get();
    }

    public function getTahun()
    {
        $this->db->select('tahun');
        $this->db->from('profit');
        $this->db->group_by('tahun');
        $this->db->order_by('tahun', 'DESC');
        return $this->db->get();
    }

    public function getDataByTahun($tahun)
    {
        $this->db->where('tahun', $tahun);
        $this->db->order_by('tahun', 'ASC');
        return $this->db->get('profit')->result_array();
    }


    public function getDataProfit()
    {
        return $this->db->get('profit');
    }


    public function getProfit()
    {
        $query = $this->db->query("SELECT * from profit");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}
