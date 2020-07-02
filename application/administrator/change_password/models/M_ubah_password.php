<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'models/M_model_base.php';

class M_ubah_password extends M_model_base
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_data($user_id)
    {
        $sql    = $this->db->select('user_id, username, kata_sandi')->where('user_id', $user_id)->from('sys_user')->get();

        if ($sql->num_rows() > 0) {
            $result = $sql->row_array();
            $sql->free_result();
            return $result;
        } else {
            return [];
        }
    }
}
