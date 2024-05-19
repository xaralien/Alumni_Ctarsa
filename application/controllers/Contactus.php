<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contactus extends CI_Controller
{


    function __construct()
    {
        parent::__construct();

        $this->load->model('Contactus_m', 'contactus');
    }
    public function index()
    {

        $data['content']     = 'webview/contactus/contactus_view';
        $data['content_js']     = 'webview/contactus/contactus_js';
        // $data['content_js'] = 'webview/forum/forum_js';
        $this->load->view('_parts/wrapper', $data);
    }

    public function save()
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->contactus->save(
            array(

                'created'           => $date->format('Y-m-d H:i:s'),
                'nama'      => $this->input->post('nama'),
                'email'      => $this->input->post('email'),
                'pesan'      => $this->input->post('message'),
                'active'      => 1,
            ),
        );
        echo json_encode(array("status" => TRUE));
    }
}
