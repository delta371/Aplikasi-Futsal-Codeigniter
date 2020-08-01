<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{
    public function cekData($where = null)
    {
        return $this->db->get_where('users', $where);
    }

    public function cekToken($where = null)
    {
        return $this->db->get_where('token', $where);
    }

    public function getMemberLimit($per_halaman, $uri, $keyword)
    {
        if ($keyword) {
            $query = "SELECT * FROM users us, role rol 
            WHERE us.role_id = rol.id  AND us.nama LIKE '%$keyword%'
            AND us.role_id = 2 LIMIT $per_halaman, $uri
            ";
        } else {
            $query = "SELECT * FROM users us, role rol 
        WHERE us.role_id = rol.id 
        AND us.role_id = 2 LIMIT $per_halaman, $uri
        ";
        }

        return $this->db->query($query)->result_array();
    }

    public function countMember()
    {
        $query = "SELECT * FROM users us, role rol 
        WHERE us.role_id = rol.id 
        AND us.role_id = 2";
        return $this->db->query($query)->num_rows();
    }

    public function update_data($id, $data)
    {
        $this->db->where('id_user', $id);
        $this->db->update('users', $data);
    }

    public function getAllMember()
    {
        $query = "SELECT * FROM users us, role rol 
        WHERE us.role_id = rol.id 
        AND us.role_id = 2";
        return $this->db->query($query)->result_array();
    }

    public function getAllUser()
    {
        $query = "SELECT * FROM users us, role rol 
        WHERE us.role_id = rol.id 
        ";
        return $this->db->query($query)->result_array();
    }

    public function hapusUser($id)
    {
        $this->db->delete('users', ['id_user' => $id]);
    }

    public function update_password($email, $data)
    {
        $this->db->where('email', $email);
        $this->db->update('users', $data);
    }
}
