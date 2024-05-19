<?php defined('BASEPATH') or exit('No direct script access allowed');

class Testimoni_m extends CI_Model
{

    public function getTestimoni()
    {
        $this->db->select('lt.*, ms.name AS name, ms.institute AS ins, ms.year_graduate AS years, ms.id_mast_school, msc.school_name');
        $this->db->from('landing_testimoni lt');
        $this->db->join('mast_students ms', 'lt.id_students = ms.id');
        $this->db->join('mast_school msc', 'ms.id_mast_school = msc.id');
        $this->db->where('lt.active', 1);
        $this->db->where('lt.publish', 1);
        $this->db->where('lt.approved is not null');
        $query = $this->db->get();
        return $query->result();
    }
}
