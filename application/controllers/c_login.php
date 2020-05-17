<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class c_login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('security');
        $this->lang->load('en_admin', 'english');
        $this->load->library('encrypt');
        $this->load->library('form_validation');
        $this->load->model('sign_in');
        $this->load->model('fetch_data');
        $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
    }
    // public function index(){
    //     $this->load->view('login/login');
    // }
    public function index()
    {
        $data['mess'] = "";
        $this->form_validation->set_rules('id', "Nomor Id", 'required|min_length[4]|max_length[125]');
        $this->form_validation->set_rules('password', "Password", 'required|min_length[5]|max_length[30]');

        if ($this->form_validation->run() == FALSE) {
            $data['heading'] = "Login";
            $this->load->view('login/login', $data);
        } else {
            $id = $this->input->post('id');
            $password = $this->input->post('password');
            $hash1 = $this->encrypt->sha1($password);
            $hash2 = $this->encrypt->sha1($hash1);

            $query = $this->sign_in->does_user_exist($id);

            if ($query->num_rows() == 1) { // One matching row found
                foreach ($query->result() as $row) {
                    if ($hash2 != $row->password) {
                        // Didn't match so send back to login
                        $data['login_fail'] = true;
                        $data['fail_text'] = "Password salah";
                        $this->load->view('login/login', $data);
                    } else {
                        if (strlen($id) <= 6) {
                            $get_data = $this->fetch_data->get_admin($id);
                        } else {
                            $get_data = $this->fetch_data->get_mhs($id);
                        }
                        if ($get_data->num_rows() == 1) { // One matching row found
                            foreach ($get_data->result() as $row) {
                                if (strlen($id) < 6) {
                                    $data = array(
                                        'id' => $id,
                                        'access_level' => $row->access_level,
                                        'nama' => $row->Nama,
                                        'status' => $row->StatusKerja,
                                        'kode_magang' => '',
                                        'logged_in' => TRUE
                                    );
                                } else {
                                    $data = array(
                                        'id' => $id,
                                        'access_level' => $row->access_level,
                                        'nama' => $row->NamaMahasiswa,
                                        'kode_magang' => $row->KodeMagang,
                                        'status' => $row->Status,
                                        'logged_in' => TRUE
                                    );
                                }
                                $this->session->set_userdata($data);
                            }
                        }
                        redirect('home');
                    }
                }
            } else {
                $data['login_fail'] = true;
                $data['fail_text'] = "Akun tidak terdaftar";
                $this->load->view('login/login', $data);
            }
        }
        // }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
