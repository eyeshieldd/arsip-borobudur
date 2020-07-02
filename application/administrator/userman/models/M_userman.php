<?php

/*
 * By : Praditya Kurniawan
 * website : http://masiyak.com
 * email : aku@masiyak.com
 *
 */

require_once APPPATH . 'models/M_model_base.php';

class M_userman extends M_model_base
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_list_user($user_id = null)
    {

        // select data
        $rs_data = $this->db->select('u.user_id, u.username, u.nama_lengkap, sg.group_name, u.status')
            ->from('sys_user u')
            ->join('sys_user_group sug', 'sug.user_id = u.user_id AND sug.default = 1', 'left')
            ->join('sys_group sg', 'sg.group_id = sug.group_id', 'left');

        // get total records data
        $option['recordsTotal'] = $rs_data->count_all_results('', false);

        // searching function should be here
        if (!empty($this->input->post('search')['value'])) {
            // get list colomn
            $lskolom = ['u.username', 'u.nama_lengkap'];
            $rs_data->group_start();
            foreach ($lskolom as $vkolom) {
                $rs_data->or_like($vkolom, $this->input->post('search')['value'], 'both');
            }
            $rs_data->group_end();
        }

        // hitung data setelah filter
        $option['recordsFiltered'] = $rs_data->count_all_results('', false);
        // limit data
        if ($this->input->post('length') > -1) {
            $rs_data->limit($this->input->post('length', true), $this->input->post('start', true));
        }

        $option['draw'] = $this->input->post('draw');

        // build data
        $rs_data_ = [];
        foreach ($rs_data->get()->result_array() as $vdata) {
            // add button
            if ($vdata['user_id'] != $user_id) {
                $btn = '<button class="btn btn-md btn-warning btn-circle-md btn-circle edit-data" style="margin-right: 5px;" data-id="' . $vdata['user_id'] . '"><i class="fas fa-pencil-alt"></i> </button>';
                $btn .= '<button class="btn btn-md btn-circle btn-circle-md btn-danger hapus-data" data-id="' . $vdata['user_id'] . '"><i class="fa fa-trash"></i></button>';
            } else {
                $btn = '-';
            }

            $vdata['status'] = $vdata['status'] == 1 ? '<span class="text-success" data-toggle="tooltip" title="Active"><i class="fa fa-check-circle"></i></span>' : '<span class="text-danger" data-toggle="tooltip" title="Not Active"><i class="fa fa-times-circle"></i></span>';
            $vdata           = xss_clean($vdata);
            $vdata['aksi']   = $btn;

            $rs_data_[] = $vdata;
        }
        $option['data'] = $rs_data_;
        return $option;
    }

    public function get_list_group()
    {
        $sql = $this->db->select('group_id, group_name')
            ->from('sys_group')
            ->get();

        if ($sql->num_rows() > 0) {
            $result = $sql->result_array();
            $sql->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function tambah_user($user_data = null, $user_group = array())
    {
        $this->db->trans_begin();

        $this->tambah_data('sys_user', $user_data);
        $this->tambah_data('sys_user_group', $user_group);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function get_detail_data($user_id)
    {
        $sql = $this->db->select('u.user_id, u.nama_lengkap, u.username, u.email, u.status, group_name, g.group_id')
            ->from('sys_user u')
            ->join('sys_user_group sug', 'sug.user_id = u.user_id', 'left')
            ->join('sys_group g', 'g.group_id = sug.group_id', 'left')
            ->where('u.user_id', $user_id)
            ->get();

        if ($sql->num_rows() > 0) {
            $result = $sql->row_array();
            $sql->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function ubah_user($user, $user_group_id, $user_id)
    {
        // $this->db->trans_off();

        $this->db->trans_begin();

        // echo "<pre>";
        // print_r($user_id);
        // exit();

        $this->ubah_data('sys_user', 'user_id', $user_id, $user);
        $this->hapus_data('sys_user_group', array('user_id' => $user_id));
        $user_group['user_id']  = $user_id;
        $user_group['group_id'] = $user_group_id;
        $user_group['default']  = 1;
        $this->tambah_data('sys_user_group', $user_group);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
}
