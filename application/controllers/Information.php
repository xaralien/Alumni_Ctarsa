<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Information extends CI_Controller
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

        $this->load->model('Information_m', 'info');
    }
    public function index()
    {

        $data['category'] = $this->info->getAllType();
        $data['kabaralumni'] = $this->info->getKabarAlumni();
        $data['populer'] = $this->info->getPopuler();
        $data['terbaru'] = $this->info->getTerbaru();
        $data['banner'] = $this->info->getBanner();



        $data['content']     = 'webview/information/information_view';
        $data['content_js'] = 'webview/information/information_js';
        $this->load->view('_parts/wrapper', $data);
    }

    public function detail($id = '')
    {
        $id = $_GET['id'];

        $data['populer'] = $this->info->getPopuler();
        $data['category'] = $this->info->getAllType();
        $data['detail_information'] = $this->info->getInformation_by_id($id);
        $data['content']     = 'webview/information/detail_information_view';
        $data['content_js'] = 'webview/information/information_js';
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
            $this->info->update_counter(urldecode($id));
        }
    }

    function populer_section($page = 0)
    {
        $limit = 2; //limit show data per page

        $page = $this->input->get("page");

        // Row position
        if ($page != 0) {
            $page = ($page - 1) * $limit;
        }

        $allcount = $this->info->getCountDataPopuler(); //count data
        //konfigurasi pagination

        $config['base_url'] = site_url() . 'information/populer_section'; //site url
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


        $data['all_populer'] = $this->info->getPagPopuler($config["per_page"], $data['page']); //get show data on paggination

        $data['total'] = $allcount;
        $data['rowperpagenya'] = $limit;
        $data['row'] = $page;
        $data['pagination'] = $this->pagination->create_links();
        $data['banner'] = $this->info->getBanner();

        $data['category'] = $this->info->getAllType();
        $data['content']     = 'webview/information/popular_view';
        $data['content_js'] = 'webview/information/information_pop_js';
        $this->load->view('_parts/wrapper', $data);
    }

    public function popular_type($page = 0)
    {

        $limit = 2; //limit show data per page
        $urist = $this->uri->segment(2);
        $page = $this->input->get("page");
        $st = $this->input->get('st_p');
        $cat = $this->input->get('cat_p');
        $sh = $this->input->get('sh_p');

        // Row position
        if ($page != 0) {
            $page = ($page - 1) * $limit;
        }

        $allcount = $this->info->getCountDataPopuler($page); //count data

        //konfigurasi pagination


        // condtion if category have search

        if ($urist == "popular_type") {
            if ($cat == 'All') {
                $config['base_url'] = site_url() . 'information/popular_type?sh_p=' . $sh; //site url
            } else {
                $config['base_url'] = site_url() . 'information/popular_type?sh_p=' . $sh . '&cat_p=' . $cat; //site url
            }
        } else {
            $config['base_url'] = site_url() . 'information/popular_type?cat_p=' . $cat; //site url
        }
        // if($urist=="newest_search"){
        //     if($cat=='All'){
        //         $config['base_url'] = site_url() . 'information/newest_search?st_n='.$st; //site url
        //     }else{
        //         $config['base_url'] = site_url() . 'information/newest_search?st_n='.$st.'&cat_n='.$cat; //accommodate search and sort category
        //     }
        //     }else{
        //         $config['base_url'] = site_url() . 'information/newest_type?cat_n='.$cat; //site url
        // }




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

        $data['all_populer'] = $this->info->getPagPopuler($config["per_page"], $data['page']); //get show data on paggination with category and or search

        $data['total'] = $allcount;
        $data['rowperpagenya'] = $limit;
        $data['row'] = $page;
        $data['pagination'] = $this->pagination->create_links();
        $data['banner'] = $this->info->getBanner();

        $data['category'] = $this->info->getAllType();
        $data['content']     = 'webview/information/popular_view';
        $data['content_js'] = 'webview/information/information_pop_js';
        $this->load->view('_parts/wrapper', $data);
    }

    public function popular_search($page = 0)
    {
        $limit = 2; //limit show data per page
        $urist = $this->uri->segment(2);
        $page = $this->input->get("page");
        $st = $this->input->get('st_p');
        $cat = $this->input->get('cat_p');
        $sh = $this->input->get('sh_p');
        // Row position
        if ($page != 0) {
            $page = ($page - 1) * $limit;
        }

        $allcount = $this->info->getCountDataPopuler($page); //count data


        //konfigurasi pagination

        //condtion if search have category

        if ($urist == "popular_search") {
            if ($cat == 'All') {
                $config['base_url'] = site_url() . 'information/popular_search?st_p=' . $st; //site url
            } else {
                $config['base_url'] = site_url() . 'information/popular_search?st_p=' . $st . '&cat_p=' . $cat . '&sh_p=' . $sh; //accommodate search and sort category
            }
        } else {
            $config['base_url'] = site_url() . 'information/popular_search?st_p=' . $st; //site url
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

        $data['all_populer'] = $this->info->getPagPopuler($config["per_page"], $data['page']); //get show data on paggination with category and or search

        $data['total'] = $allcount;
        $data['rowperpagenya'] = $limit;
        $data['row'] = $page;
        $data['pagination'] = $this->pagination->create_links();
        $data['banner'] = $this->info->getBanner();


        $data['category'] = $this->info->getAllType();
        $data['content']     = 'webview/information/popular_view';
        $data['content_js'] = 'webview/information/information_pop_js';
        $this->load->view('_parts/wrapper', $data);
    }


    function newest_section($page = 0)
    {
        $limit = 2; //limit show data per page

        $page = $this->input->get("page");

        // Row position
        if ($page != 0) {
            $page = ($page - 1) * $limit;
        }

        $allcount = $this->info->getCountDataTerbaru(); //count data
        //konfigurasi pagination

        $config['base_url'] = site_url() . 'information/newest_section'; //site url
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


        $data['all_terbaru'] = $this->info->getPagTerbaru($config["per_page"], $data['page']); //get show data on paggination

        $data['total'] = $allcount;
        $data['rowperpagenya'] = $limit;
        $data['row'] = $page;
        $data['pagination'] = $this->pagination->create_links();

        $data['banner'] = $this->info->getBanner();

        // $data['terbaru'] = $this->info->getTerbaru();
        $data['category'] = $this->info->getAllType();
        $data['content']     = 'webview/information/terbaru_view';
        $data['content_js'] = 'webview/information/information_new_js';
        $this->load->view('_parts/wrapper', $data);
    }

    public function newest_type($page = 0)
    {

        $limit = 2; //limit show data per page
        $urist = $this->uri->segment(2);
        $page = $this->input->get("page");
        $st = $this->input->get('st_n');
        $cat = $this->input->get('cat_n');
        $sh = $this->input->get('sh_n');

        // Row position
        if ($page != 0) {
            $page = ($page - 1) * $limit;
        }

        $allcount = $this->info->getCountDataTerbaru($page); //count data

        //konfigurasi pagination


        // condtion if category have search

        if ($urist == "newest_type") {
            if ($cat == 'All') {
                $config['base_url'] = site_url() . 'information/newest_type?sh_n=' . $sh; //site url
            } else {
                $config['base_url'] = site_url() . 'information/newest_type?sh_n=' . $sh . '&cat_n=' . $cat; //site url
            }
        } else {
            $config['base_url'] = site_url() . 'information/newest_type?cat_n=' . $cat; //site url
        }
        // if($urist=="newest_search"){
        //     if($cat=='All'){
        //         $config['base_url'] = site_url() . 'information/newest_search?st_n='.$st; //site url
        //     }else{
        //         $config['base_url'] = site_url() . 'information/newest_search?st_n='.$st.'&cat_n='.$cat; //accommodate search and sort category
        //     }
        //     }else{
        //         $config['base_url'] = site_url() . 'information/newest_type?cat_n='.$cat; //site url
        // }




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

        $data['all_terbaru'] = $this->info->getPagTerbaru($config["per_page"], $data['page']); //get show data on paggination with category and or search

        $data['total'] = $allcount;
        $data['rowperpagenya'] = $limit;
        $data['row'] = $page;
        $data['pagination'] = $this->pagination->create_links();
        $data['banner'] = $this->info->getBanner();

        $data['category'] = $this->info->getAllType();
        $data['content']     = 'webview/information/terbaru_view';
        $data['content_js'] = 'webview/information/information_new_js';
        $this->load->view('_parts/wrapper', $data);
    }

    public function newest_search($page = 0)
    {
        $limit = 2; //limit show data per page
        $urist = $this->uri->segment(2);
        $page = $this->input->get("page");
        $st = $this->input->get('st_n');
        $cat = $this->input->get('cat_n');
        $sh = $this->input->get('sh_n');
        // Row position
        if ($page != 0) {
            $page = ($page - 1) * $limit;
        }

        $allcount = $this->info->getCountDataTerbaru($page); //count data


        //konfigurasi pagination

        //condtion if search have category

        if ($urist == "newest_search") {
            if ($cat == 'All') {
                $config['base_url'] = site_url() . 'information/newest_search?st_n=' . $st; //site url
            } else {
                $config['base_url'] = site_url() . 'information/newest_search?st_n=' . $st . '&cat_n=' . $cat . '&sh_n=' . $sh; //accommodate search and sort category
            }
        } else {
            $config['base_url'] = site_url() . 'information/newest_search?st_n=' . $st; //site url
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

        $data['all_terbaru'] = $this->info->getPagTerbaru($config["per_page"], $data['page']); //get show data on paggination with category and or search

        $data['total'] = $allcount;
        $data['rowperpagenya'] = $limit;
        $data['row'] = $page;
        $data['pagination'] = $this->pagination->create_links();

        $data['banner'] = $this->info->getBanner();

        $data['category'] = $this->info->getAllType();
        $data['content']     = 'webview/information/terbaru_view';
        $data['content_js'] = 'webview/information/information_new_js';
        $this->load->view('_parts/wrapper', $data);
    }
}
