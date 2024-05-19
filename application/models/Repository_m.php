<?php defined('BASEPATH') or exit('No direct script access allowed');

class Repository_m extends CI_Model
{

    var $table_type = 'mast_cat_repository';
    var $table = 'trans_repository';

    public function getAllType()
    {
        $this->db->select('* ');
        $this->db->from('mast_cat_repository');
        // $this->db->where('id != 4 and id !=3');
        $this->db->where('active', 1);

        $query = $this->db->get();
        return $query->result();
        // return $this->db->get($this->table_type)->result();
    }


    public function getAllRepository($limit, $start)
    {
        $this->db->select('tr.* ');
        $this->db->from('trans_repository tr');
        // $this->db->join('mast_cat_repository m', 'tr.id_cat_repository=m.id', 'left');
        // $this->db->where('tr.id', $id);
        $this->db->where('tr.active', 1);
        $this->db->where('tr.publish', 1);
        $this->db->order_by('date', 'desc');
        $this->db->limit($limit, $start);

        $query = $this->db->get();
        return $query->result();
    }

    public function getAllData()
    {
        $this->db->select('tr.* ');
        $this->db->from('trans_repository tr');
        // $this->db->join('mast_cat_repository m', 'tr.id_cat_repository=m.id', 'left');
        // $this->db->where('tr.id', $id);
        $this->db->where('tr.active', 1);
        $this->db->where('tr.publish', 1);
        $this->db->order_by('date', 'desc');
        // $this->db->limit($limit, $start);

        $query = $this->db->get();
        return $query->result_array();
    }
    public function getrecordAllCount()
    {

        $this->db->select('count(*) as allcount');
        $this->db->from('trans_repository tr');
        // $this->db->join('mast_cat_repository m', 'tr.id_cat_repository=m.id', 'left');
        // $this->db->where('tr.id', $id);
        $this->db->where('tr.active', 1);
        $this->db->where('tr.publish', 1);

        // if ($search != '') {
        //     $this->db->like('karyatulis_title', $search);
        // }
        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }

    //count data

    public function getrecordCount($search = '')
    {

        $this->db->select('count(*) as allcount');
        $this->db->from('trans_repository tr');
        $this->db->where('tr.active', 1);
        $this->db->where('tr.publish', 1);
        if ($search != '') {
            $this->db->like('tr.title', $search);
        }
        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }


    public function getDataSearch($limit, $start, $search = "")
    {
        $this->db->select('* ');
        $this->db->from('trans_repository tr');
        $this->db->where('tr.active', 1);
        $this->db->where('tr.publish', 1);
        if ($search != '') {
            $this->db->like('tr.title', $search);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('date', 'desc');

        $query = $this->db->get();
        return $query->result();
    }

    public function getRepository_by_id($id)
    {
        $this->db->select('tr.* ');
        $this->db->from('trans_repository tr');
        // $this->db->join('mast_cat_repository m', 'tr.id_cat_repository=m.id', 'left');
        $this->db->where('tr.id', $id);
        $this->db->where('tr.active', 1);
        $this->db->where('tr.publish', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function getFileData($fileId)
    {
        // Fetch file data from the database based on $fileId
        $this->db->select('tr.* ');
        $this->db->from('trans_repository tr');
        $this->db->where('tr.id', $fileId);
        $this->db->where('tr.active', 1);
        $this->db->where('tr.publish', 1);
        $query = $this->db->get();
        return $query->row();
    }




    public function getRepository_lainnya($id)
    {
        $this->db->select('tr.* ');
        $this->db->from('trans_repository tr');
        // $this->db->join('mast_cat_repository m', 'tr.id_cat_repository=m.id', 'left');
        $this->db->where('tr.id !=', $id);
        $this->db->where('tr.active', 1);
        $this->db->where('tr.publish', 1);
        // $this->db->order_by('date', 'desc');
        $this->db->limit(5);

        $query = $this->db->get();
        return $query->result();
    }

    public function record_click($buttonName)
    {
        $this->db->where('id', $buttonName);
        $query = $this->db->get('trans_repository');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $clickCount = $row->download_count + 1;
            $this->db->where('id', $buttonName);
            $this->db->update('trans_repository', ['download_count' => $clickCount]);
        } else {
            $this->db->insert('trans_repository', [
                // 'button_name' => $buttonName,
                'download_count' => 1,
            ]);
        }
    }


    public function getPopuler()
    {
        $this->db->select('tr.* ');
        $this->db->from('trans_repository tr');
        // $this->db->join('mast_cat_repository m', 'tr.id_cat_repository=m.id', 'left');
        // $this->db->where('tr.id', $id);
        $this->db->where('tr.active', 1);
        $this->db->where('tr.publish', 1);
        $this->db->order_by('count', 'desc');
        $this->db->limit('5');
        $query = $this->db->get();
        return $query->result();
    }


    public function getDownload()
    {
        $this->db->select('tr.* ');
        $this->db->from('trans_repository tr');
        // $this->db->join('mast_cat_repository m', 'tr.id_cat_repository=m.id', 'left');
        // $this->db->where('tr.id', $id);
        $this->db->where('tr.active', 1);
        $this->db->where('tr.publish', 1);
        $this->db->order_by('download_count', 'desc');
        $this->db->limit('5');
        $query = $this->db->get();
        return $query->result();
    }



    public function getTerbaru()
    {
        $this->db->select('tr.id, tr.*, m.category_name ');
        $this->db->from('trans_repository tr');
        $this->db->join('mast_cat_repository m', 'tr.id_cat_repository=m.id', 'left');
        $this->db->where('tr.active', 1);
        $this->db->where('tr.publish', 1);
        $this->db->order_by('date', 'desc');
        $this->db->limit('6');
        $query = $this->db->get();
        return $query->result();
    }


    function update_counter($id)
    {
        $this->db->where('id', urldecode($id));
        $this->db->select('trans_repository.count');
        $count = $this->db->get('trans_repository')->row();
        $this->db->where('id', urldecode($id));
        $this->db->set('count', ($count->count + 1));
        $this->db->update('trans_repository');
    }
}
