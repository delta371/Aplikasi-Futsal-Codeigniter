<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelSlider extends CI_Model
{

    public function insert_data($data)
    {
        $this->db->insert('slider', $data);
    }

    public function update_data($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('slider', $data);
    }

    public function getAllData()
    {
        return $this->db->get('slider')->result_array();
    }

    public function getSliderById($id)
    {
        return $this->db->get_where('slider', ['id' => $id])->row_array();
    }


    public function hapusSlider($id)
    {
        $this->db->delete('slider', ['id' => $id]);
    }
}
