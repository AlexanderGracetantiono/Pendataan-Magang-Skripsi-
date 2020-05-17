<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class c_home extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('cart');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->helper('security');
    $this->load->model('fetch_data');
    $this->load->model('post_data');
    $this->load->model('sign_in');
    $this->load->library('encrypt');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
  }

  public function index()
  {
    if ($this->session->userdata('logged_in') == FALSE) {
      redirect('login');
    } else {
      // $data['list_warga'] = $this->fetch_data->fetch_list_warga();
      $data['heading'] = "List Warga Terdaftar";
      $this->load->view('common/header');
      $this->load->view('nav/top_nav');
      if ($this->session->userdata('access_level') == 1) {
        $data['mahasiswa'] = $this->fetch_data->get_mhs($this->session->userdata('id'));
        // $data['data_magang'] = $this->fetch_data->get_magang($this->session->userdata('kode_magang'));
        $data['data_magang'] = $this->fetch_data->get_magang($this->session->userdata('kode_magang'));
        $data['kode'] = $this->session->userdata('kode_magang');
        $data['data_week'] = $this->fetch_data->get_week($this->session->userdata('kode_magang'));
        $this->load->view('detail/mahasiswa', $data);
      } else {
        $data['karyawan'] = $this->fetch_data->get_admin($this->session->userdata('id'));
        $data['count_verif'] = $this->fetch_data->count('data_magang', 'Verifikasi', '0');
        $data['count_mhs'] = $this->fetch_data->count('data_mahasiswa', 'Status', 'Belum Magang');
        $data['count_tolak'] = $this->fetch_data->count('data_magang', 'Verifikasi', '2');
        $this->load->view('detail/karyawan', $data);
      }
      $this->load->view('common/footer');
    }
  }
  public function detail_mhs()
  {
    if ($this->session->userdata('logged_in') == FALSE) {
      redirect('login');
    } else {
      $id = $this->uri->segment(3);
      $data_mhs =  $this->fetch_data->get_mhs($id);
      if ($data_mhs->num_rows() > 0) {
        foreach ($data_mhs->result() as $row) {
          $data['valid'] = "ok";
          $data['mahasiswa'] = $data_mhs;
          $data['data_magang'] = $this->fetch_data->get_magang($row->KodeMagang);
          $data['kode'] = $row->KodeMagang;
          $data['data_week'] = $this->fetch_data->get_week($row->KodeMagang);
        }
      } else {
        $data['valid'] = "no";
      }
      $this->load->view('common/header');
      $this->load->view('nav/top_nav');
      $this->load->view('detail/mahasiswa', $data);
      $this->load->view('common/footer');
    }
  }
  public function company_form()
  {
    if ($this->session->userdata('logged_in') == FALSE) {
      redirect('login');
    } else {
      $this->form_validation->set_rules('nim', "Nomor Induk Mahasiswa", 'min_length[7]|max_length[10]|is_numeric|required');
      $this->form_validation->set_rules('industri', "Industri Perusahaan", 'min_length[5]|max_length[50]|required');
      $this->form_validation->set_rules('kis', "Kode KIS", 'required|min_length[1]|max_length[200]');
      $this->form_validation->set_rules('company_name', "Nama Perusahaan", 'required');
      $this->form_validation->set_rules('company_number', "No Telepon Perusahaan", 'min_length[10]|max_length[20]|is_numeric|required');
      $this->form_validation->set_rules('company_email', "Email Perusahaan", 'required');
      $this->form_validation->set_rules('super_name', "Nama Supervisor", 'required');
      $this->form_validation->set_rules('super_jabatan', "Jabatan Supervisor", 'required');
      $this->form_validation->set_rules('departemen', "Departement", 'required');
      $this->form_validation->set_rules('tgl', "Tanggal Magang", 'required');
      $this->form_validation->set_rules('hari', "Jumlah hari kerja", 'required');
      $this->form_validation->set_rules('alamat', "Alamat Perusahaan", 'required');
      if ($this->form_validation->run() == FALSE) {



        $this->load->view('common/header');
        $this->load->view('nav/top_nav');
        $this->load->view('form/form_company');
        $this->load->view('common/footer');
      } else {
        $kode_magang = random_string('alnum', 8);
        $NIM = $this->input->post('nim');
        $user_data = array(
          'NIM' => $NIM,
          'KodeMagang' => $kode_magang,
          'NamaIndustri' => $this->input->post('industri'),
          'Kode' => $this->input->post('kis'),
          'NamaPerusahaan' => $this->input->post('company_name'),
          'Telepon' => $this->input->post('company_number'),
          'Email' => $this->input->post('company_email'),
          'Supervisor' => $this->input->post('super_name'),
          'JabatanSupervisor' => $this->input->post('super_jabatan'),
          'Departemen' => $this->input->post('departemen'),
          'TanggalMagang' => $this->input->post('tgl'),
          'HariMagang' => $this->input->post('hari'),
          'AlamatPerusahaan' => $this->input->post('alamat'),

        );

        if ($this->post_data->save_magang($user_data)) {
          if ($this->post_data->update_data('NIM', $NIM, 'data_mahasiswa', 'KodeMagang', $kode_magang)) {
            $this->post_data->update_data('NIM', $NIM, 'data_mahasiswa', 'Status', "Menunggu Verifikasi");
            $data = array(
              'status' => "Menunggu Verifikasi"
            );
            $this->session->set_userdata($data);
            $data['text1'] = "Penginputan Data Berhasil";
            $this->load->view('common/header');
            $this->load->view('nav/top_nav');
            $this->load->view('exit/success', $data);
            $this->load->view('common/footer');
          } else {
            $data['text1'] = "Penginputan Data Mahasiswa Gagal";
            $this->load->view('common/header');
            $this->load->view('nav/top_nav');
            $this->load->view('exit/fail', $data);
            $this->load->view('common/footer');
          }
        } else {
          $data['text1'] = "Penginputan Data Gagal";
          $this->load->view('common/header');
          $this->load->view('nav/top_nav');
          $this->load->view('exit/fail', $data);
          $this->load->view('common/footer');
        }
      }
      // $data['list_warga'] = $this->fetch_data->fetch_list_warga();


    }
  }
  public function change_password()
  {
    if ($this->session->userdata('logged_in') == FALSE) {
      redirect('login');
    } else {

      $this->form_validation->set_rules('opass', "Password Lama", 'required');
      $this->form_validation->set_rules('npass', "Password Baru", 'required');
      $this->form_validation->set_rules('cpass', "Konfirmasi Password", 'required');
      if ($this->form_validation->run() == FALSE) {
        $this->load->view('common/header');
        $this->load->view('nav/top_nav');
        $this->load->view('form/change_pass');
        $this->load->view('common/footer');
      } else {
        $id = $this->session->userdata('id');
        $oldpassword = $this->input->post('opass');
        $newpassword = $this->input->post('npass');
        $conpassword = $this->input->post('cpass');
        $hash1 = $this->encrypt->sha1($oldpassword);
        $hash2 = $this->encrypt->sha1($hash1);

        $hash3 = $this->encrypt->sha1($newpassword);
        $hash4 = $this->encrypt->sha1($hash3);
        $query = $this->sign_in->does_user_exist($id);
        if ($query->num_rows() == 1) { // One matching row found
          foreach ($query->result() as $row) {
            if ($hash2 != $row->password) {
              $data['login_fail'] = true;
              $data['fail_text'] = "Password lama salah";
              $this->load->view('common/header');
              $this->load->view('nav/top_nav');
              $this->load->view('form/change_pass', $data);
              $this->load->view('common/footer');
            } else {
              if ($conpassword != $newpassword) {
                $data['login_fail'] = true;
                $data['fail_text'] = "Password Konfirmasi Salah";
                $this->load->view('common/header');
                $this->load->view('nav/top_nav');
                $this->load->view('form/change_pass', $data);
                $this->load->view('common/footer');
              } else {
                if (strlen($id) < 6) {
                  if ($this->post_data->update_data('NIK', $id, 'data_karyawan', 'password', $hash4)) {
                    $data['text1'] = "Penggantian Password Berhasil1";
                    $this->load->view('common/header');
                    $this->load->view('nav/top_nav');
                    $this->load->view('exit/success', $data);
                    $this->load->view('common/footer');
                  } else {
                    $data['text1'] = "Penggantian Password Gagal1";
                    $this->load->view('common/header');
                    $this->load->view('nav/top_nav');
                    $this->load->view('exit/fail', $data);
                    $this->load->view('common/footer');
                  }
                } else {
                  if ($this->post_data->update_data('NIM', $id, 'data_mahasiswa', 'password', $hash4)) {
                    $data['text1'] = "Penggantian Password Berhasil2";
                    $this->load->view('common/header');
                    $this->load->view('nav/top_nav');
                    $this->load->view('exit/success', $data);
                    $this->load->view('common/footer');
                  } else {
                    $data['text1'] = "Penggantian Password Gagal2";
                    $this->load->view('common/header');
                    $this->load->view('nav/top_nav');
                    $this->load->view('exit/fail', $data);
                    $this->load->view('common/footer');
                  }
                }
              }
            }
          }
        }
      }
    }
  }

  public function weekly_form()
  {
    if ($this->session->userdata('logged_in') == FALSE) {
      redirect('login');
    } else {
      $this->form_validation->set_rules('minggu', "Minggu", 'is_numeric|required');
      $this->form_validation->set_rules('comment', "Komentar", 'required');
      if ($this->form_validation->run() == FALSE) {
        $this->load->view('common/header');
        $this->load->view('nav/top_nav');
        $this->load->view('form/form_weekly');
        $this->load->view('common/footer');
      } else {
        $user_data = array(
          'KodeMagang' => $this->input->post('kode_magang'),
          'Minggu' => $this->input->post('minggu'),
          'Tanggal' => $this->input->post('tgl'),
          'Comment' => $this->input->post('comment'),
        );
        if ($this->post_data->save_perkembangan($user_data)) {
          $data['text1'] = "Penginputan Data Berhasil";
          $this->load->view('common/header');
          $this->load->view('nav/top_nav');
          $this->load->view('exit/success', $data);
          $this->load->view('common/footer');
        } else {
          $data['text1'] = "Penginputan Data Gagal";
          $this->load->view('common/header');
          $this->load->view('nav/top_nav');
          $this->load->view('exit/fail', $data);
          $this->load->view('common/footer');
        }
      }
    }
  }
  public function magang_list()
  {
    if ($this->session->userdata('logged_in') == FALSE) {
      redirect('login');
    } else {
      $data['list_magang'] = $this->fetch_data->fetch_list_magang();

      $this->load->view('common/header');
      $this->load->view('nav/top_nav');
      $this->load->view('list/magang', $data);
      $this->load->view('common/footer');
    }
  }
  public function mhs_lst()
  {
    if ($this->session->userdata('logged_in') == FALSE) {
      redirect('login');
    } else {
      $data['list_mhs'] = $this->fetch_data->fetch_list_mhs();

      $this->load->view('common/header');
      $this->load->view('nav/top_nav');
      $this->load->view('list/mhs_list_opsi', $data);
      $this->load->view('common/footer');
    }
  }
  public function mhs_list_jurusan()
  {
    if ($this->session->userdata('logged_in') == FALSE) {
      redirect('login');
    } else {
      if ($this->uri->segment(2) == 'ma') {
        $jurusan = 'Manajemen';
      } else if ($this->uri->segment(2) == 'ak') {
        $jurusan = 'Akuntansi';
      } else if ($this->uri->segment(2) == 'ti') {
        $jurusan = 'Teknik Informatika';
      } else if ($this->uri->segment(2) == 'si') {
        $jurusan = 'Sistem Informasi';
      } else if ($this->uri->segment(2) == 'bi') {
        $jurusan = 'Administrasi Bisnis';
      } else if ($this->uri->segment(2) == 'ik') {
        $jurusan = 'Ilmu Komunikasi';
      }
      $data['list_mhs'] = $this->fetch_data->get_mhs_by('Jurusan', $jurusan);
      $data['title'] = $jurusan;
      $this->load->view('common/header');
      $this->load->view('nav/top_nav');
      $this->load->view('list/mhs', $data);
      $this->load->view('common/footer');
    }
  }
  public function karyawan_list()
  {

    if ($this->session->userdata('logged_in') == FALSE) {
      redirect('login');
    } else {
      $data['list_karyawan'] = $this->fetch_data->fetch_list_karyawan();

      $this->load->view('common/header');
      $this->load->view('nav/top_nav');
      $this->load->view('list/karyawan', $data);
      $this->load->view('common/footer');
    }
  }
  public function succ()
  {
    if ($this->session->userdata('logged_in') == FALSE) {
      redirect('home');
    } else {
      $data['text1'] = "null";
      $this->load->view('common/header');
      $this->load->view('nav/top_nav');
      $this->load->view('exit/success', $data);
      $this->load->view('common/footer');
    }
  }
  public function fail()
  {
    if ($this->session->userdata('logged_in') == FALSE) {
      redirect('home');
    } else {
      $data['text1'] = "null";
      $this->load->view('common/header');
      $this->load->view('nav/top_nav');
      $this->load->view('exit/fail', $data);
      $this->load->view('common/footer');
    }
  }
  public function uploadindex()
    {
        $this->load->view('common/header');
        $this->load->view('nav/top_nav');
        $this->load->view('upload/sample');
        $this->load->view('common/footer');
    }
    public function uploadsave()
    {
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            //upload gagal
            // $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> '.$this->upload->display_errors().'</div>');
            //redirect halaman
            $data['text1'] = $this->upload->display_errors();
          $this->load->view('common/header');
          $this->load->view('nav/top_nav');
          $this->load->view('exit/fail', $data);
          $this->load->view('common/footer');

        } else {

            $data_upload = $this->upload->data();

            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('excel/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

            $data = array();
          $passwordDef="8c9a62171b4cb7af53484cefadf0590329e7c577";
          $accessLevel=1;
            $numrow = 1;
            foreach($sheet as $row){
                            if($numrow > 1){
                                array_push($data, array(
                                    'NIM' => $row['A'],
                                    'KodeMagang'      => $row['B'],
                                    'NamaMahasiswa'      => $row['C'],
                                    'Jurusan'      => $row['D'],
                                    'Angkatan'      => $row['E'],
                                    'Status'      => $row['F'],
                                    'password'      =>  $passwordDef,
                                    'access_level'      => $accessLevel,
                                ));
                    }
                $numrow++;
            }
            $this->db->insert_batch('data_mahasiswa', $data);
            //delete file from server
            unlink(realpath('excel/'.$data_upload['file_name']));

            //upload success
            // $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            //redirect halaman
            // redirect('import/');
            $data['text1'] = "Penginputan Data Berhasil";
            $this->load->view('common/header');
            $this->load->view('nav/top_nav');
            $this->load->view('exit/success', $data);
            $this->load->view('common/footer');

        }
    }
}
