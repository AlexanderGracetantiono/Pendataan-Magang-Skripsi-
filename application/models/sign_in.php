<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class sign_in extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function does_user_exist($id)
    {
        if (strlen($id) < 6) {
            $this->db->where('NIK', $id);
            $query = $this->db->get('data_karyawan');
        } else {
            $this->db->where('NIM', $id);
            $query = $this->db->get('data_mahasiswa');
        }
        return $query;
    }
    public function update_login($adm_id)
    {
        $t = time();
        $date = date("'Y-m-d h:m:s'", $t);
        $query = "UPDATE `admin` SET `isLogin`=1 , `lastLogin`=$date WHERE `id` =$adm_id ";
        if ($this->db->query($query)) {
            return true;
        } else {
            return false;
        }
    }
    public function update_logout($adm_id)
    {
        // UPDATE `admin` SET `lastLogin`='2019-12-21 18:12:06' WHERE id=1
        $query = "UPDATE `admin` SET`isLogin`=0 WHERE `id` =$adm_id ";
        if ($this->db->query($query)) {
            return true;
        } else {
            return false;
        }
    }
}
