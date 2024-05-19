<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
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
        $this->load->model('Gallery_m', 'gallery_m');
    }
    public function index($page = 0)
    {
        
        // $id = $_GET['id_header'];

        $limit = 24; //limit show data per page

        $page = $this->input->get("page");
        // Row position
        if ($page != 0) {
            $page = ($page - 1) * $limit;
        }

        $allcount = $this->gallery_m->getCountDataGallery(); //count data
        //konfigurasi pagination

        $config['base_url'] = site_url() . 'gallery'; //site url
        $config['total_rows'] = $allcount; //total row
        $config['per_page'] = $limit;  //show record per halaman
        $config["uri_segment"] =  $page;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $config['use_page_numbers'] = true;
        $config['page_query_string'] = true;
        $config['query_string_segment'] = 'page'; //parameter page name



        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->pagination->initialize($config);
        $data['page'] = ($page) ?  $page : 0;


        $data['getFile'] = $this->gallery_m->getAllGalleryFile($config["per_page"], $data['page']); //get show data on paggination

        $data['total'] = $allcount;
        $data['rowperpagenya'] = $limit;
        $data['row'] = $page;
        $data['pagination'] = $this->pagination->create_links();

        $data['type_gallery'] = $this->gallery_m->getAllType();
        // $data['getFile'] = $this->gallery_m->getAllGalleryFile();
        $data['content']     = 'webview/gallery/gallery_view';
        $data['content_js'] = 'webview/gallery/gallery_js';
        $this->load->view('_parts/wrapper', $data);
    }

    public function detail()
    {
        $id = $_GET['id'];

        // $data['populer'] = $this->info->getPopuler();
        // $data['category'] = $this->info->getAllType();
        $data['detail_gallery'] = $this->gallery_m->getAllGalleryFile_byid($id);
        $data['keterangan'] = $this->gallery_m->getAllGalleryby_id($id);

        $data['content']     = 'webview/gallery/gallery_detail';
        $data['content_js'] = 'webview/gallery/gallery_js';
        $this->load->view('_parts/wrapper', $data);
        // $this->add_count($id);
    }


    public function type($page = 0)
    {

        $limit = 24; //limit show data per page
        $urist = $this->uri->segment(2);
        $page = $this->input->get("page");
        $st = $this->input->get('st');
        $cat = $this->input->get('cat');

        // Row position
        if ($page != 0) {
            $page = ($page - 1) * $limit;
        }

        $allcount = $this->gallery_m->getCountDataGallery($page); //count data

        //konfigurasi pagination


        //condtion if category have search
        if ($urist == "search") {
            if ($cat == 'all') {
                $config['base_url'] = site_url() . 'gallery/search?st=' . $st; //site url
            } else {
                $config['base_url'] = site_url() . 'gallery/search?st=' . $st . '&cat=' . $cat; //accommodate search and sort category
            }
        } else {
            $config['base_url'] = site_url() . 'gallery/type?cat=' . $cat; //site url
        }




        $config['total_rows'] = $allcount; //total row
        $config['per_page'] = $limit;  //show record per halaman
        $config["uri_segment"] =  $page;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $config['use_page_numbers'] = true;
        $config['page_query_string'] = true;
        $config['query_string_segment'] = 'page'; //parameter page name



        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->pagination->initialize($config);
        $data['page'] = ($page) ?  $page : 0;

        $data['getFile'] = $this->gallery_m->getAllGalleryFile($config["per_page"], $data['page']); //get show data on paggination with category and or search

        $data['total'] = $allcount;
        $data['rowperpagenya'] = $limit;
        $data['row'] = $page;
        $data['pagination'] = $this->pagination->create_links();

        $data['type_gallery'] = $this->gallery_m->getAllType();
        $data['content']     = 'webview/gallery/gallery_view';
        $data['content_js'] = 'webview/gallery/gallery_js';
        $this->load->view('_parts/wrapper', $data);
    }

    public function search($page = 0)
    {
        $limit = 24; //limit show data per page
        $urist = $this->uri->segment(2);
        $page = $this->input->get("page");
        $st = $this->input->get('st');
        $cat = $this->input->get('cat');
        // Row position
        if ($page != 0) {
            $page = ($page - 1) * $limit;
        }

        $allcount = $this->gallery_m->getCountDataGallery($page); //count data


        //konfigurasi pagination

        //condtion if search have category
        if ($urist == "search") {
            if ($cat == 'all') {
                $config['base_url'] = site_url() . 'gallery/search?st=' . $st; //site url
            } else {
                $config['base_url'] = site_url() . 'gallery/search?st=' . $st . '&cat=' . $cat; //accommodate search and sort category
            }
        } else {
            $config['base_url'] = site_url() . 'gallery/search?st=' . $st; //site url
        }


        $config['total_rows'] = $allcount; //total row
        $config['per_page'] = $limit;  //show record per halaman
        $config["uri_segment"] =  $page;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $config['use_page_numbers'] = true;
        $config['page_query_string'] = true;
        $config['query_string_segment'] = 'page'; //parameter page name



        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->pagination->initialize($config);
        $data['page'] = ($page) ?  $page : 0;

        $data['getFile'] = $this->gallery_m->getAllGalleryFile($config["per_page"], $data['page']); //get show data on paggination with category and or search

        $data['total'] = $allcount;
        $data['rowperpagenya'] = $limit;
        $data['row'] = $page;
        $data['pagination'] = $this->pagination->create_links();

        $data['type_gallery'] = $this->gallery_m->getAllType();
        $data['content']     = 'webview/gallery/gallery_view';
        $data['content_js'] = 'webview/gallery/gallery_js';
        $this->load->view('_parts/wrapper', $data);
    }
}
