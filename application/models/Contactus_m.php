<?php defined('BASEPATH') or exit('No direct script access allowed');

class Contactus_m extends CI_Model
{

    public function save($data)
    {

        $this->db->insert('mast_pesan', $data);
        return $this->db->insert_id();
    }
}
