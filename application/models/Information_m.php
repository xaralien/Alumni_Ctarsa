<?php defined('BASEPATH') or exit('No direct script access allowed');

class Information_m extends CI_Model
{

    var $table_type = 'mast_cat_informations';
    var $table = 'trans_informations';



    public function getBanner()
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

    public function getAllType()
    {
        $this->db->select('* ');
        $this->db->from('mast_cat_informations');
        // $this->db->where('id != 4 and id !=3');
        $this->db->where('active', 1);

        $query = $this->db->get();
        return $query->result();
        // return $this->db->get($this->table_type)->result();
    }


    public function getInformation_by_id($id)
    {
        $this->db->select('tr.id, tr.*, m.category_name ');
        $this->db->from('trans_informations tr');
        $this->db->join('mast_cat_informations m', 'tr.id_cat_informations=m.id', 'left');
        $this->db->where('tr.id', $id);
        $this->db->where('tr.active', 1);
        $this->db->where('tr.publish', 1);
        $query = $this->db->get();
        return $query->result();
    }


    public function getKabarAlumni()
    {
        $this->db->select('tr.id, tr.*, m.category_name ');
        $this->db->from('trans_informations tr');
        $this->db->join('mast_cat_informations m', 'tr.id_cat_informations=m.id', 'left');
        $this->db->where('tr.id_cat_informations', 2);
        $this->db->where('tr.active', 1);
        $this->db->where('tr.publish', 1);
        $this->db->order_by('date', 'desc');
        $this->db->limit('1');
        $query = $this->db->get();
        return $query->result();
    }

    public function getPopuler()
    {
        $this->db->select('tr.id, tr.*, m.category_name ');
        $this->db->from('trans_informations tr');
        $this->db->join('mast_cat_informations m', 'tr.id_cat_informations=m.id', 'left');
        $this->db->where('tr.active', 1);
        $this->db->where('tr.publish', 1);
        $this->db->order_by('count', 'desc');
        $this->db->limit('6');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllPopuler()
    {
        $this->db->select('tr.id, tr.*, m.category_name ');
        $this->db->from('trans_informations tr');
        $this->db->join('mast_cat_informations m', 'tr.id_cat_informations=m.id', 'left');
        $this->db->where('tr.active', 1);
        $this->db->where('tr.publish', 1);
        $this->db->order_by('count', 'desc');
        // $this->db->limit('6');
        $query = $this->db->get();
        return $query->result();
    }


    public function getTerbaru()
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


    //get show data on paggination with category and or search
    public function getPagPopuler($limit, $start)
    {
        $this->db->select('tr.id, tr.*, m.category_name ');
        $this->db->from('trans_informations tr');
        $this->db->join('mast_cat_informations m', 'tr.id_cat_informations=m.id', 'left');
        if ($this->uri->segment(2) == 'popular_type') {
            if ($this->input->get('cat_p') != 'All') {
                $this->db->where('m.category_name', $this->input->get('cat_p'));
            }
        }
        if ($this->uri->segment(2) == 'popular_search') {
            $this->db->like('tr.title', $this->input->get('st_p'));
            if ($this->input->get('cat_p') != '') {
                if ($this->input->get('cat_p') != 'All') {
                    $this->db->where('m.category_name', $this->input->get('cat_p'));
                }
            }
        }
        $this->db->where('tr.active', 1);
        $this->db->where('tr.publish', 1);
        if ($this->input->get('sh_p') == 'popular') {
            $this->db->order_by('count', 'desc');
        } else if ($this->input->get('sh_p') == 'new') {
            $this->db->order_by('date', 'desc');
        } else {
            $this->db->order_by('count', 'desc');
        }

        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();


        return $this->db->get()->result();
    }

    //count data
    public function getCountDataPopuler()
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('trans_informations tr');
        $this->db->join('mast_cat_informations m', 'tr.id_cat_informations=m.id', 'left');
        if ($this->uri->segment(2) == 'popular_type') {
            if ($this->input->get('cat_p') != 'All') {
                $this->db->where('m.category_name', $this->input->get('cat_p'));
            }
        }
        if ($this->uri->segment(2) == 'popular_search') {
            $this->db->like('tr.title', $this->input->get('st_p'));
            if ($this->input->get('cat_p') != '') {
                if ($this->input->get('cat_p') != 'All') {
                    $this->db->where('m.category_name', $this->input->get('cat_p'));
                }
            }
        }
        $this->db->where('tr.active', 1);
        $this->db->where('tr.publish', 1);

        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }

