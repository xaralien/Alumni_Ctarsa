<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('users_logged_in') == 'true') {
        //     redirect('home');
        // }


        $this->load->model('User_m', 'user');
    }
    public function index()
    {

        $this->signup();
    }

    public function login()
    {
        if ($this->session->userdata('users_logged_in') == 'true') {
            redirect('home');
        }

        $this->load->library('form_validation');
        $this->load->model('User_m', 'login');



        $this->form_validation->set_rules(
            'username',
            'username',
            'trim|required|min_length[2]|max_length[100]'
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[3]'
        );

        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $active     = 1;
            $approval_user = 1;


            $user = $this->login->user_login($username, $password, $active, $approval_user);

            if (!empty($user)) {
                $this->session->set_userdata([
                    'users_id'                      => $user->id,
                    'users_email'                   => $user->email,
                    'users_fullname'                => $user->full_name,
                    'id_mast_school'                => $user->id_mast_school,
                    'users_last_acces_time'         => $user->last_acces,
                    'users_logged_in'               => true
                ]);
                redirect('home');
            } else {
                echo '<script type="text/javascript">

                alert("Akun anda tidak terdaftar")
                
                </script>';
            }
        }


        $data['content']     = 'webview/user/login_view';
        // $data['content_js'] = 'layouts/webview/home/home_js';
        $this->load->view('_parts/wrapper', $data);
    }

    public function signup()
    {

        $data['sekolah']    = $this->user->getsekolah();
        $data['content']     = 'webview/user/signup_view';
        $data['content_js']     = 'webview/user/signup_view_js';
        $this->load->view('_parts/wrapper', $data);
    }

    public function logout()
    {

        $this->session->unset_userdata('users_id');
        $this->session->unset_userdata('users_fullname');
        $this->session->unset_userdata('users_logged_in');
        // $this->session->unset_userdata('user_email');
        $this->session->sess_destroy();

        // $url = base_url();
        redirect('user/login');
    }

    public function testyoga()
    {
        echo "hiyo";

        // $this->session->unset_userdata('users_id');
        // $this->session->unset_userdata('users_fullname');
        // $this->session->unset_userdata('users_logged_in');
        // // $this->session->unset_userdata('user_email');
        // $this->session->sess_destroy();

        // // $url = base_url();
        // redirect('user/login');
    }

    public function verificationnotif()
    {

        $data['content']     = 'webview/verification/emailnotif';
        $data['content_js'] = 'webview/forum/forum_js';
        $this->load->view('_parts/wrapper', $data);
    }

    public function approval_wait()
    {

        $data['content']     = 'webview/verification/approvalwait';
        $data['content_js'] = 'webview/forum/forum_js';
        $this->load->view('_parts/wrapper', $data);
    }

    public function resetpassword()
    {

        $data['content']     = 'webview/verification/emailverif';
        $data['content_js'] = 'webview/forum/forum_js';
        $this->load->view('_parts/wrapper', $data);
    }

    public function passwordnotif()
    {

        $data['content']     = 'webview/verification/passwordnotif';
        $data['content_js'] = 'webview/forum/forum_js';
        $this->load->view('_parts/wrapper', $data);
    }
    public function berhasil_reset_password()
    {

        $data['content']     = 'webview/verification/resetsuccess';
        $data['content_js'] = 'webview/forum/forum_js';
        $this->load->view('_parts/wrapper', $data);
    }

    // public function save()
    // {
    //     $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
    //     $this->poling->save(
    //         array(

    //             'created'           => $date->format('Y-m-d H:i:s'),
    //             'id_capres'      => $this->input->post('capres'),
    //             'id_cawapres'      => $this->input->post('cawapres'),
    //         ),
    //         array('id' => $this->input->post('id_add'))
    //     );
    //     echo json_encode(array("status" => TRUE));
    // }
}
