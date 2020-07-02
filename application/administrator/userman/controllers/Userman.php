<?php

/*
 * By : Praditya Kurniawan
 * website : http://masiyak.com
 * email : aku@masiyak.com
 *
 */

class Userman extends Admin_portal
{

    public $form_conf = array(
        array('field' => 'username', 'label' => 'Username', 'rules' => 'required|max_length[45]'),
        array('field' => 'nama_lengkap', 'label' => 'Nama Lengkap', 'rules' => 'required|max_length[100]'),
        array('field' => 'email', 'label' => 'Email', 'rules' => 'required|max_length[255]'),
        array('field' => 'status', 'label' => 'Status', 'rules' => 'required|max_length[11]'),
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_userman');
    }

    public function index()
    {
        $this->_set_page_role('r');

        // load jquery validator
        $this->load_css('assets/global/jquery-form-validator-net/form-validator/theme-default.min.css');
        $this->load_js('assets/global/jquery-form-validator-net/form-validator/jquery.form-validator.min.js');

        // get list group
        $data['rs_user_group'] = $this->m_userman->get_list_group();

        parent::display('index', $data, 'footer_index');
    }

    public function get_list_user()
    {
        $this->_set_page_role('r');

        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        $rs_user = $this->m_userman->get_list_user($this->com_user['user_id']);
        return $this->output->set_output(json_encode($rs_user));
    }

    public function add_process()
    {
        $this->_set_page_role('c');
        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        // load form validation
        $this->load->library('form_validation');
        // user account
        $this->load->library('user_account');
        // cek username sudah digunakan atau belum
        if ($this->user_account->user_email_is_exist('username', $this->input->post('username', true))) {
            $this->form_validation->set_error_message('username', 'Username sudah digunakan.  Silakan masukkan username lain.');
        }
        if ($this->user_account->user_email_is_exist('email', $this->input->post('email', true))) {
            $this->form_validation->set_error_message('Email', 'Email sudah digunakan.  Silakan masukkan email lain.');
        }

        // load form validation
        // $this->load->library('form_validation');
        // $this->form_validation->set_error_delimiters('<p>', '');
        $this->form_validation->set_rules($this->form_conf);
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('repassword', 'Retype Password', 'required|matches[password]');

        // run validation
        if ($this->form_validation->run($this) == false) {
            $data['pesan']  = validation_errors();
            $data['status'] = false;
            return $this->output->set_output(json_encode($data));
        }

        $this->load->library('uuid');
        $userid                = str_replace(',', '.', microtime(true));
        $userid                = explode('.', $userid);
        $save['user_id']       = $userid[0];
        $save['username']      = $this->input->post('username', true);
        $save['kata_sandi']    = password_hash($this->config->item('encryption_key') . $this->input->post('password', true), PASSWORD_BCRYPT);
        $save['nama_lengkap']  = $this->input->post('nama_lengkap', true);
        $save['email']         = $this->input->post('email', true);
        $save['status']        = $this->input->post('status', true);
        $save['registered_by'] = $this->com_user['user_id'];
        $save['mdd']           = date('Y-m-d H:i:s');

        $user_group['user_id']  = $save['user_id'];
        $user_group['group_id'] = $this->input->post('group_id');
        $user_group['default']  = 1;

        if ($this->m_userman->tambah_user($save, $user_group) === false) {
            $eror          = $this->User->get_db_error();
            $out['status'] = false;
            $out['pesan']  = 'Data gagal disimpan. Eror kode : ' . $eror['code'];
        } else {
            $out['status'] = true;
            $out['pesan']  = 'Data berhasil disimpan.';
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($out));

    }

    public function ubah_data(){
        // set permission
        $this->_set_page_role('r');

        // validasi hanya request lewat ajax
        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        $result_user = $this->m_userman->get_detail_data($this->input->post('data_id'));

        if(empty($result_user)){
            $result['status'] = false;
            $result['pesan'] = 'Data not found.';
        } else {
            $result['status'] = true;
            $result['data'] = $result_user;
            $result['pesan'] = '1 data found.';
        }

        return $this->output->set_output(json_encode($result));
    }

    public function update_process(){
        $this->_set_page_role('u');
        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        // load form validation
        $this->load->library(array('form_validation', 'user_account'));

        $this->form_validation->set_rules('group_id','Group name','required');
        if ($this->input->post('password') != ''){
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('repassword', 'Retype Password', 'required|matches[password]');
        }
         
         
        // run validation
        if ($this->form_validation->run($this) == false) {
            $data['pesan']  = validation_errors();
            $data['status'] = false;
            return $this->output->set_output(json_encode($data));
        }

        // jika password diisi
        if ($this->input->post('password') != '') {
            $save['kata_sandi'] = password_hash($this->config->item('encryption_key') . $this->input->post('password'), PASSWORD_BCRYPT);        
        }

        //ubah data group
        $save_g = $this->input->post('group_id');

        // ubah status
        $save['status'] = $this->input->post('status');
        $save['mdd'] = date('Y-m-d H:i:s');
     
        if ($this->m_userman->ubah_user($save, $save_g, $this->input->post('user_id')) == false) {
            $eror             = $this->m_userman->get_db_error();
            $result['status'] = false;
            $result['pesan']  = 'Data gagal diubah. Eror kode : ' . $eror['code'];
        } else {
            $result['status'] = true;
            $result['pesan']  = 'Data berhasil diubah.';
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function delete_process()
    {
        // set permission
        $this->_set_page_role('d');

        // validasi hanya request lewat ajax
        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        // parameter
        $hapus['user_id'] = $this->input->post('data_id');
        if ($this->m_userman->hapus_data('sys_user', $hapus)) {
            $result['status'] = true;
            $result['pesan']  = 'Data berhasil dihapus.';
        } else {
            $eror             = $this->m_userman->get_db_error();
            $result['status'] = false;
            $result['pesan']  = 'Data gagal dihapus. Eror kode : ' . $eror['code'];
        }
        return $this->output->set_output(json_encode($result));
    }

}
