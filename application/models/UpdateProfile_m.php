<?php defined('BASEPATH') or exit('No direct script access allowed');

class UpdateProfile_m extends CI_Model
{

    var $table = '_users';
    var $column_order = array('id', 'title', 'date', 'author', 'description', 'thumbnail_image', 'category_name', 'file', 'page_count'); //set column field database for datatable orderable
    var $column_search = array('id', 'title', 'date', 'author', 'description', 'thumbnail_image', 'category_name', 'file', 'page_count'); //set column field database for datatable searchable 
    var $order = array('id' => 'asc'); // default order 

    
    public function get_id_edit($id)
    {
        $this->db->select('u.*, s.school_name');
        $this->db->from('_users u');
        $this->db->join('mast_school s', 's.id = u.id_mast_school');
        $this->db->where('u.id', $id);
        $query = $this->db->get();

        return $query->result();
    }

}