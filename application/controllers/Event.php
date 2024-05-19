<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        // if ($this->uri->uri_string() !== 'login' && !$this->session->userdata('user_logged_in')) {
        //     $this->session->set_flashdata('error', 'Access denied. You need to login first!');
        //     redirect('user/login');
        // };
        // $this->load->model('User_m', 'user');
        // $this->load->library('session');    
        $this->load->model('Event_m', 'evn');
    }
    public function index()
    {
        $data['events'] = $this->evn->getEvent();
        $data['eventd'] = $this->evn->getEvent();
        $data['content']     = 'webview/event/event_view';
        $data['content_js'] = 'webview/event/event_js';
        $this->load->view('_parts/wrapper', $data);
    }

    public function type()
    {
        $data['events'] = $this->evn->getEventType();
        $data['content']     = 'webview/event/event_view';
        $data['content_js'] = 'webview/event/event_js';
        $this->load->view('_parts/wrapper', $data);
    }

    public function search()
    {
        $data['events'] = $this->evn->getEventType();
        $data['content']     = 'webview/event/event_view';
        $data['content_js'] = 'webview/event/event_js';
        $this->load->view('_parts/wrapper', $data);
    }

    public function getDate()
    {
        $data = $this->evn->getEvent();

        echo json_encode($data);
    }


    public function detail()
    {
        $id = $_GET['id'];

        // $data['populer'] = $this->blog->getPopuler();
        // $data['category'] = $this->blog->getAllType();

        $data['detail_event'] = $this->evn->getEvent_by_id($id);
        $data['content']     = 'webview/event/event_detail';
        $data['content_js'] = 'webview/event/event_js2';
        $this->load->view('_parts/wrapper', $data);
        // $this->add_count($id);
    }
}
