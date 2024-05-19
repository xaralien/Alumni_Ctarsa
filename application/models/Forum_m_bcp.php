<?php defined('BASEPATH') or exit('No direct script access allowed');

class Forum_m extends CI_Model
{

    
    public function getThreads()
    {
        $this->db->select('a.*, b.full_name, b.year_graduate, COUNT(c.id_thread) as countrep');
        $this->db->from('forum_thread a');
        $this->db->join('_users b', 'a.created_by=b.id', 'left');
        $this->db->join('forum_reply c', 'a.id=c.id_thread', 'left');
        $this->db->where('a.active', 1);
        $this->db->where('a.publish', 1);
        $this->db->where('c.active', 1);
        $this->db->where('c.publish', 1);
        $this->db->group_by('a.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getThreads_me()
    {
        $this->db->select('a.*, b.full_name, b.year_graduate');
        $this->db->from('forum_thread a');
        $this->db->join('_users b', 'a.created_by=b.id', 'left');
        $this->db->where('a.active', 1);
        $this->db->where('a.publish', 1);
        $query = $this->db->get();
        return $query->result();
    }

  
}
