<?php

class Home_slider extends Admin_portal
{
    public $form_conf = array(
        array('field' => 'title', 'label' => 'Title', 'rules' => 'required|max_length[255]'),
        array('field' => 'caption', 'label' => 'Caption', 'rules' => 'required'),
        array('field' => 'status', 'label' => 'Status', 'rules' => 'required'),
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_home_slider');
    }

    public function index()
    {
        $this->_set_page_role('r');
        $this->load->helper('form');

        // load jquery validator
        $this->load_css('assets/global/jquery-form-validator-net/form-validator/theme-default.min.css');
        $this->load_js('assets/global/jquery-form-validator-net/form-validator/jquery.form-validator.min.js');

        // gallery
        $this->load_css('assets/operator/plugins/ekko-lightbox/ekko-lightbox.css');
        $this->load_js('assets/operator/plugins/ekko-lightbox/ekko-lightbox.min.js');

        // get list image
        $data['rs_slider'] = $this->m_home_slider->get_list_slider();

        parent::display('index', $data, 'footer_index');
    }

    public function get_list()
    {
        $this->_set_page_role('r');

        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        // tombol
        $tombol = '<div class="text-center">
                        <button type="button" class="btn btn-info btn-circle ubah-data" data-id="{{slider_id}}"><i class="fa fa-edit"></i> </button>
                        <button type="button" class="btn btn-danger btn-circle hapus-data" data-id="{{slider_id}}"><i class="fa fa-trash"></i> </button>
                    </div>';

        $this->load->library('cldatatable');

        return $this->output->set_output($this->cldatatable->set_kolom('slider_id, image_url, title, caption, is_active')
                ->set_tabel('slider')
                ->tambah_kolom('aksi', $tombol)
                ->modif_data('image_url', function ($d) {
                    return base_url($d['image_url']);
                })
                ->modif_data('title', function ($d) {
                    $html = '<h4>'.$d['title'].'</h4>';
                    $html .= '<p class="text-justify">'.$d['caption'].'</p>';
                    return $html;
                })
                ->modif_data('is_active', function ($d) {
                    return $d['is_active'] == 1 ? '<span class="text-success" title="Active"><i class="fa fa-check-circle"></i></span>' : '<span class="text-danger" title="Not Active"><i class="fa fa-times-circle"></i></span>';
                })
                ->get_datatable());
    }

    public function proses_tambah_data()
    {
        $this->_set_page_role('c');

        if (!$this->input->is_ajax_request()) {
            return show_404();
        }
        // load form validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->form_conf);
        $this->form_validation->set_error_delimiters('', '<br>');

        // run validation
        if ($this->form_validation->run($this) == false) {
            $data['pesan']  = validation_errors();
            $data['status'] = false;
            return $this->output->set_output(json_encode($data));
        }
        $path = $_FILES['file_image']['name'];
        $ext  = pathinfo($path, PATHINFO_EXTENSION);
        // echo "<pre>";
        // print_r($ext);
        // exit();

        if (!is_dir('uploads/slider/')) {
            mkdir('uploads/slider/');
        }
        // save data
        $config['upload_path']   = 'uploads/slider/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 1024;
        $config['max_width']     = 4096;
        $config['max_height']    = 4096;
        $config['file_name']     = url_title($_FILES['file_image']['name'] . $ext);

        $this->load->library('upload', $config);
        // $this->upload->initialize($config);
        if (!$this->upload->do_upload('file_image')) {
            $data['pesan']  = 'File identitas gagal di upload. ' . $this->upload->display_errors('', '');
            $data['status'] = false;
            return $this->output->set_output(json_encode($data));
        }

        // load uuid
        $this->load->library('uuid');

        $simpan['title']      = $this->input->post('title');
        $simpan['caption']    = $this->input->post('caption');
        $simpan['is_active']  = $this->input->post('status');
        $simpan['image_url']  = $config['upload_path'] . $this->upload->data('file_name');
        $simpan['created_at'] = date('Y-m-d H:i:s');
        $simpan['updated_at'] = date('Y-m-d H:i:s');
        $simpan['ctb']        = $this->com_user['user_id'];
        $simpan['mdb']        = $this->com_user['user_id'];

        if ($this->m_home_slider->tambah_data('slider', $simpan)) {
            $data['pesan']  = 'Data berhasil disimpan.';
            $data['status'] = true;
        } else {
            $data['pesan']  = 'Data gagal disimpan.';
            $data['status'] = false;
        }
        return $this->output->set_output(json_encode($data));

    }

    public function get_detail_data()
    {
        // set permission
        $this->_set_page_role('c');

        // validasi hanya request lewat ajax
        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        // get data
        $data['data'] = $this->m_home_slider->get_detail_data($this->input->post('data_id'));
        // validasi jika kosong
        if (empty($data)) {
            return $this->output->set_output(json_encode(array('pesan' => 'data tidak ditemukan!', 'data' => null)));
        }
        $data['status'] = true;
        return $this->output->set_output(json_encode($data));

    }

    public function proses_ubah_data()
    {
        // set permission
        $this->_set_page_role('u');

        // validasi hanya request lewat ajax
        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        // load form validation
        $this->load->library('form_validation');
        // $this->form_validation->set_error_delimiters('<p>', '');
        $this->form_validation->set_rules($this->form_conf);

        // run validation
        if ($this->form_validation->run($this) == false) {
            $data['pesan']  = validation_errors();
            $data['status'] = false;
            return $this->output->set_output(json_encode($data));
        }

        $simpan['title']      = $this->input->post('title');
        $simpan['caption']    = $this->input->post('caption');
        $simpan['is_active']  = $this->input->post('status');
        $simpan['updated_at'] = date('Y-m-d H:i:s');
        $simpan['mdb']        = $this->com_user['user_id'];

        if ($this->m_home_slider->ubah_data('slider', 'slider_id', $this->input->post('slider_id'), $simpan)) {
            $result['status'] = true;
            $result['pesan']  = 'Data berhasil diubah.';
        } else {
            $eror             = $this->m_home_slider->get_db_error();
            $result['status'] = false;
            $result['pesan']  = 'Data gagal diubah. Eror kode : ' . $eror['code'];
        }
        return $this->output->set_output(json_encode($result));
    }

    public function proses_hapus_data()
    {
        // set permission
        $this->_set_page_role('d');

        // validasi hanya request lewat ajax
        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        // parameter
        if ($this->m_home_slider->hapus($this->input->post('data_id'))) {
            $result['status'] = true;
            $result['pesan']  = 'Data berhasil dihapus.';
        } else {
            $eror             = $this->m_home_slider->get_db_error();
            $result['status'] = false;
            $result['pesan']  = 'Data gagal dihapus. Eror kode : ' . $eror['code'];
        }
        return $this->output->set_output(json_encode($result));

    }
}
