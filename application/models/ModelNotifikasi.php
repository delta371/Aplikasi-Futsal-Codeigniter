<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelNotifikasi extends CI_Model
{
    public function input_data($data)
    {
        $this->db->insert('notifikasi_system', $data);
    }

    public function update_data($id)
    {
        $data = [
            'status' => 'read'
        ];
        $this->db->where('id', $id);
        $this->db->update('notifikasi_system', $data);
    }

    public function getDataById($id)
    {
        return $this->db->query("SELECT * FROM notifikasi_system notif, users us WHERE notif.id_user = us.id_user AND notif.id = $id")->row_array();
    }

    public function getAllData()
    {
        return $this->db->query("SELECT * FROM notifikasi_system notif, users us WHERE notif.id_user = us.id_user ORDER BY id DESC")->result_array();
    }

    public function delete_data($id)
    {
        $this->db->delete('notifikasi_system', ['id' => $id]);
    }
}
