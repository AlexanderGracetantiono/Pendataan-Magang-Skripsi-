<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class post_data extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function get_product_details($product_id)
    {
        $this->db->where('product_id', $product_id);
        $query = $this->db->get('products');
        return $query;
    }
    public function get_warga_by($data)
    {
        // echo $kk['noKK'];
        if (!empty($data['noKK'])) {
            $this->db->where('noKK', $data['noKK']);
        }
        if (!empty($data['nik'])) {
            $this->db->where('nik', $data['nik']);
        }
        if (!empty($data['agama'])) {
            $this->db->where('agama', $data['agama']);
        }
        if (!empty($data['pendidikan'])) {
            $this->db->where('pendidikan', $data['pendidikan']);
        }
        if (!empty($data['pekerjaan'])) {
            $this->db->where('Pekerjaan', $data['pekerjaan']);
        }
        if (!empty($data['status_kawin'])) {
            $this->db->where('status_kawin', $data['status_kawin']);
        }
        $query = $this->db->get('user');

        return $query;
    }

    public function get_all_products()
    {
        $query = $this->db->get('products');
        return $query;
    }

    public function get_all_products_by_category_name($cat_url_name = null)
    {
        if ($cat_url_name) {
            $this->db->where('cat_url_name', $cat_url_name);
            $cat_query = $this->db->get('categories');

            foreach ($cat_query->result() as $row) {
                $category_id = $row->cat_id;
            }

            $this->db->where('category_id', $category_id);
        }

        $query = $this->db->get('products');
        return $query;
    }

    public function get_all_categories($cat_url_name = null)
    {
        if ($cat_url_name) {
            $this->db->where('cat_url_name', $cat_url_name);
        }

        $query = $this->db->get('categories');
        return $query;
    }

    public function save_user($user_data)
    {
        if ($this->db->insert('user', $user_data)) {
            return true;
        } else {
            return false;
        }
    }
    public function save_magang($user_data)
    {
        if ($this->db->insert('data_magang', $user_data)) {
            return true;
        } else {
            return false;
        }
    }
    public function save_perkembangan($user_data)
    {
        if ($this->db->insert('data_mingguan', $user_data)) {
            return true;
        } else {
            return false;
        }
    }
    public function verif_magang($kode, $verif)
    {
        $this->db->where('KodeMagang', $kode);
        if ($this->db->update('data_magang', array('Verifikasi' => $verif))) {
            return true;
        } else {
            return false;
        }
    }
    public function save_karyawan($user_data)
    {
        if ($this->db->insert('data_karyawan', $user_data)) {
            return true;
        } else {
            return false;
        }
    }
    public function save_mahasiswa($user_data)
    {
        if ($this->db->insert('data_mahasiswa', $user_data)) {
            return true;
        } else {
            return false;
        }
    }
    public function update_user($id, $user_data)
    {
        $this->db->where('id', $id);
        if ($this->db->update('user', $user_data)) {
            return true;
        } else {
            return false;
        }
    }
    public function update_data($id_field, $id, $db, $field, $data)
    {
        $this->db->where($id_field, $id);
        if ($this->db->update($db, array($field => $data))) {
            return true;
        } else {
            return false;
        }
    }
    public function save_admin($user_data)
    {
        if ($this->db->insert('data_karyawan', $user_data)) {
            return true;
        } else {
            return false;
        }
    }
    function delete_user($id)
    {
        if ($this->db->delete('user', array('id' => $id))) {
            return true;
        } else {
            return false;
        }
    }
    function delete_from($table, $id)
    {
        $this->db->where('id', $id);
        if ($table == 'agama') {
            if ($this->db->delete('list_agama')) {
                return true;
            } else {
                return false;
            }
        } else if ($table == 'kawin') {
            if ($this->db->delete('list_status_kawin')) {
                return true;
            } else {
                return false;
            }
        } else if ($table == 'pendidikan') {
            if ($this->db->delete('list_pendidikan')) {
                return true;
            } else {
                return false;
            }
        } else if ($table == 'pekerjaan') {
            if ($this->db->delete('list_pekerjaan')) {
                return true;
            } else {
                return false;
            }
        } else if ($table == 'keluarga') {
            if ($this->db->delete('list_status_keluarga')) {
                return true;
            } else {
                return false;
            }
        } else if ($table == 'penduduk') {
            if ($this->db->delete('list_status_penduduk')) {
                return true;
            } else {
                return false;
            }
        }
    }
    function edit_from($table, $id, $data)
    {
        $this->db->where('id', $id);
        if ($table == 'agama') {
            if ($this->db->update('list_agama', array('agama' => $data))) {
                return true;
            } else {
                return false;
            }
        } else if ($table == 'kawin') {
            if ($this->db->update('list_status_kawin', array('status_kawin' => $data))) {
                return true;
            } else {
                return false;
            }
        } else if ($table == 'pendidikan') {
            if ($this->db->update('list_pendidikan', array('pendidikan' => $data))) {
                return true;
            } else {
                return false;
            }
        } else if ($table == 'pekerjaan') {
            if ($this->db->update('list_pekerjaan', array('Pekerjaan' => $data))) {
                return true;
            } else {
                return false;
            }
        } else if ($table == 'keluarga') {
            if ($this->db->update('list_status_keluarga', array('status_keluarga' => $data))) {
                return true;
            } else {
                return false;
            }
        } else if ($table == 'penduduk') {
            if ($this->db->update('list_status_penduduk', array('status_penduduk' => $data))) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function input_to($table, $data)
    {
        if ($table == 'agama') {

            if ($this->db->insert('list_agama', array('agama' => $data))) {
                return true;
            } else {
                return false;
            }
        } else if ($table == 'kawin') {
            if ($this->db->insert('list_status_kawin', array('status_kawin' => $data))) {
                return true;
            } else {
                return false;
            }
        } else if ($table == 'pendidikan') {
            if ($this->db->insert('list_pendidikan', array('pendidikan' => $data))) {
                return true;
            } else {
                return false;
            }
        } else if ($table == 'pekerjaan') {
            if ($this->db->insert('list_pekerjaan', array('pekerjaan' => $data))) {
                return true;
            } else {
                return false;
            }
        } else if ($table == 'keluarga') {
            if ($this->db->insert('list_status_keluarga', array('status_keluarga' => $data))) {
                return true;
            } else {
                return false;
            }
        } else if ($table == 'penduduk') {
            if ($this->db->insert('list_status_penduduk', array('status_penduduk' => $data))) {
                return true;
            } else {
                return false;
            }
        }
    }
}
