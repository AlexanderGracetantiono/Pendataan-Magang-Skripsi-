<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class c_root extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('security');
        $this->load->model('fetch_data');
        $this->load->library('encrypt');
        $this->load->model('post_data');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    }
    public function index()
    {
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect('home');
        } else {
            if ($this->session->userdata('adm_status') == "CRUD_ROOT") {

                $this->form_validation->set_rules('nama', "Nama", 'min_length[2]|max_length[100]|required');
                $this->form_validation->set_rules('telp', "Nomor Telephone", 'min_length[12]|max_length[16]|is_numeric|required');
                $this->form_validation->set_rules('akses', "Level Akses", 'required');
                $this->form_validation->set_rules('pass', "Password", 'required');
                $this->form_validation->set_rules('c_pass', "Konfirmasi Password", 'required');
                if ($this->form_validation->run() == FALSE || $this->input->post('c_pass') != $this->input->post('pass')) { // First load, or problem with form
                    $this->load->view('common/header');
                    $this->load->view('nav/top_nav');
                    $this->load->view('admin/index');
                    $this->load->view('common/footer');
                } else {

                    $password = $this->input->post('pass');
                    // double Hash
                    $hash1 = $this->encrypt->sha1($password);
                    $hash2 = $this->encrypt->sha1($hash1);


                    $user_data = array(
                        'nama' => $this->input->post('nama'),
                        'telp' => $this->input->post('telp'),
                        'status' => $this->input->post('akses'),
                        'isLogin' => 0,
                        'wowaka'  => $hash2,
                        // 'c_pass'  => $this->input->post('c_pass'),
                    );
                    if ($this->post_data->save_admin($user_data)) {
                        $data['text1'] = "Penginputan Data Admin Berhasil";
                        $this->load->view('common/header');
                        $this->load->view('nav/top_nav');
                        $this->load->view('exit/success', $data);
                        $this->load->view('common/footer');
                    } else {
                        $data['text1'] = "Penginputan Data Admin Gagal";
                        $this->load->view('common/header');
                        $this->load->view('nav/top_nav');
                        $this->load->view('exit/fail', $data);
                        $this->load->view('common/footer');
                    }
                    // $this->load->view('common/header');
                    // $this->load->view('nav/top_nav');
                    // $this->load->view('admin/index');
                    // $this->load->view('common/footer');
                }
            } else {
                redirect('home');
            }
        }
    }
    // public function c_r_for_me()
    // {
    //     $password = "hello123!@#";
    //     // double Hash
    //     $hash1 = $this->encrypt->sha1($password);
    //     $hash2 = $this->encrypt->sha1($hash1);

    //     $user_data = array(
    //         'NIK' => "1234",
    //         'Nama' => "Jessica Amazy",
    //         'StatusKerja' => "Admin",
    //         'password'  => $hash2,
    //         'access_level' => 3,
    //         // 'c_pass'  => $this->input->post('c_pass'),
    //     );
    //     if ($this->post_data->save_admin($user_data)) {
    //         $data['text1'] = "Penginputan Data Admin Berhasil";
    //         $this->load->view('common/header');
    //         $this->load->view('nav/top_nav');
    //         $this->load->view('exit/success', $data);
    //         $this->load->view('common/footer');
    //     } else {
    //         $data['text1'] = "Penginputan Data Admin Gagal";
    //         $this->load->view('common/header');
    //         $this->load->view('nav/top_nav');
    //         $this->load->view('exit/fail', $data);
    //         $this->load->view('common/footer');
    //     }
    // }

    public function detail()
    {
        $screen = $this->uri->segment(2);
        $id = $this->uri->segment(3);
        if ($screen == 'magang') {
            $data['detail_magang'] = $this->fetch_data->get_magang($id);
            $this->load->view('common/header');
            $this->load->view('nav/top_nav');
            $this->load->view('detail/magang', $data);
            $this->load->view('common/footer');
        }
    }
    public function verif()
    {
        $id = $this->input->post('kode_magang');
        $nim = $this->input->post('nim');
        $verif = $this->input->post('verif');
        $this->post_data->verif_magang($id, $verif);
        if ($verif == 1) {
            $this->post_data->update_data('NIM', $nim, 'data_mahasiswa', 'KodeMagang', $id);
            $this->post_data->update_data('NIM', $nim, 'data_mahasiswa', 'Status', 'Boleh Magang');
        } else if ($verif == 2) {
            $this->post_data->update_data('NIM', $nim, 'data_mahasiswa', 'Status', 'Ditolak');
            $this->post_data->update_data('NIM', $nim, 'data_mahasiswa', 'KodeMagang', '');
        } else if ($verif == 0) {
            $this->post_data->update_data('NIM', $nim, 'data_mahasiswa', 'Status', 'Dibatalkan');
            $this->post_data->update_data('NIM', $nim, 'data_mahasiswa', 'KodeMagang', '');
        }
        redirect("detail/magang/$id");
    }
}
