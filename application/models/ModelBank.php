<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBank extends CI_Model
{
    public function getAllBank()
    {
        return $this->db->get('bank')->result_array();
    }
}
