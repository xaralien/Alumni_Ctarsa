<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

    public function save($data)
    {
        
        return $this->db->insert('_users', $data);
    }


    public function getsekolah()
    {
        $this->db->select('*');
        $this->db->from('mast_school');
        $this->db->where('active', 1);
        $query = $this->db->get();
        return $query->result();
    }
    public function getsosmed($id)
    {
        $this->db->select('*');
        $this->db->from('_users_sosmed');
        $this->db->where('id_users_header', $id);
        // $this->db->where('active', 1);
        $query = $this->db->get();
        return $query->row();
    }
    public function user_login($username, $password)
    {
        $this->db->select('u.*');
        $this->db->from('_users u');
        $where = '(nisn="' . $username . '" or email = "' . $username . '")';
        // $this->db->join('mast_regional m', 'u.id_regional=m.id', 'left');

        $this->db->where($where);

        //$this->db->where('group_id', 1);
        $this->db->limit(1);
        $query = $this->db->get();
        $user = $query->row();
        if (!empty($user) && password_verify($password, $user->password) && $user->active == 1 && $user->approval_user == 1) {
            return $user;
        } else {
            return false;
        }
    }
    
    public function update($data, $where)
    {
        $this->db->update('_users', $data, $where);
    }

}