    //get show data on paggination with category and or search
    public function getPagTerbaru($limit, $start)
    {
        $this->db->select('tr.id, tr.*, m.category_name ');
        $this->db->from('trans_informations tr');
        $this->db->join('mast_cat_informations m', 'tr.id_cat_informations=m.id', 'left');
        if ($this->uri->segment(2) == 'newest_type') {
            if ($this->input->get('cat_n') != 'All') {
                $this->db->where('m.category_name', $this->input->get('cat_n'));
            }
        }
        if ($this->uri->segment(2) == 'newest_search') {
            $this->db->like('tr.title', $this->input->get('st_n'));
            if ($this->input->get('cat_n') != '') {
                if ($this->input->get('cat_n') != 'All') {
                    $this->db->where('m.category_name', $this->input->get('cat_n'));
                }
            }
        }
        $this->db->where('tr.active', 1);
        $this->db->where('tr.publish', 1);
        if ($this->input->get('sh_n') == 'popular') {
            $this->db->order_by('count', 'desc');
        } else if ($this->input->get('sh_n') == 'new') {
            $this->db->order_by('date', 'desc');
        } else {
            $this->db->order_by('date', 'desc');
        }

        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();


        return $this->db->get()->result();
    }

    //count data
    public function getCountDataTerbaru()
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('trans_informations tr');
        $this->db->join('mast_cat_informations m', 'tr.id_cat_informations=m.id', 'left');
        if ($this->uri->segment(2) == 'newest_type') {
            if ($this->input->get('cat_n') != 'All') {
                $this->db->where('m.category_name', $this->input->get('cat_n'));
            }
        }
        if ($this->uri->segment(2) == 'newest_search') {
            $this->db->like('tr.title', $this->input->get('st_n'));
            if ($this->input->get('cat_n') != '') {
                if ($this->input->get('cat_n') != 'All') {
                    $this->db->where('m.category_name', $this->input->get('cat_n'));
                }
            }
        }
        $this->db->where('tr.active', 1);
        $this->db->where('tr.publish', 1);

        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }

    public function getAllTerbaru()
    {
        $this->db->select('tr.id, tr.*, m.category_name ');
        $this->db->from('trans_informations tr');
        $this->db->join('mast_cat_informations m', 'tr.id_cat_informations=m.id', 'left');
        $this->db->where('tr.active', 1);
        $this->db->where('tr.publish', 1);
        $this->db->order_by('date', 'desc');
        // $this->db->limit('6');
        $query = $this->db->get();
        return $query->result();
    }

    function update_counter($id)
    {
        $this->db->where('id', urldecode($id));
        $this->db->select('trans_informations.count');
        $count = $this->db->get('trans_informations')->row();
        $this->db->where('id', urldecode($id));
        $this->db->set('count', ($count->count + 1));
        $this->db->update('trans_informations');
    }

    public function getdataCategory($cat)
    {
        $this->db->select('tr.id, tr.*, m.category_name ');
        $this->db->from('trans_informations tr');
        $this->db->join('mast_cat_informations m', 'tr.id_cat_informations=m.id', 'left');
        $this->db->where('tr.id_cat_informations', $cat);
        $this->db->where('tr.active', 1);
        $this->db->where('tr.publish', 1);
        $this->db->order_by('date', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
}
