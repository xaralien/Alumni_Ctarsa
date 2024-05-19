<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autentic extends CI_Controller
{


  function __construct()
  {
    parent::__construct();

    $this->load->model('User_m', 'user');

    // $this->load->model('Model', 'home');
  }
  public function index()
  {

    $data['content']     = 'webview/user/login_view.php';
    $data['content']     = 'webview/user/signup_view.php';
    $this->load->view('_parts/wrapper', $data);
  }

  function login()
  {
    if ($this->session->userdata('user_logged_in') == 'true') {
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
          'user_user_id'   => $user->id,
          'fullname'  => $user->full_name,
          'id_mast_school'  => $user->id_mast_school,
          'id_role'      => $user->id_role,
          // 'user_email'      => $user->email,
          'last_acces_time'      => $user->last_acces,
          'user_logged_in' => true
        ]);
        redirect('home');
      } else {
        echo "GAGAL";
      }
    }


    $data['content']     = 'webview/auth/login_view';
    // $data['content_js'] = 'layouts/webview/home/home_js';
    $this->load->view('_parts/wrapper_auth', $data);


    if ($this->input->post('remember_me')) {
      // Set a cookie to remember the user's login state
      $cookie_data = array(
        'name'   => 'remember_me',
        'value'  => 'user_id', // Replace with the user's identifier or token
        'expire' => 604800, // 7 days
      );

      $this->input->set_cookie($cookie_data);
    }
  }

  public function auto_login()
  {
    if ($this->input->cookie('remember_me')) {
      $user_id = $this->input->cookie('remember_me');
      // Automatically log in the user based on the user_id or token
      // You'll need to have your own login logic here.
    }
  }

  public function logout()
  {
    delete_cookie('remember_me');
    // Perform the regular logout operations
  }

  public function signup()
  {
    $nisn_r   = '';
    $email_r  = '';

    $this->db->select('*');
    $this->db->from('_users');
    $user = $this->db->get()->result();

    foreach ($user as $u) {
      $nisn_r   = $u->nisn;
      $email_r  = $u->email;
    }

    if ($nisn_r == $this->input->post('nisn')) {
      return false;
    } else if ($email_r == $this->input->post('email')) {
      return false;
    } else {

      $enc_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

      $this->load->helper('string');
      $token_id = random_string('alnum', 32);

      $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

      $data = array(
        'created'         => $date->format('Y-m-d H:i:s'),
        'full_name'       => $this->input->post('namalengkap'),
        'nisn'            => $this->input->post('nisn'),
        'email'           => $this->input->post('email'),
        'id_mast_school'  => $this->input->post('sekolah'),
        'year_graduate'   => $this->input->post('tahunlulus'),
        'phone'           => $this->input->post('nomor'),
        'approval_user'   => -1,
        'active'          => 1,
        'password'        => $enc_password,
        'birth_date'      =>  $this->input->post('tanggallahir'),
        'token'           => $token_id
      );

      $this->user->save($data);



      $subjek = 'Confirmation Email';
      $pesan =
        '
                <!DOCTYPE html>
        <html>
        <head>
          <title>Email Confirmation</title>
        </head>
        <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">

          <table width="100%" cellspacing="0" cellpadding="0" bgcolor="#f4f4f4">
            <tr>
              <td align="center" style="padding: 40px 0;">
                <table width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="border-radius: 10px; box-shadow: 0px 4px 10px rgba(0,0,0,0.1);">
                  <tr>
                    <td align="center" style="padding: 40px 20px;">
                    <img src="https://drive.google.com/uc?export=view&id=1_ceFw-4a-BiqHNlIav7R7izGDLtGt1sJ" alt="Logo" style="max-width: 100%; height: auto;">
                      <h1 style="color: #333333;">Confirm Your Email Address</h1>
                      <p style="color: #555555; font-size: 16px; line-height: 24px;">Tap the button below to confirm your email address. If you didnt create an account with us, you can safely ignore this email.</p>
                      <br>
                      <p style="color: #555555; font-size: 16px; line-height: 24px;">Or click this following link : ' . site_url('autentic/confirm_email/' . $token_id) . '</p>
                      <a href="' . site_url('autentic/confirm_email/' . $token_id) . '" style="display: inline-block; padding: 12px 24px; background-color: #1a82e2; color: #ffffff; text-decoration: none; border-radius: 6px; font-weight: bold; font-size: 16px;">Confirm Email</a>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>

        </body>
        </html>


            ';
      // $pesan = nl2br(htmlspecialchars($pesan_raw));

      // print_r($alumni);
      $config['useragent'] = "CodeIgniter";
      $config['mailpath'] = "/usr/bin/sendmail";
      $config['protocol']     = "smtp";
      $config['smtp_host']     = "smtp.gmail.com";
      $config['smtp_port']     = 465;
      $config['smtp_user']     = "dimasuciha126@gmail.com";
      $config['smtp_pass']     = "uhxirjcvsipwmkty";
      $config['smtp_crypto']     = "ssl";
      $config['charset']         = "utf-8";
      $config['mailtype'] = "html";
      $config['newline'] = "\r\n";
      $config['smtp_timeout'] = 30;
      $config['wordwrap'] = TRUE;

      $this->load->library('email');
      $this->email->initialize($config);
      $this->email->from('dimasuciha126@gmail.com', 'Yuuta Togashi');
      $this->email->to($this->input->post('email'));
      $this->email->subject($subjek);

      $this->email->message($pesan);

      if ($this->email->send()) {
        $email = ' Sukses! email berhasil dikirim.';
      } else {
        $email =  'Error! email gagal dikirim.';
      }
      $data = array("status" => 'berhasil', "email" => $email);
      echo json_encode($data);
    }
  }

  public function confirm_email($token)
  {
    $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
    $this->user->update(
      array(

        'approval_user'       => 0,

      ),
      array('token' => $token)
    );
    redirect('user/approval_wait');
  }

  public function resetpassword()
  {
    $this->db->select('*');
    $this->db->from('_users');
    $this->db->where('email', $this->input->post('email'));
    $user = $this->db->get()->result();

    if (!empty($user)) {


      $this->load->helper('string');
      $token_id = random_string('alnum', 32);

      $this->user->update(
        array(

          'token_reset'       => $token_id,

        ),
        array('email' => $this->input->post('email'))
      );



      $subjek = 'Reset Password Confirmation';
      $pesan =
        '
                <!DOCTYPE html>
        <html>
        <head>
          <title>Reset Password Confirmation</title>
        </head>
        <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
        
          <table width="100%" cellspacing="0" cellpadding="0" bgcolor="#f4f4f4">
            <tr>
              <td align="center" style="padding: 40px 0;">
                <table width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="border-radius: 10px; box-shadow: 0px 4px 10px rgba(0,0,0,0.1);">
                  <tr>
                    <td align="center" style="padding: 40px 20px;">
                    <img src="https://drive.google.com/uc?export=view&id=1_ceFw-4a-BiqHNlIav7R7izGDLtGt1sJ" alt="Logo" style="max-width: 100%; height: auto;">
                      <h1 style="color: #333333;">Confirm Your Email Address</h1>
                      <p style="color: #555555; font-size: 16px; line-height: 24px;">Tap the button below to confirm your email address. If you didnt create an account with us, you can safely ignore this email.</p>
                      <br>
                      <p style="color: #555555; font-size: 16px; line-height: 24px;">Or click this following link : ' . site_url('autentic/confirm_reset/' . $token_id) . '</p>
                      <a href="' . site_url('autentic/confirm_reset/' . $token_id) . '" style="display: inline-block; padding: 12px 24px; background-color: #1a82e2; color: #ffffff; text-decoration: none; border-radius: 6px; font-weight: bold; font-size: 16px;">Confirm Email</a>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        
        </body>
        </html>
        
        
            ';
      // $pesan = nl2br(htmlspecialchars($pesan_raw));

      // print_r($alumni);
      $config['useragent'] = "CodeIgniter";
      $config['mailpath'] = "/usr/bin/sendmail";
      $config['protocol']     = "smtp";
      $config['smtp_host']     = "smtp.gmail.com";
      $config['smtp_port']     = 465;
      $config['smtp_user']     = "dimasuciha126@gmail.com";
      $config['smtp_pass']     = "uhxirjcvsipwmkty";
      $config['smtp_crypto']     = "ssl";
      $config['charset']         = "utf-8";
      $config['mailtype'] = "html";
      $config['newline'] = "\r\n";
      $config['smtp_timeout'] = 30;
      $config['wordwrap'] = TRUE;

      $this->load->library('email');
      $this->email->initialize($config);
      $this->email->from('dimasuciha126@gmail.com', 'Yuuta Togashi');
      $this->email->to($this->input->post('email'));
      $this->email->subject($subjek);

      $this->email->message($pesan);

      if ($this->email->send()) {
        echo ' Sukses! email berhasil dikirim.';
      } else {
        echo  'Error! email gagal dikirim.';
      }
      redirect('user/passwordnotif');
    } else {
      redirect('home');
    }
  }
  public function tes($token)
  {
    $this->db->select('*');
    $this->db->from('_users');
    $this->db->where('token_reset', $token);
    $user = $this->db->get()->result();
    foreach ($user as $u) {
      $email = $u->email;
    }
    echo $email;
  }
  public function confirm_reset($token)
  {
    $this->db->select('*');
    $this->db->from('_users');
    $this->db->where('token_reset', $token);
    $user = $this->db->get()->row();
    $email = $user->email;
    if (!empty($user)) {
      $password_temp = rand();
      $enc_password = password_hash($password_temp, PASSWORD_DEFAULT);

      $this->user->update(
        array(

          'password'       => $enc_password,
          'token_reset' => null
        ),
        array('token_reset' => $token)
      );



      $subjek = 'Reset Password Berhasil';
      $pesan =
        '
                <!DOCTYPE html>
        <html>
        <head>
          <title>Reset Password Berhaso;</title>
        </head>
        <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
        
          <table width="100%" cellspacing="0" cellpadding="0" bgcolor="#f4f4f4">
            <tr>
              <td align="center" style="padding: 40px 0;">
                <table width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="border-radius: 10px; box-shadow: 0px 4px 10px rgba(0,0,0,0.1);">
                  <tr>
                    <td align="center" style="padding: 40px 20px;">
                    <img src="https://drive.google.com/uc?export=view&id=1_ceFw-4a-BiqHNlIav7R7izGDLtGt1sJ" alt="Logo" style="max-width: 100%; height: auto;">
                      <h1 style="color: #333333;">Confirm Your Email Address</h1>
                      <p style="color: #555555; font-size: 16px; line-height: 24px;">Tap the button below to confirm your email address. If you didnt create an account with us, you can safely ignore this email.</p>
                        <h3 style="display: inline-block; padding: 12px 24px; background-color: #1a82e2; color: #ffffff; text-decoration: none; border-radius: 6px; font-weight: bold; font-size: 16px;">' . $password_temp . ' </h3> 
                      </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        
        </body>
        </html>
        
        
            ';
      // $pesan = nl2br(htmlspecialchars($pesan_raw));

      // print_r($alumni);
      $config['useragent'] = "CodeIgniter";
      $config['mailpath'] = "/usr/bin/sendmail";
      $config['protocol']     = "smtp";
      $config['smtp_host']     = "smtp.gmail.com";
      $config['smtp_port']     = 465;
      $config['smtp_user']     = "dimasuciha126@gmail.com";
      $config['smtp_pass']     = "uhxirjcvsipwmkty";
      $config['smtp_crypto']     = "ssl";
      $config['charset']         = "utf-8";
      $config['mailtype'] = "html";
      $config['newline'] = "\r\n";
      $config['smtp_timeout'] = 30;
      $config['wordwrap'] = TRUE;

      $this->load->library('email');
      $this->email->initialize($config);
      $this->email->from('dimasuciha126@gmail.com', 'Yuuta Togashi');
      $this->email->to($email);
      $this->email->subject($subjek);

      $this->email->message($pesan);

      if ($this->email->send()) {
        echo ' Sukses! email berhasil dikirim.';
      } else {
        echo  'Error! email gagal dikirim.';
      }
      redirect('user/berhasil_reset_password');
    } else {
      redirect('home');
    }
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
