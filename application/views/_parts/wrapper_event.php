<?php defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_parts/header_event');
$this->load->view('_parts/navigation');
$this->load->view($content);
$this->load->view('_parts/footer');
$this->load->view('_parts/js_event');
if (isset($content_js)) $this->load->view($content_js);
