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
        $this->db->where('a.created_by', $this->session->userdata('users_id'));
        $query = $this->db->get();
        return $query->result();
    }

    public function getReply_me()
    {
        $this->db->select('a.*, b.full_name, b.year_graduate, c.title');
        $this->db->from('forum_reply a');
        $this->db->join('_users b', 'a.created_by=b.id', 'left');
        $this->db->join('forum_thread c', 'a.id_thread=c.id', 'left');
        $this->db->where('a.active', 1);
        $this->db->where('a.publish', 1);
        $this->db->where('a.created_by', $this->session->userdata('users_id'));
        $query = $this->db->get();
        return $query->result();
    }
    public function getChild_me()
    {
        $this->db->select('a.*, b.full_name, b.year_graduate');
        $this->db->from('forum_reply_child a');
        $this->db->join('_users b', 'a.created_by=b.id', 'left');
        $this->db->join('forum_thread c', 'a.id_thread=c.id', 'left');
        $this->db->where('a.active', 1);
        $this->db->where('a.publish', 1);
        $this->db->where('a.created_by', $this->session->userdata('users_id'));
        $query = $this->db->get();
        return $query->result();
    }
    public function getDetailThread($id = null)
    {
        $this->db->select('a.*, b.full_name, b.year_graduate');
        $this->db->from('forum_thread a');
        $this->db->join('_users b', 'a.created_by=b.id', 'left');
        $this->db->where('a.id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function getReply($id = null)
    {
        $this->db->select('a.*, b.full_name, b.year_graduate');
        $this->db->from('forum_reply a');
        $this->db->join('_users b', 'a.created_by=b.id', 'left');
        $this->db->where('a.id_thread', $id);
        $this->db->where('a.active', 1);
        $this->db->where('a.publish', 1);
        $this->db->order_by('a.created', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    public function getReplyTotal($id = null)
    {
        $this->db->select('a.*, b.full_name, b.year_graduate');
        $this->db->from('forum_reply a');
        $this->db->join('_users b', 'a.created_by=b.id', 'left');
        $this->db->where('a.id_thread', $id);
        $this->db->where('a.active', 1);
        $this->db->where('a.publish', 1);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function save_reply($data)
    {

        return $this->db->insert('forum_reply', $data);
    }
    public function save_child($data)
    {

        return $this->db->insert('forum_reply_child', $data);
    }
}
