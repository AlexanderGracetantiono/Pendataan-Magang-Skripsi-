<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class c_create extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('encrypt');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->helper('security');
    $this->load->model('fetch_data');
    $this->load->model('post_data');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
  }
  public function create_karyawan()
  {
    if ($this->session->userdata('logged_in') == FALSE) {
      redirect('login');
    } else {
      $this->form_validation->set_rules('nik', "Nomor Karyawan", 'min_length[4]|max_length[6]|is_numeric|required');
      $this->form_validation->set_rules('nama', "Nama Karyawan", 'min_length[5]|max_length[255]|required');
      $this->form_validation->set_rules('status', "Status Pekerjaan", 'required');
      $this->form_validation->set_rules('telp', "Nomor Telepon", 'required|min_length[10]|max_length[15]');

      if ($this->form_validation->run() == FALSE) {
        $this->load->view('common/header');
        $this->load->view('nav/top_nav');
        $this->load->view('form/form_create_karyawan');
        $this->load->view('common/footer');
      } else {
        $password = $this->input->post('pass');
        $hash1 = $this->encrypt->sha1($password);
        $hash2 = $this->encrypt->sha1($hash1);

        $status = $this->input->post('status');
        if ($status == 'BAAK') {
          $acc_level = 3;
        } else {
          $acc_level = 2;
        }
        $user_data = array(
          'NIK' => $this->input->post('nik'),
          'Nama' => $this->input->post('nama'),
          'StatusKerja' => $status,
          'Telepon' => $this->input->post('telp'),
          'password' => $hash2,
          'access_level' => $acc_level,
        );
        // echo $this->input->post('pass');
        // echo $this->input->post('nik');
        // echo $this->input->post('nama');
        // echo $this->input->post('status');
        // echo $this->input->post('telp');

        if ($this->post_data->save_karyawan($user_data)) {
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
  public function create_mhs()
  {
    if ($this->session->userdata('logged_in') == FALSE) {
      redirect('login');
    } else {
      $this->form_validation->set_rules('nim', "NIM", 'min_length[6]|max_length[10]|is_numeric|required');
      $this->form_validation->set_rules('nama', "Nama Mahasiswa", 'min_length[5]|max_length[255]|required');
      $this->form_validation->set_rules('jurusan', "Jurusan", 'required');

      if ($this->form_validation->run() == FALSE) {
        $this->load->view('common/header');
        $this->load->view('nav/top_nav');
        $this->load->view('form/form_create_mhs');
        $this->load->view('common/footer');
      } else {
        $password = $this->input->post('pass');
        $hash1 = $this->encrypt->sha1($password);
        $hash2 = $this->encrypt->sha1($hash1);
        $year = '20' . $this->input->post('nim')[2] . $this->input->post('nim')[3];
        $user_data = array(
          'NIM' => $this->input->post('nim'),
          'NamaMahasiswa' => $this->input->post('nama'),
          'KodeMagang' => '',
          'Jurusan' =>  $this->input->post('jurusan'),
          'Angkatan' => $year,
          'password' => $hash2,
          'Status' => $this->input->post('status'),
        );

        if ($this->post_data->save_mahasiswa($user_data)) {
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
  public function user_form()
  {
    if ($this->session->userdata('logged_in') == FALSE) {
      redirect('login');
    } else {
      // Get value first
      // $data['nama'] =  $this->get_val('nama');
      // $data['noKK'] =  $this->get_val('noKK');
      // $data['agama'] =  $this->get_val('agama');
      // $data['gender'] =  $this->get_val('gender');
      // $data['nama'] =  $this->get_val('nama');

      // Set validation rules 
      $this->form_validation->set_rules('noKK', "No Kartu Keluarga", 'min_length[10]|max_length[16]|is_numeric|required');
      $this->form_validation->set_rules('nik', "NIK", 'min_length[10]|max_length[16]|is_numeric');
      $this->form_validation->set_rules('nama', "Nama Pribadi", 'required|min_length[1]|max_length[200]');
      $this->form_validation->set_rules('tempat_lahir', "Tempat Lahir", 'required');
      $this->form_validation->set_rules('tanggal_lahir', "Tanggal Lahir", 'required');
      $this->form_validation->set_rules('agama', "Agama", 'required');
      $this->form_validation->set_rules('gender', "Jenis Kelamin", 'required');
      $this->form_validation->set_rules('status_kawin', "Status Perkawinan", 'required');
      $this->form_validation->set_rules('status_keluarga', "Status Keluarga", 'required');
      $this->form_validation->set_rules('status_pendidikan', "Status Pendidikan", 'required');
      $this->form_validation->set_rules('status_pekerjaan', "Status Pekerjaan", 'required');
      $this->form_validation->set_rules('alamat', "Alamat", 'required');
      $this->form_validation->set_rules('rt', "Nomor RT", 'required');
      $this->form_validation->set_rules('rw', "Nomor RW", 'required');
      $this->form_validation->set_rules('kota', "Nama Kota", 'required');
      $this->form_validation->set_rules('provinsi', "Nama Provinsi", 'required');
      $this->form_validation->set_rules('kecamatan', "Kecamatan", 'required');
      $this->form_validation->set_rules('warganegara', "Status Warga Negara", 'required');
      $this->form_validation->set_rules('status_penduduk', "Status Penduduk", 'required');
      // $this->form_validation->set_rules('last_name', $this->lang->line('user_details_placeholder_last_name'), 'required|min_length[1]|max_length[125]'); 
      // $this->form_validation->set_rules('email', $this->lang->line('user_details_placeholder_email'), 'required|min_length[1]|max_length[255]|valid_email'); 
      // $this->form_validation->set_rules('email_confirm', $this->lang->line('user_details_placeholder_email_confirm'), 'required|min_length[1]|max_length[255]|valid_email|matches[email]'); 
      // $this->form_validation->set_rules('payment_address', $this->lang->line('user_details_placeholder_payment_address'), 'required|min_length[1]|max_length[1000]'); 
      // $this->form_validation->set_rules('delivery_address', $this->lang->line('user_details_placeholder_delivery_address'), 'min_length[1]|max_length[1000]'); 

      // Begin validation 
      if ($this->form_validation->run() == FALSE) {
        //   $data['first_name'] = array('name' => 'first_name', 'class' => 'form-control', 'id' => 'first_name', 'value' => set_value('first_name', ''), 'maxlength' => '100', 'size' => '35', 'placeholder' => $this->lang->line('user_details_placeholder_first_name'));
        //   $data['last_name'] = array('name' => 'last_name', 'class' => 'form-control', 'id' => 'last_name', 'value' => set_value('last_name', ''), 'maxlength' => '100', 'size' => '35', 'placeholder' => $this->lang->line('user_details_placeholder_last_name'));
        //   $data['email'] = array('name' => 'email', 'class' => 'form-control', 'id' => 'email', 'value' => set_value('email', ''), 'maxlength'   => '100', 'size' => '35', 'placeholder' => $this->lang->line('user_details_placeholder_email'));
        //   $data['email_confirm'] = array('name' => 'email_confirm', 'class' => 'form-control', 'id' => 'email_confirm', 'value' => set_value('email_confirm', ''), 'maxlength' => '100', 'size' => '35', 'placeholder' => $this->lang->line('user_details_placeholder_email_confirm'));
        //   $data['payment_address'] = array('name' => 'payment_address', 'class' => 'form-control', 'id' => 'payment_address', 'value' => set_value('payment_address', ''), 'maxlength' => '100', 'size' => '35', 'placeholder' => $this->lang->line('user_details_placeholder_payment_address'));
        //   $data['delivery_address'] = array('name' => 'delivery_address', 'class' => 'form-control', 'id' => 'delivery_address', 'value' => set_value('delivery_address', ''), 'maxlength' => '100', 'size' => '35', 'placeholder' => $this->lang->line('user_details_placeholder_delivery_address'));
        //   $res=$this->fetch_data->fetch_list_agama();
        //   $data['list_agama'] = array('name' => 'agama', 'class' => 'form-control', 'id' => 'agama');
        // echo $res;
        //   foreach ($res->result() as $row) :
        //     $res2=
        // echo $row->agama;
        //     $data['list_agama'] = array('name' => 'agama', 'class' => 'form-control', 'id' => 'agama', 'options ' => $row);
        //   endforeach;


        $data['list_agama'] = $this->fetch_data->fetch_list_agama();
        $data['list_pendidikan'] = $this->fetch_data->fetch_list_pendidikan();
        $data['list_pekerjaan'] = $this->fetch_data->fetch_list_pekerjaan();
        $data['list_status_kawin'] = $this->fetch_data->fetch_list_status_kawin();
        $data['list_status_keluarga'] = $this->fetch_data->fetch_list_status_keluarga();
        $data['list_status_penduduk'] = $this->fetch_data->fetch_list_status_penduduk();

        $this->load->view('common/header');
        $this->load->view('nav/top_nav');
        $this->load->view('form/index', $data);
        $this->load->view('common/footer');
      } else {
        $user_data = array(
          'noKK' => $this->input->post('noKK'),
          'nik' => $this->input->post('nik'),
          'nama' => $this->input->post('nama'),
          'tempat_lahir' => $this->input->post('tempat_lahir'),
          'tanggal_lahir' => $this->input->post('tanggal_lahir'),
          'gender'  => $this->input->post('gender'),
          'status_kawin'  => $this->input->post('status_kawin'),
          'status_keluarga'  => $this->input->post('status_keluarga'),
          'pendidikan'  => $this->input->post('status_pendidikan'),
          'pekerjaan'  => $this->input->post('status_pekerjaan'),
          'status_penduduk'  => $this->input->post('status_penduduk'),
          'agama'  => $this->input->post('agama'),
          'alamat'  => $this->input->post('alamat'),
          'rt'  => $this->input->post('rt'),
          'rw'  => $this->input->post('rw'),
          'kota'  => $this->input->post('kota'),
          'provinsi'  => $this->input->post('provinsi'),
          'kecamatan'  => $this->input->post('kecamatan'),
          'kelurahan'  => $this->input->post('kelurahan'),
          'warganegara'  => $this->input->post('warganegara'),
        );

        if ($this->post_data->save_user($user_data)) {
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
}
