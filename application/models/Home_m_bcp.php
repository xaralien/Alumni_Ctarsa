<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home_m extends CI_Model
{

    public function getInformation()
    {
        $this->db->select('* ');
        $this->db->from('trans_banner_information');
        $this->db->where('active', 1);
        $this->db->where('publish', 1);

        $this->db->order_by('created', 'desc');
        $this->db->limit('6');
        $query = $this->db->get();
        return $query->result();
    }
}
