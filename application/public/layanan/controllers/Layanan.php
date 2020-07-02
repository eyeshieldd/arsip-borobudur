<?php

/*
 * By : Praditya Kurniawan
 * website : http://masiyak.com
 * email : aku@masiyak.com
 *
 */

class Layanan extends public_portal
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_layanan');
    }

    public function index()
    {
        // get default web title
        $web_title          = $this->m_layanan->get_web_title();
        $data['post_title'] = $web_title['config_value'] . ' :: Layanan Arsip';

        $data['meta_title']       = $data['post_title'];
        $data['meta_description'] = 'Pengisian formulir pengajuan layanan arsip atau permintaan informasi';
        $data['meta_tags']        = 'layanan, layanan arsip, permintaan informasi, kode arsip';
        $data['meta_keyword']     = 'permintaan layanan arsip borobudur';

        $data['content'] = $this->m_layanan->get_post_content('layanan');

        // load jquery validator
        // $this->load_css('assets/global/jquery-form-validator-net/form-validator/theme-default.min.css');
        // $this->load_js('assets/global/jquery-form-validator-net/form-validator/jquery.form-validator.min.js');
        $data['display_footer'] = true;

        parent::display('index', $data, 'footer_index');
    }

    public function is_valid_data()
    {
        if (!$this->input->is_ajax_request()) {
            return show_404();
        }

        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('telp', 'Telepon', 'required|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('identitas', 'Identitas', 'required');
        $this->form_validation->set_rules('identitas_gambar', 'File Identitas', '');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('layanan', 'Jenis Layanan', 'required');
        $this->form_validation->set_rules('kode_arsip', 'Kode Arsip', 'trim');
        $this->form_validation->set_rules('surat_permohonan', 'Surat Permohonan', '');
        $this->form_validation->set_error_delimiters('', '<br>');

        // validasi input captcha
        if ($this->input->post('g-recaptcha-response') == '') {
            $this->form_validation->set_error_message('Captcha', 'Captcha belum diisi.');
        }

        // proses validasi captcha
        $secret         = '6Ley2r0UAAAAAIDjSUNzFOJN9dr8NYSerhIPVKAP';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $this->input->post('g-recaptcha-response'));
        $responseData   = json_decode($verifyResponse);
        if (!$responseData->success) {
            $this->form_validation->set_error_message('Captcha', 'Captcha tidak valid.  Silakan ulangi proses validasi captcha.');
        }

        // validasi file identitas
        if ($_FILES['file_identitas']['name'] == '') {
            $this->form_validation->set_error_message('File Identitas', 'File identitas harus diisi.');
        }

        // validasi file identitas
        if ($_FILES['file_identitas']['name'] == '') {
            $this->form_validation->set_error_message('File Surat Permohonan', 'File surat permohonan harus diisi.');
        }

        // run validation
        if ($this->form_validation->run($this) == false) {
            $data['pesan']  = $this->_get_notif(validation_errors());
            $data['status'] = false;
            return $this->output->set_output(json_encode($data));
        }

        // get last nomor layanan
        $nomor = $this->m_layanan->get_last_nomor_layanan();

        // save data
        // load uuid
        $this->load->library('uuid');

        $simpan['permohonan_id'] = $this->uuid->v4(true);
        $simpan['nomor_layanan'] = 'AKB'.$nomor;
        $simpan['nama_pemohon']  = $this->input->post('nama');
        $simpan['alamat']        = $this->input->post('alamat');
        $simpan['email']         = $this->input->post('email');
        $simpan['telepon']       = $this->input->post('telp');
        $simpan['identitas']     = $this->input->post('identitas');
        $simpan['status']        = $this->input->post('status');
        $simpan['jenis_layanan'] = $this->input->post('layanan');
        $simpan['created_at']    = date('Y-m-d H:i:s');
        $simpan['updated_at']    = date('Y-m-d H:i:s');
        $simpan['ctb']           = 'user';
        $simpan['mdb']           = 'user';

        $simpan_detail = array();
        if ($this->input->post('kode_arsip') != null) {
            foreach ($this->input->post('kode_arsip') as $k => $vkode) {
                if (empty($vkode)) {
                    continue;
                }

                $simpan_detail[$k]['kode_arsip_id'] = $this->uuid->v4(true);
                $simpan_detail[$k]['permohonan_id'] = strip_tags($simpan['permohonan_id']);
                $simpan_detail[$k]['kode_arsip']    = strip_tags($vkode);
            }
        }

        if ($this->m_layanan->simpan($simpan, $simpan_detail)) {
            $simpan['detaildata'] = $simpan_detail;
            // send email
            $this->_send_mail($simpan, $this->m_layanan->get_file());
            $this->_send_mail_cust($simpan);

            // buat sesi sesaat untuk menampilkan halaman success
            $sesi = md5($simpan['permohonan_id']);
            $this->session->set_flashdata('kirim_sukses', $sesi);

            $result['pesan']  = 'Data berhasil disimpan!';
            $result['url']    = base_url('layanan/success/' . $sesi);
            $result['status'] = true;
        } else {
            // $result['pesan']        = 'Data gagal disimpan!';
            $result['pesan']  = $this->_get_notif($this->m_layanan->get_error());
            $result['status'] = false;
        }

        return $this->output->set_output(json_encode($result));
    }

    public function _send_mail($data = null, $attach = null)
    {
        // $data['nama_pemohon'] = 'Nama Pemohon';
        // $data['alamat']       = 'Alamat';
        // $data['email']        = 'email@email.com';
        // $data['telepon']      = '123123123';
        // $data['jenis_layanan']      = 'Permohonan arsip';
        // $data['nomor_layanan']      = '123123123123123';
        $this->load->library('email');
        // get email config
        $mconf = $this->m_layanan->get_email_config();
        if (!empty($mconf)) {
            foreach ($mconf as $vconfig) {
                $mailconf[$vconfig['config_name']] = $vconfig['config_value'];
            }

            $config = [
                'protocol'  => $mailconf['protocol'],
                'smtp_host' => $mailconf['smtp_host'],
                'smtp_port' => $mailconf['smtp_port'],
                'smtp_user' => $mailconf['smtp_user'],
                'smtp_pass' => $mailconf['smtp_pass'],
                'crlf'      => "\r\n",
                'newline'   => "\r\n",
                'mailtype'  => "html",
            ];
            $this->email->initialize($config);
        }

        $this->email->from('borobudur.konservasi.dev@gmail.com', 'Pemberitahuan Sistem');
        $this->email->to($mailconf['admin_email']);

        $this->email->subject('Pemberitahuan Permohonan Layanan');
        $content = $this->load->view('email_template', $data, true);
        $this->email->message($content);

        // attach file gambar identitas
        if (isset($attach['gambar_identitas']) && file_exists($attach['gambar_identitas'])) {
            $this->email->attach($attach['gambar_identitas']);
        }

        //attach file permohonan
        if (isset($attach['gambar_permohonan']) && file_exists($attach['gambar_permohonan'])) {
            $this->email->attach($attach['gambar_permohonan']);
        }

        if (!$this->email->send()) {
            return false;
        } else {
            return true;
        }

    }

    public function _send_mail_cust($data = null)
    {
        // $data['nama_pemohon'] = 'Nama Pemohon';
        // $data['alamat']       = 'Alamat';
        // $data['email']        = 'email@email.com';
        // $data['telepon']      = '123123123';
        // $data['jenis_layanan']      = 'Permohonan arsip';
        // $data['nomor_layanan']      = '123123123123123';
        $this->load->library('email');
        // get email config
        $mconf = $this->m_layanan->get_email_config();
        if (!empty($mconf)) {
            foreach ($mconf as $vconfig) {
                $mailconf[$vconfig['config_name']] = $vconfig['config_value'];
            }

            $config = [
                'protocol'  => $mailconf['protocol'],
                'smtp_host' => $mailconf['smtp_host'],
                'smtp_port' => $mailconf['smtp_port'],
                'smtp_user' => $mailconf['smtp_user'],
                'smtp_pass' => $mailconf['smtp_pass'],
                'crlf'      => "\r\n",
                'newline'   => "\r\n",
                'mailtype'  => "html",
            ];
            $this->email->initialize($config);
        }

        $this->email->from('borobudur.konservasi.dev@gmail.com', 'Sistem Layanan Arsip');
        $this->email->to($data['email']);

        $this->email->subject('Pemberitahuan Layanan Arsip Balai Konservasi Borobudur');
        $content = $this->load->view('email_user_template', $data, true);
        $this->email->message($content);

        if (!$this->email->send()) {
            return false;
        } else {
            return true;
        }

    }

    public function success($sesi = null)
    {
        if (empty($sesi)) {
            redirect('layanan');
        }

        $sesi_server = $this->session->flashdata('kirim_sukses');

        if ($sesi != $sesi_server) {
            redirect('layanan');
        }

        parent::display('success');
    }

    public function _get_notif($data = array())
    {
        $html = '<div class="alert alert-danger">';
        if (empty($data)) {
            return $html . '</div>';
        }

        $html .= $data;
        $html .= '</div>';

        return $html;

    }

    public function save()
    {
        echo "<pre>";
        print_r($this->input->post());
        exit();
    }

    public function tes_email_user()
    {
        $data['nama_pemohon']  = 'Nama Pemohon';
        $data['alamat']        = 'Alamat';
        $data['email']         = 'email@email.com';
        $data['telepon']       = '123123123';
        $data['jenis_layanan'] = 'Permohonan arsip';
        $this->load->view('email_user_template', $data);
    }

}
