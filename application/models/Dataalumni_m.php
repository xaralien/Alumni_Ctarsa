<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dataalumni_m extends CI_Model
{


    var $table = 'mast_students';
    var $column_order = array('a.id', 'a.name', 'a.id_mast_school', 'a.year_graduate', 'a.institute',  'c.instagram', 'c.linkedin', 'c.facebook', 'c.tiktok'); //set column field database for datatable orderable
    var $column_search = array('a.name', 'a.institute'); //set column field database for datatable searchable 
    var $order = array('a.year_graduate' => 'asc', 'a.name' => 'asc'); // default order 



    function _get_datatables_query()
    {

        $this->db->select('a.*, c.facebook, c.instagram, c.tiktok, c.linkedin, c.institute, d.school_name');
        $this->db->from('mast_students as a');
        $this->db->join('_users as b', 'b.nisn = a.nisn', 'left');
        $this->db->join('_users_sosmed as c', 'c.id = b.id', 'left');
        $this->db->join('mast_school as d', 'd.id = a.id_mast_school', 'left');
        $this->db->where('a.active', 1);
        // $this->db->where('publish', 0);
        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all()
    {

        $this->_get_datatables_query();
        $query = $this->db->get();

        return $this->db->count_all_results();
    }


    public function save($data)
    {

        return $this->db->insert('_users', $data);
    }


    // public function getalumni()
    // {
    //     $this->db->select('a.*, c.facebook, c.instagram, c.tiktok, c.linkedin, c.instansi, d.school_name');
    //     $this->db->from('mast_students as a');
    //     $this->db->join ('_users as b', 'b.nisn = a.nisn', 'left');
    //     $this->db->join ('_users_sosmed as c', 'c.id = b.id', 'left');
    //     $this->db->join ('mast_school as d', 'd.id = a.id_mast_school', 'left');
    //     $this->db->where('a.active', 1);
    //     $query = $this->db->get();
    //     return $query->result();
    // }

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

    // function count_filtered()
    // {
    //     $this->db->select('*');
    //     $this->db->from('mast_students');
    //     $this->db->where('active', 1);
    //     $query = $this->db->get();
    //     return $query->num_rows();
    // }

    // function count_all()
    // {
    //     $this->db->select('*');
    //     $this->db->from('mast_students');
    //     $this->db->where('active', 1);
    //     $query = $this->db->get();
    //     return $this->db->count_all_results();
    // }
}
