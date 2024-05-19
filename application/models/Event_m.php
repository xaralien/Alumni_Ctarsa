<?php defined('BASEPATH') or exit('No direct script access allowed');

class Event_m extends CI_Model
{


    public function getEvent()
    {
        $this->db->select('* ');
        $this->db->from('mast_event');
        $this->db->where('active', 1);
        $this->db->order_by('date_event', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function getEvent_by_id($id)
    {
        $this->db->select('* ');
        $this->db->from('mast_event');
        $this->db->order_by('date_event', 'asc');
        $this->db->where('id', $id);
        $this->db->where('active', 1);
        // $this->db->where('publish', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function getEventType()
    {
        $now = date("Y-m-d");
        $this->db->select('* ');
        $this->db->from('mast_event');
        if ($this->input->get('ev') == 'Coming') {
            $this->db->where('date_event >', $now);
        } else if ($this->input->get('ev') == 'Done') {
            $this->db->where('date_event <=', $now);
        }
        if ($this->uri->segment(2) == 'search') {
            $this->db->like('title', $this->input->get('se'));
            if ($this->input->get('ev') == 'Coming') {
                $this->db->where('date_event >', $now);
            } else if ($this->input->get('ev') == 'Done') {
                $this->db->where('date_event <=', $now);
            }
        }
        $this->db->where('active', 1);
        $this->db->order_by('date_event', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
}
