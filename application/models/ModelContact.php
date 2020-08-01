<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelContact extends CI_Model
{
    public function getContact()
    {
        return $this->db->get('info_contact')->row_array();
    }

    public function ubahData($id, $data)
    {
        $this->db->where('id_contact', $id);
        $this->db->update('info_contact', $data);
    }
}
