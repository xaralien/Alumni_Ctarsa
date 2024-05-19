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
                'avatar' => $t->avatar,
                'created' => $t->created,
                'created_by' => $t->created_by,

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
                'avatar' => $r->avatar,
                'created_by' => $r->created_by,
                'id_thread_data' => $r->id_thread,


            );
        }

        // Merge and define type and date for the 'child'
        foreach ($child as $c) {
            $mergedData[] = array(
                'type' => 'child',
                'title' => $c->title,
                'id_data' => $c->id,
                'child' => $c->reply_child,
                'created' => $c->created,
                'avatar' => $c->avatar,
                'created_by' => $c->created_by,
                'id_thread_data' => $c->id_thread,

            );
        }

        // Define a custom sorting function to sort by date
        function sortByDateDesc($a, $b)
        {
            return strtotime($b['created']) - strtotime($a['created']);
        }

        usort($mergedData, 'sortByDateDesc');

        $data['information']     = $this->forum->getInformation();
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

        $thread     = $this->forum->getThreads_me();

        // Merge and define type and date for the 'threads'
        $mergedData = array();

        foreach ($thread as $t) {
            $mergedData[] = array(
                'type' => 'threads',
                'id_data' => $t->id,
                'count_view' => $t->count_view,
                'title' => $t->title,
                'thread' => $t->thread,
                'avatar' => $t->avatar,
                'created' => $t->created,
            );
        }
        $data['data'] = $mergedData;
        $data['information']     = $this->forum->getInformation();
        $data['threads']     = $this->forum->getThreads();
        $data['content']     = 'webview/forum/all_forum_view';
        $data['content_js'] = 'webview/forum/forum_js';
        $this->load->view('_parts/wrapper', $data);
    }

    public function detail($id)
    {
        $thread     = $this->forum->getThreads();

        $mergedData = array();

        // Merge and define type and date for the 'threads'
        foreach ($thread as $t) {
            $mergedData[] = array(
                'type' => 'threads',
                'id_data' => $t->id,
                'count_view' => $t->count_view,
                'title' => $t->title,
                'thread' => $t->thread,
                'avatar' => $t->avatar,
                'year_graduate' => $t->year_graduate,

                'created' => $t->created,
                'created_by' => $t->created_by,

            );
        }
        $data['data'] = $mergedData;
        $entry = $this->forum->getDetailThread($id);


        $data['threads'] = $entry;
        $data['reply_total'] = $this->forum->getReplyTotal($id);
        $data['replys'] = $this->forum->getReply($id);
        $data['content']     = 'webview/forum/forum_detail';
        $data['content_js'] = 'webview/forum/forum_js';
        $this->load->view('_parts/wrapper', $data);
        $this->add_count($id);
    }



    public function add_reply()
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->forum->save_reply(
            array(

                'created'           => $date->format('Y-m-d H:i:s'),
                'created_by'      => $this->session->userdata('users_id'),
                'reply'      => $this->input->post('Repliesfield'),
                'id_thread'      => $this->input->post('id_reply'),
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
                'id_thread'      => $this->input->post('id_thread'),
                'id_reply'      => $this->input->post('id_reply_child'),
                'active' => 1,
                'publish' => 1,

            ),
        );
        echo json_encode(array("status" => TRUE));
    }

    public function get_reply_ajax($id)
    {
        $data = $this->forum->get_id_reply($id);

        echo json_encode($data);
    }

    function add_count($id)
    {
        // $id = $_GET['id'];
        // load cookie helper
        $this->load->helper('cookie');
        // this line will return the cookie which has slug name
        $check_visitor = $this->input->cookie(urldecode($id), FALSE);
        // this line will return the visitor ip address
        $ip = $this->input->ip_address();
        // if the visitor visit this article for first time then //
        // //set new cookie and update article_views column ..
        // //you might be notice we used slug for cookie name and ip
        // //address for value to distinguish between articles views
        if ($check_visitor == false) {
            $cookie = array("name" => urldecode($id), "value" => "$ip", "expire" => time() + 7200, "secure" => false);
            $this->input->set_cookie($cookie);
            $this->forum->update_counter(urldecode($id));
        }
    }

    public function delete_child()
    {

        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->forum->delete_child(
            array(

                'deleted'           => $date->format('Y-m-d H:i:s'),
                'deleted_by'        => $this->session->userdata('users_id'),
                'active'            => 0,
            ),
            array('id' => $this->input->post('id_delete_child'))
        );

        echo json_encode(array("status" => TRUE));
    }

    public function delete_reply()
    {

        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->forum->delete_reply(
            array(

                'deleted'           => $date->format('Y-m-d H:i:s'),
                'deleted_by'        => $this->session->userdata('users_id'),
                'active'            => 0,
            ),
            array('id' => $this->input->post('id_delete_reply'))
        );

        echo json_encode(array("status" => TRUE));
    }

    public function delete_thread()
    {

        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->forum->delete_thread(
            array(

                'deleted'           => $date->format('Y-m-d H:i:s'),
                'deleted_by'        => $this->session->userdata('users_id'),
                'active'            => 0,
            ),
            array('id' => $this->input->post('id_delete_thread'))
        );

        echo json_encode(array("status" => TRUE));
    }

    public function save_thread()
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->forum->save_topic(
            array(

                'created'           => $date->format('Y-m-d H:i:s'),
                'created_by'      => $this->session->userdata('users_id'),
                'title'      => $this->input->post('thread_title'),
                'thread'      => $this->input->post('thread_desc'),
                'type_forum'      => 'public',
                'active' => 1,
                'publish' => 1,

            ),
            array('id' => $this->input->post('id_add_thread'))

        );
        echo json_encode(array("status" => TRUE));
    }
}
