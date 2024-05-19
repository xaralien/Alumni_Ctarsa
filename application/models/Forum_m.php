<?php defined('BASEPATH') or exit('No direct script access allowed');

class Forum_m extends CI_Model
{

    public function getInformation()
    {
        $this->db->select('tr.id, tr.*, m.category_name ');
        $this->db->from('trans_informations tr');
        $this->db->join('mast_cat_informations m', 'tr.id_cat_informations=m.id', 'left');
        $this->db->where('tr.active', 1);
        $this->db->where('tr.publish', 1);
        $this->db->order_by('date', 'desc');
        $this->db->limit('4');
        $query = $this->db->get();
        return $query->result();
    }

    public function getuser()
    {
        $this->db->select('a.*');
        $this->db->from('_users a');
        // $this->db->where('a.active', 1);
        $this->db->where('a.id');
        // $this->db->group_by('a.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getThreads()
    {
        $this->db->select('a.*, b.full_name, b.year_graduate,b.avatar');
        $this->db->from('forum_thread a');
        $this->db->join('_users b', 'a.created_by=b.id', 'left');
        $this->db->where('a.active', 1);
        $this->db->where('a.publish', 1);

        $query = $this->db->get();
        return $query->result();
    }

    public function getThreads_me()
    {
        $this->db->select('a.*, b.full_name, b.year_graduate, b.avatar');
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
        $this->db->select('a.*, b.full_name, b.year_graduate, c.title, b.avatar');
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
        $this->db->select('a.*, b.full_name, b.year_graduate, b.avatar, c.title');
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
        $this->db->select('a.*, b.full_name, b.year_graduate, b.avatar');
        $this->db->from('forum_thread a');
        $this->db->join('_users b', 'a.created_by=b.id', 'left');
        $this->db->where('a.id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function getReply($id = null)
    {
        $this->db->select('a.*, b.full_name, b.year_graduate, b.avatar');
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
        $this->db->select('a.*, b.full_name, b.year_graduate, b.avatar');
        $this->db->from('forum_reply a');
        $this->db->join('_users b', 'a.created_by=b.id', 'left');
        $this->db->where('a.id_thread', $id);
        $this->db->where('a.active', 1);
        $this->db->where('a.publish', 1);
        $query = $this->db->get();
        return $query->num_rows();
    }


    public function get_id_reply($id)
    {
        $this->db->select('a.*, b.full_name, b.year_graduate, b.avatar');
        $this->db->from('forum_reply a');
        $this->db->join('_users b', 'a.created_by=b.id', 'left');
        $this->db->where('a.id', $id);
        $this->db->where('a.active', 1);
        $this->db->where('a.publish', 1);
        $query = $this->db->get();

        return $query->row();
    }

    public function record_click($buttonName)
    {
        $this->db->where('id', $buttonName);
        $query = $this->db->get('forum_thread');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $clickCount = $row->count_view + 1;
            $this->db->where('id', $buttonName);
            $this->db->update('forum_thread', ['count_view' => $clickCount]);
        } else {
            $this->db->insert('forum_thread', [
                // 'button_name' => $buttonName,
                'count_view' => 1,
            ]);
        }
    }

    function update_counter($id)
    {
        $this->db->where('id', urldecode($id));
        $this->db->select('forum_thread.count_view');
        $count = $this->db->get('forum_thread')->row();
        $this->db->where('id', urldecode($id));
        $this->db->set('count_view', ($count->count_view + 1));
        $this->db->update('forum_thread');
    }
    public function save_topic($data)
    {

        return $this->db->insert('forum_thread', $data);
    }

    public function save_reply($data)
    {

        return $this->db->insert('forum_reply', $data);
    }
    public function save_child($data)
    {

        return $this->db->insert('forum_reply_child', $data);
    }

    public function delete_child($data, $where)
    {
        $this->db->update('forum_reply_child', $data, $where);
    }

    public function delete_reply($data, $where)
    {
        $this->db->update('forum_reply', $data, $where);
    }

    public function delete_thread($data, $where)
    {
        $this->db->update('forum_thread', $data, $where);
    }
}
