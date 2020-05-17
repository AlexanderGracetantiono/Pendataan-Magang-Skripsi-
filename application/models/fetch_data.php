<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class fetch_data extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function save_url($data)
    {
        /*
    Let's see if the unique code already exists in 
    the database.  If it does exist then make a new 
    one and we'll check if that exists too.  
    Keep making new ones until it's unique.  
    When we make one that's unique, use it for our url 
    */
        do {
            $url_code = random_string('alnum', 8);

            $this->db->where('url_code = ', $url_code);
            $this->db->from('urls');
            $num = $this->db->count_all_results();
        } while ($num >= 1);

        $query = "INSERT INTO `urls` (`url_code`, `url_address`) VALUES (?,?) ";
        $result = $this->db->query($query, array($url_code, $data['url_address']));

        if ($result) {
            return $url_code;
        } else {
            return false;
        }
    }
    public function get_admin($id)
    {
        $this->db->where('NIK', $id);
        $query = $this->db->get('data_karyawan');
        return $query;
    }
    public function get_mhs($id)
    {
        $this->db->where('NIM', $id);
        $query = $this->db->get('data_mahasiswa');
        return $query;
    }
    public function get_mhs_by($field, $data)
    {
        $this->db->where($field, $data);
        $query = $this->db->get('data_mahasiswa');
        return $query;
    }
    public function fetch_list_mhs_export($field, $data)
    {
        $this->db->where($field, $data);
        $query = $this->db->get('data_mahasiswa')->result();
        return $query;
    }
    public function get_magang($id)
    {
        $this->db->where('KodeMagang', $id);
        $query = $this->db->get('data_magang');
        return $query;
    }
    public function get_week($id)
    {
        $this->db->where('KodeMagang', $id);
        $query = $this->db->get('data_mingguan');
        return $query;
    }
    public function count($db, $field = '', $syarat = '')
    {
        if ($field != '') {
            $this->db->where($field, $syarat);
        }
        $query = $this->db->get($db);
        return $query->num_rows();
    }
    function fetch_list_warga()
    {
        $query = $this->db->get('user');
        return $query;
    }
    function fetch_list_magang()
    {
        $query = $this->db->get('data_magang');
        return $query;
    }
    function fetch_list_mhs()
    {
        $query = $this->db->get('data_mahasiswa');
        return $query;
    }
    function fetch_list_karyawan()
    {
        $query = $this->db->get('data_karyawan');
        return $query;
    }
    function fetch_list_admin()
    {
        $query = $this->db->get('admin');
        return $query;
    }
    function fetch_list_agama()
    {
        $query = $this->db->get('list_agama');
        return $query;
    }
    function fetch_list_pekerjaan()
    {
        $query = $this->db->get('list_pekerjaan');
        return $query;
    }
    function fetch_list_pendidikan()
    {
        $query = $this->db->get('list_pendidikan');
        return $query;
    }
    function fetch_list_status_kawin()
    {
        $query = $this->db->get('list_status_kawin');
        return $query;
    }
    function fetch_list_status_keluarga()
    {
        $query = $this->db->get('list_status_keluarga');
        return $query;
    }
    function fetch_list_status_penduduk()
    {
        $query = $this->db->get('list_status_penduduk');
        return $query;
    }
    function get_user_details($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->get('user');

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    function get_id_from($table, $id)
    {
        $this->db->where('id', $id);

        if ($table == 'agama') {
            $result = $this->db->get('list_agama');
            foreach ($result->result() as $row) {
                $res = $row->agama;
            }
        } else if ($table == 'kawin') {
            $result = $this->db->get('list_status_kawin');
            foreach ($result->result() as $row) {
                $res = $row->status_kawin;
            }
        } else if ($table == 'pendidikan') {
            $result = $this->db->get('list_pendidikan');
            foreach ($result->result() as $row) {
                $res = $row->pendidikan;
            }
        } else if ($table == 'pekerjaan') {
            $result = $this->db->get('list_pekerjaan');
            foreach ($result->result() as $row) {
                $res = $row->pekerjaan;
            }
        } else if ($table == 'keluarga') {
            $result = $this->db->get('list_status_keluarga');
            foreach ($result->result() as $row) {
                $res = $row->status_keluarga;
            }
        } else if ($table == 'penduduk') {
            $result = $this->db->get('list_status_penduduk');
            foreach ($result->result() as $row) {
                $res = $row->status_penduduk;
            }
        }


        if ($res) {
            return $res;
        } else {
            return false;
        }
    }
}
