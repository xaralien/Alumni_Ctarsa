<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        if ($this->uri->uri_string() !== 'login' && !$this->session->userdata('users_logged_in')) {
            $this->session->set_flashdata('error', 'Access denied. You need to login first!');
            // echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <script>Swal.fire({icon: "error",title: "Oops...",text: "Something went wrong!",footer: "<a href="">Why do I have this issue?</a>"}) </script>';
            // echo '<script> alert("Test");</script>';
            redirect('user/login');
            // echo '<script> alert("Test");</script>';
        };
        $this->load->model('User_m', 'user');
        $this->load->library('session');
        $this->load->model('Blog_m', 'blog');
        $this->load->library('pagination');
        $this->load->helper('url');
    }
    public function index($page = 0)
    {

        $a = "";
        $search_text = '';
        if (
            $this->input->post('submit') != NULL
        ) {
            $search_text = $this->input->post($a);
            $this->session->set_userdata(array("search" => $search_text));
        }
        // $id = $_GET['id'];
        $page = $this->input->get("halaman");


        $limit = 4;

        // Row position
        if ($page != 0) {
            $page = ($page - 1) * $limit;
        }

        // $users_record = $this->baju_m->getAllRumahRow($id,  $limit, $start);
        $allcount = $this->blog->getrecordAllCount();
        //konfigurasi pagination

        $config['base_url'] = site_url() . 'Blog'; //site url
        $config['total_rows'] = $allcount; //total row
        $config['per_page'] = $limit;  //show record per halaman
        $config["uri_segment"] =  $page;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $config['use_page_numbers'] = true;

        // $config['enable_query_strings'] = true;
        $config['page_query_string'] = true;
        $config['query_string_segment'] = 'halaman';

        // $config['reuse_query_string'] = true;

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

        // print_r($data['page']);
        // die;

        $data['all_blog'] = $this->blog->getAllBlog($config["per_page"], $data['page']);

        $data['pagination'] = $this->pagination->create_links();

        $data['search'] = $search_text;


        $data['total'] = $allcount;
        $data['rowperpagenya'] = $limit;
        $data['row'] = $page;

        $data['category'] = $this->blog->getAllType();
        // $data['all_blog'] = $this->blog->getAllBlog();
        $data['populer'] = $this->blog->getPopuler();
        $data['terbaru'] = $this->blog->getTerbaru();



        $data['content']     = 'webview/blog/blog_view';
        $data['content_js'] = 'webview/blog/blog_js';
        $this->load->view('_parts/wrapper', $data);
    }

    public function search_blog($page = 0)
    {
        // Search text
        $search_text = "";
        if ($this->input->post('submit') != NULL) {
            $search_text = $this->input->post('search');
            $this->session->set_userdata(array("search" => $search_text));
        } else {
            if ($this->session->userdata('search') != NULL) {
                $search_text = $this->session->userdata('search');
            }
        }

        $id = $this->uri->segment(3);
        $page = ($page != 0) ? $page : 0;
        $config["cur_page"] = $page;
        $limit = 4;
        // Row position
        if ($page != 0) {
            $page = ($page - 1) * $limit;
        }

        // $users_record = $this->index_m->getAllRumahRow($id,  $limit, $start);
        $allcount = $this->blog->getrecordCount($search_text);

        //konfigurasi pagination

        $config['base_url'] = base_url('Blog/search_blog'); //site url
        $config['total_rows'] = $allcount; //total row
        $config['per_page'] = $limit;  //show record per halaman
        $config["uri_segment"] =  $page;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $config['use_page_numbers'] = true;

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
        $data['page'] = ($page) ?  $page : 0;;

        $data['all_blog'] = $this->blog->getDataSearch($config["per_page"], $data['page'], ($search_text));
        $data['total'] = $allcount;
        $data['rowperpagenya'] = $limit;
        $data['pagination'] = $this->pagination->create_links($id);
        $data['search'] = $search_text;

        $data['category'] = $this->blog->getAllType();
        // $data['all_blog'] = $this->blog->getAllBlog();
        $data['populer'] = $this->blog->getPopuler();
        $data['terbaru'] = $this->blog->getTerbaru();



        $data['content']     = 'webview/blog/blog_view';
        $data['content_js'] = 'webview/blog/blog_js';
        $this->load->view('_parts/wrapper', $data);
    }


    public function detail($id = "")
    {
        $id = $_GET['id'];

        // $data['populer'] = $this->blog->getPopuler();
        $data['category'] = $this->blog->getAllType();
        $data['detail_blog'] = $this->blog->getBlog_by_id($id);
        $data['lainnya'] = $this->blog->getAllBlog_lainnya($id);

        $data['content']     = 'webview/blog/detail_view';
        $data['content_js'] = 'webview/blog/blog_js';
        $this->load->view('_parts/wrapper', $data);
        $this->add_count($id);
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
            $this->blog->update_counter(urldecode($id));
        }
    }
}
