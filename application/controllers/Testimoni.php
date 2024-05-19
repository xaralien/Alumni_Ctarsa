<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimoni extends CI_Controller
{


    function __construct()
    {
        parent::__construct();

        $this->load->model('Testimoni_m', 'testimoni');
    }
    public function index()
    {
        $data['testimoni']  = $this->testimoni->getTestimoni();
        $data['content']    = 'webview/testimoni/testimoni_view';
        $data['content_js'] = 'webview/testimoni/testimoni_js';
        $this->load->view('_parts/wrapper', $data);
    }
}
