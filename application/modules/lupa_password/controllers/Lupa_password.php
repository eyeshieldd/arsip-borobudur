<?php

/*
 * By : Praditya Kurniawan
 * website : http://masiyak.com
 * email : aku@masiyak.com
 *
 */

class Lupa_password extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Cauth');
    }

    public function index()
    {

        $this->load->view('index');
    }

    public function send_email()
    {
        if (!$this->input->is_ajax_request()) {
            return;
        }

        // mengirim parameter ke cauth 
        $status = $this->cauth->send_email($this->input->post('email'));

        // jika status pengiriman berhasil
        if ($status) {
            $result['status'] = true;
            $result['pesan']  = $this->cauth->get_message();
            return $this->output->set_output(json_encode($result));
        } else {
            $result['status'] = false;
            $result['pesan']  = $this->cauth->get_message();
            return $this->output->set_output(json_encode($result));
        }
    }

    public function email_sent()
    {
        $this->load->view('email_sent');
    }

    public function new_password($token = NULL)
    {
        // set validasi
        if (!isset($token) | empty($token)) {
            redirect(base_url());
        }

        // get id untuk dikirm saat ubah password
        $data = $this->cauth->get_id($token);
        if (!$data['status']) {
            $data['pesan']  = $this->cauth->get_message();
        }

        $this->load->view('new_password', $data);
    }

    public function reset_password()
    {   
        // set validasi
        if (!$this->input->is_ajax_request()) {
            return;
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('re_password', 'Re Enter Password', 'required|matches[password]');

        if ($this->form_validation->run($this) == false) {
            $data['pesan']  = validation_errors();
            $data['status'] = false;
            return $this->output->set_output(json_encode($data));
        }

        // set data yang akan dikirim ke cauth
        $data['user_id']        = $this->input->post('user_id', true);
        $data['password']       = $this->input->post('password', true);

        // proses pengiriman data
        if ($this->cauth->reset_password($data)) {
            $result['status'] = true;
            $result['pesan']  = $this->cauth->get_message();
        } else {
            $result['status'] = false;
            $result['pesan']  = $this->cauth->get_message();
        }
        return $this->output->set_output(json_encode($result));
    }

    public function cek_email()
    {
        $this->load->view('email/email_reset');
    }
}
