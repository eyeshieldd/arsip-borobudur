<?php

/*
 *    CIRCLE LABS ID
 *    WWW.CIRCLELABS.ID
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Change_password extends Admin_portal
{

    public $form_conf = array(
        array('field' => 'old_password', 'label' => 'Old Password', 'rules' => 'required'),
        array('field' => 'new_password', 'label' => 'New Password', 'rules' => 'required'),
        array('field' => 're_new_password', 'label' => 'Retype New Password', 'rules' => 'required|matches[new_password]'),
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_ubah_password');
    }

    public function index()
    {
        $this->_set_page_role('r');
        // load jquery validator
        $this->load_css('assets/global/jquery-form-validator-net/form-validator/theme-default.min.css');
        $this->load_js('assets/global/jquery-form-validator-net/form-validator/jquery.form-validator.min.js');

        $data['result'] = $this->m_ubah_password->get_data($this->com_user['user_id']);
        // $this->pr($data);

        parent::display('index', $data, 'footer_index');
    }

    public function update_password()
    {
        $this->_set_page_role('u');

        if (!$this->input->is_ajax_request()) {
            show_404();
        }
        $this->load->library(array('form_validation'));

        $this->form_validation->set_rules($this->form_conf);

        // run validation
        if ($this->form_validation->run($this) == false) {
            $data['pesan']  = validation_errors();
            $data['status'] = false;
            return $this->output->set_output(json_encode($data));
        }

        $data_user = $this->m_ubah_password->get_data($this->input->post('id_user'));

        $currentPassword = $this->config->item('encryption_key') . $this->input->post('old_password');
        $hashPassword    = $data_user['kata_sandi'];

        if (!password_verify($currentPassword, $hashPassword)) {
            $result = [
                'pesan'  => 'Wrong old password.',
                'status' => false,
            ];

            return $this->output->set_output(json_encode($result));
        }

        $data_simpan['kata_sandi'] = password_hash($this->config->item('encryption_key').$this->input->post('new_password', true), PASSWORD_BCRYPT);
        $data_simpan['mdb']        = $this->com_user['user_id'];
        $data_simpan['mdd'] = date('Y-m-d H:i:s');
        // $this->pr($data_simpan);

        if (!$this->m_ubah_password->ubah_data('sys_user', 'user_id', $this->input->post('id_user'), $data_simpan)) {
            $result['status'] = false;
            $result['pesan']  = $this->m_ubah_password->error_message();
            return $this->output->set_output(json_encode($result));
        } else {
            $result['status'] = true;
            $result['pesan']  = 'Password changed successfully.';
        }
        return $this->output->set_output(json_encode($result));
    }
}
