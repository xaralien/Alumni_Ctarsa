<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UpdateProfile extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        if ($this->uri->uri_string() !== 'login' && !$this->session->userdata('users_logged_in')) {
            $this->session->set_flashdata('error', 'Access denied. You need to login first!');
            redirect('user/login');
        };

        $this->load->model('UpdateProfile_m', 'upprof');
        $this->load->model('user_m', 'user');
    }
    public function index()
    {

        // $id_edit = $this->input->get('header');
        $school = $this->user->getsekolah();
        $id = $this->session->userdata('users_id');
        $detail = $this->upprof->get_id_edit($id);
        $sosmed = $this->user->getsosmed($this->session->userdata('users_id'));
        if (empty($sosmed)) {
            $alamat = null;
            $fb = null;
            $instagram = null;
            $tiktok = null;
            $linkedin = null;
            $instansi = null;
        } else {
            $alamat = $sosmed->alamat;
            $fb = $sosmed->facebook;
            $instagram = $sosmed->instagram;
            $tiktok = $sosmed->tiktok;
            $linkedin = $sosmed->linkedin;
            $instansi = $sosmed->instansi;
        }

        foreach ($detail as $d) {
            $path = $this->ppaatthh . 'user_avatar/' . $d->avatar;
            $data['id'] = $id;
            $data['avatar'] = $path;
            $data['namalengkap'] = $d->full_name;
            $data['email'] = $d->email;
            $data['tahunlulus'] = $d->year_graduate;
            $data['sekolah'] = $d->id_mast_school;
            $data['school'] = $school;
            $data['nisn'] = $d->nisn;
            $data['nomor'] = $d->phone;
            $data['cekula'] = $d->school_name;
            // $data['angkatan'] = $d->nama_angkatan;
            $data['tanggallahir'] = $d->birth_date;
            $data['alamat'] = $alamat;
            $data['facebook'] = $fb;
            $data['instagram'] = $instagram;
            $data['tiktok'] = $tiktok;
            $data['linkedin'] = $linkedin;
            $data['instansi'] = $instansi;
        }
        $filledFields = count(array_filter($data));

        // Determine the total number of fields
        $totalFields = count($data);

        // Calculate the percentage
        $percentageFilled = ($filledFields / $totalFields) * 100;
        $roundedPercentage = round($percentageFilled);

        $data['persen'] = $roundedPercentage;


        $data['content']     = 'webview/updateprofile/updateprofile_view';
        $data['content_js'] = 'webview/updateprofile/updateprofile_js';
        $this->load->view('_parts/wrapper', $data);
    }

    public function ganti_password()
    {
        $password_asli = $this->input->post('password1');
        $password_baru = $this->input->post('password2');
        $password_confirm = $this->input->post('password3');



        $this->db->select('*');
        $this->db->from('_users');
        $this->db->where('email', $this->session->userdata('users_email'));
        $user = $this->db->get()->row();

        if (!empty($user) && password_verify($password_asli, $user->password)) {
            if ($password_baru == $password_confirm) {
                $this->user->update(
                    array(

                        'password'       => password_hash($password_baru, PASSWORD_DEFAULT),
                        'token_reset' => null
                    ),
                    array('email' => $this->session->userdata('users_email'))
                );
                redirect('updateprofile');
            }
        }
        redirect('home');
    }
    public function update()
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        // $id = $this->input-post('id_update');
        $angkatan = $this->input->post('angkatan');
        $angkatan = strtoupper($angkatan);

        $data_update = [
            'full_name' => $this->input->post('fullname'),
            'birth_date' => $this->input->post('tanggal_lahir'),
            'year_graduate' => $this->input->post('tahun_lulus'),
            'full_name' => $this->input->post('fullname'),
            'id_mast_school' => $this->input->post('school'),
            // 'nama_angkatan' => $angkatan,
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('notelp'),
            'updated'           => $date->format('Y-m-d H:i:s'),
            'updated_by'        => $this->session->userdata('users_id'),
        ];

        $this->user->update($data_update, array('id' => $this->input->post('id_update')));
        echo json_encode(array("status" => TRUE));
    }
    public function update_gambar()
    {
        $nama = $this->session->userdata('users_fullname');
        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

        $config['upload_path'] = $this->sitepath . 'user_avatar/'; // Same as the config file
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['file_name'] = 'avatar_' . $nama;


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('image_edit')) {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $thumbnail = $image_data['file_name'];
            $data_update['avatar'] = $thumbnail;

            $data_update = [
                'updated'           => $date->format('Y-m-d H:i:s'),
                'updated_by'        => $this->session->userdata('users_id'),
                'avatar'            => $thumbnail,
            ];
            $this->user->update($data_update, array('id' => $this->session->userdata('users_id')));
        }



        echo json_encode(array("status" => TRUE));
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

    public function update_sosmed()
    {
        // $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        // $id = $this->input-post('id_update');\
        $sosmed = $this->user->getsosmed($this->session->userdata('users_id'));
        if (empty($sosmed)) {
            $data_sosmed = [
                'id_users_header' => $this->session->userdata('users_id'),
                'alamat' => $this->input->post('alamat'),
                'facebook' => $this->input->post('facebook'),
                'instagram' => $this->input->post('instagram'),
                'tiktok' => $this->input->post('tiktok'),
                'linkedin' => $this->input->post('linkedin'),
                'instansi' => $this->input->post('instansi'),

            ];

            $this->user->save_sosmed($data_sosmed);
        } else {
            $sosmed = $sosmed->id;
            $data_update = [
                'alamat' => $this->input->post('alamat'),
                'facebook' => $this->input->post('facebook'),
                'instagram' => $this->input->post('instagram'),
                'tiktok' => $this->input->post('tiktok'),
                'linkedin' => $this->input->post('linkedin'),
                'instansi' => $this->input->post('instansi'),
            ];

            $this->user->update_sosmed($data_update, array('id' => $sosmed));
        }

        echo json_encode(array("status" => TRUE));
    }
}
