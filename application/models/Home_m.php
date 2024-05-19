<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home_m extends CI_Model
{
    public function getCollective()
    {
        $this->db->select('*');
        $this->db->from('landing_collective lc');
        $this->db->where('active', 1);
        $this->db->limit(1); // Limit the result to 1 row
        $query = $this->db->get();
        return $query->row();
    }
    public function getTestimoni()
    {
        $this->db->select('lt.*, ms.name AS name');
        $this->db->from('landing_testimoni lt');
        $this->db->join('mast_students ms', 'lt.id_students = ms.id');
        $this->db->where('lt.active', 1);
        $this->db->where('lt.publish', 1);
        $this->db->where('lt.approved is not null');
        $query = $this->db->get();
        return $query->result();
    }

    public function getInformasiTerbaru()
    {
        $this->db->select('tr.id, tr.*, m.category_name ');
        $this->db->from('trans_informations tr');
        $this->db->join('mast_cat_informations m', 'tr.id_cat_informations=m.id', 'left');
        $this->db->where('tr.active', 1);
        $this->db->where('tr.publish', 1);
        $this->db->order_by('date', 'desc');
        $this->db->limit('6');
        $query = $this->db->get();
        return $query->result();
    }
}
