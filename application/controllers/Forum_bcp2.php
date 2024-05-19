<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forum extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        if ($this->uri->uri_string() !== 'login' && !$this->session->userdata('users_logged_in')) {
            $this->session->set_flashdata('error', 'Access denied. You need to login first!');
            redirect('user/login');
        };
        $this->load->model('User_m', 'user');
        $this->load->library('session');
        $this->load->model('Forum_m', 'forum');
    }
    public function index()
    {
        $thread     = $this->forum->getThreads_me();
        $reply = $this->forum->getReply_me();
        $child = $this->forum->getChild_me();

        $mergedData = array();

        // Merge and define type and date for the 'threads'
        foreach ($thread as $t) {
            $mergedData[] = array(
                'type' => 'threads',
                'id_data' => $t->id,
                'count_view' => $t->count_view,
                'title' => $t->title,
                'thread' => $t->thread,
                'created' => $t->created,
            );
        }

        // Merge and define type and date for the 'reply'
        foreach ($reply as $r) {
            $mergedData[] = array(
                'type' => 'reply',
                'title' => $r->title,
                'id_data' => $r->id,
                'reply' => $r->reply,
                'created' => $r->created,
            );
        }

        // Merge and define type and date for the 'child'
        foreach ($child as $c) {
            $mergedData[] = array(
                'type' => 'child',
                'title' => $r->title,
                'id_data' => $c->id,
                'child' => $c->reply_child,
                'created' => $c->created,
            );
        }

        // Define a custom sorting function to sort by date
        function sortByDateDesc($a, $b)
        {
            return strtotime($b['created']) - strtotime($a['created']);
        }

        usort($mergedData, 'sortByDateDesc');

        $data['data'] = $mergedData;
        $data['content']     = 'webview/forum/forum_view';
        $data['content_js'] = 'webview/forum/forum_js';
        $this->load->view('_parts/wrapper', $data);
    }

    public function tes()
    {
        $thread     = $this->forum->getThreads_me();
        $reply = $this->forum->getReply_me();
        $child = $this->forum->getChild_me();

        $mergedData = array();

        // Merge and define type and date for the 'threads'
        foreach ($thread as $t) {
            $mergedData[] = array(
                'type' => 'threads',
                'id_data' => $t->id,
                'count_view' => $t->count_view,
                'title' => $t->title,
                'thread' => $t->thread,
                'created' => $t->created,
            );
        }

        // Merge and define type and date for the 'reply'
        foreach ($reply as $r) {
            $mergedData[] = array(
                'type' => 'reply',
                'title' => $r->title,
                'id_data' => $r->id,
                'reply' => $r->reply,
                'created' => $r->created,
            );
        }

        // Merge and define type and date for the 'child'
        foreach ($child as $c) {
            $mergedData[] = array(
                'type' => 'child',
                'id_data' => $c->id,
                'child' => $c->reply_child,
                'created' => $c->created,
            );
        }

        // Define a custom sorting function to sort by date
        function sortByDateDesc($a, $b)
        {
            return strtotime($b['created']) - strtotime($a['created']);
        }

        usort($mergedData, 'sortByDateDesc');

        foreach ($mergedData as $mergedItem) {
            $type = $mergedItem['type'];
            $date = $mergedItem['created'];

            // Output the data based on type
            if ($type === 'threads') {
                $title = $mergedItem['title'];
                $thread = $mergedItem['thread'];
                echo "Type: $type<br>";
                echo "Title: $title<br>";
                echo "Thread: $thread<br>";
            } elseif ($type === 'reply') {
                $reply = $mergedItem['reply'];
                echo "Type: $type<br>";
                echo "Reply: $reply<br>";
            } elseif ($type === 'child') {
                $child = $mergedItem['child'];
                echo "Type: $type<br>";
                echo "Child Reply: $child<br>";
            }
            echo "Date: $date<br>";
            echo "<br>";
        }
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
                'created_by'      => $this->session->userdata('users_id'),
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
                'created_by'      => $this->session->userdata('users_id'),
                'reply_child'      => $this->input->post('Childfield'),
                'id_reply'      => $this->input->post('id'),
                'active' => 1,
                'publish' => 1,

            ),
        );
        echo json_encode(array("status" => TRUE));
    }
}
