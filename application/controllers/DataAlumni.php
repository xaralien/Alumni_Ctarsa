<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataAlumni extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        if ($this->uri->uri_string() !== 'login' && !$this->session->userdata('users_logged_in')) {
            $this->session->set_flashdata('error', 'Access denied. You need to login first!');
            redirect('user/login');
        };

        $this->load->model('Dataalumni_m', 'data_alumni');
    }
    public function index()
    {

        $data['content']     = 'webview/dataalumni/dataalumni_view';
        $data['content_js'] = 'webview/dataalumni/dataalumni_js';
        $this->load->view('_parts/wrapper', $data);
    }
    public function ajax_list()
    {
        $list = $this->data_alumni->get_datatables();
        $data = array();
        $crs = "";
        $no = $_POST['start'];


        foreach ($list as $cat) {


            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $cat->name;
            $row[] = $cat->school_name;
            $row[] = $cat->year_graduate;
            $row[] = $cat->institute;
            $row[] = $cat->instagram;
            $row[] = $cat->linkedin;
            $row[] = $cat->facebook;
            $row[] = $cat->tiktok;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->data_alumni->count_all(),
            "recordsFiltered" => $this->data_alumni->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }
    // public function save()
    // {
    //     $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
    //     $this->poling->save(
    //         array(

    //             'created'           => $date->format('Y-m-d H:i:s'),
    //             'id_capres'      => $this->input->post('capres'),
    //             'id_cawapres'      => $this->input->post('cawapres'),
    //         ),
    //         array('id' => $this->input->post('id_add'))
    //     );
    //     echo json_encode(array("status" => TRUE));
    // }
}
