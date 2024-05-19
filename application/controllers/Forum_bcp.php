<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forum extends CI_Controller
{


    function __construct()
    {
        parent::__construct();

        $this->load->model('Forum_m', 'forum');
    }
    public function index()
    {
        $data['threads']     = $this->forum->getThreads_me();
        $data['content']     = 'webview/forum/forum_view';
        $data['content_js'] = 'webview/forum/forum_js';
        $this->load->view('_parts/wrapper', $data);
    }

    public function all_forum()
    {
        $data['threads']     = $this->forum->getThreads();
        $data['content']     = 'webview/forum/all_forum_view';
        $data['content_js'] = 'webview/forum/forum_js';
        $this->load->view('_parts/wrapper', $data);
    }

    public function detail($id)
    {

        $entry = $this->forum->getDetailThread($id);

        $data['threads'] = $entry;
        $data['reply_total'] = $this->forum->getReplyTotal($id);
        $data['replys'] = $this->forum->getReply($id);
        $data['content']     = 'webview/forum/forum_detail';
        $data['content_js'] = 'webview/forum/forum_js';
        $this->load->view('_parts/wrapper', $data);
    }


    public function add_reply()
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->forum->save_reply(
            array(

                'created'           => $date->format('Y-m-d H:i:s'),
                'created_by'      => $this->session->userdata('user_user_id'),
                'reply'      => $this->input->post('Repliesfield'),
                'id_thread'      => $this->input->post('id'),
                'active' => 1,
                'publish' => 1,

            ),
        );
        echo json_encode(array("status" => TRUE));
    }

    public function add_child()
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->forum->save_child(
            array(

                'created'           => $date->format('Y-m-d H:i:s'),
                'created_by'      => $this->session->userdata('user_user_id'),
                'reply_child'      => $this->input->post('Childfield'),
                'id_reply'      => $this->input->post('id'),
                'active' => 1,
                'publish' => 1,

            ),
        );
        echo json_encode(array("status" => TRUE));
    }
}
