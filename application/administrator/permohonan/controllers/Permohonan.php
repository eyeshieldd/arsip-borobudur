<?php

/*
 * By : Praditya Kurniawan
 * website : http://masiyak.com
 * email : aku@masiyak.com
 * 
 */

class Permohonan extends Admin_portal
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_permohonan');
    }

    public function index()
    {
        $this->_set_page_role('r');

        // load jquery validator
        $this->load_css('assets/global/jquery-form-validator-net/form-validator/theme-default.min.css');
        $this->load_js('assets/global/jquery-form-validator-net/form-validator/jquery.form-validator.min.js');        

        parent::display('index', NULL, 'footer_index');
    }

    public function create_permohonan()
    {
        $this->_set_page_role('c');

        //load wysiwyg
        $this->load_css('assets/operator/plugins/html5-editor/bootstrap-wysihtml5.css');
        $this->load_js('assets/operator/plugins/html5-editor/wysihtml5-0.3.0.js');
        $this->load_js('assets/operator/plugins/html5-editor/bootstrap-wysihtml5.js');

        $this->load_css('assets/global/jquery-form-validator-net/form-validator/theme-default.min.css');
        $this->load_js('assets/global/jquery-form-validator-net/form-validator/jquery.form-validator.min.js');

        // select2
        $this->load_css('assets/operator/plugins/select2/dist/css/select2.min.css');
        $this->load_js('assets/operator/plugins/select2/dist/js/select2.full.min.js');
        $this->load_js('assets/operator/plugins/bootstrap-select/bootstrap-select.min.js');

        // $data['rs_categories'] = $this->m_post->get_categories();
        // $data['rs_channel'] = $this->m_post->get_channel();
        // $data['rs_tags'] = $this->m_post->get_tags();

        // echo "<pre>";
        // print_r($data);
        // exit();

        parent::display('create_permohonan');
    }

    public function add_process()
    {
        $this->_set_page_role('c');

        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        // load form uuid & validation
        $this->load->library('uuid');
        $this->load->library('form_validation');

        // $this->form_validation->set_error_delimiters('<p>', '');
        $this->form_validation->set_rules('nama_pemohon', 'Nama Pemohon', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Telephone', 'required|trim');
        $this->form_validation->set_rules('identitas', 'Identitas', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');

        // run validation
        if ($this->form_validation->run($this) == false) {
            $data['pesan']  = validation_errors();
            $data['status'] = false;
            return $this->output->set_output(json_encode($data));
        }

        // echo "<pre/>";
        // print_r($this->input->post());
        // exit();

        // membuat ID arsitek dengan UUID, dengan 32karakter (tanpa tanda -)
        $data_simpan['permohonan_id']     = $this->uuid->v4(true);
        $data_simpan['nama_pemohon']      = $this->input->post('nama_pemohon', true);
        $data_simpan['email']             = $this->input->post('email', true);
        $data_simpan['alamat']            = $this->input->post('alamat', true);
        $data_simpan['telepon']           = $this->input->post('telepon', true);
        $data_simpan['identitas']         = $this->input->post('identitas', true);
        $data_simpan['status']            = $this->input->post('status', true);
        $data_simpan['created_at']        = date('Y-m-d H:i:s');
        $data_simpan['ctb']               = $this->com_user['user_id'];
        $data_simpan['updated_at']        = date('Y-m-d H:i:s');
        $data_simpan['mdb']               = $this->com_user['user_id'];

        if ($this->m_permohonan->tambah_data('permohonan', $data_simpan)) {
            $result['status'] = true;
            $result['pesan']  = 'Data berhasil disimpan.';
        } else {
            $eror             = $this->m_permohonan->get_db_error();
            $result['status'] = false;
            $result['pesan']  = 'Data gagal disimpan. Eror kode : ' . $eror['code'];
        }
        return $this->output->set_output(json_encode($result));
    }

    public function get_list_permohonan()
    {
        $this->_set_page_role('r');

        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        $rs_permohonan = $this->m_permohonan->get_list_permohonan();
        // $tanggal = format_tanggal_indonesia($rs_permohonan['tanggal']);
        // for ($i=0; $i < count($rs_permohonan); $i++) { 
        //     $data = $rs_permohonan['data'][$i];
        // }

        // echo "<pre>";
        // var_dump(format_tanggal_indonesia($data['tanggal']));        
        // exit();
        return $this->output->set_output(json_encode($rs_permohonan));
    }

    // detail data permohonan
    public function get_detail($id = NULL)
    {        

        if(empty($id))
            redirect('permohonan');        

        // magnific-popup
        // $this->load_css('assets/operator/plugins/magnific-popup/dist/magnific-popup.css');
        // $this->load_js('assets/operator/plugins/magnific-popup/dist/jquery.magnific-popup.min.js');        

        $data['permohonan'] = xss_clean($this->m_permohonan->get_detail_permohonan($id));

        //get list permohonan jika ada
        $data['rs_permohonan_kode'] = xss_clean($this->m_permohonan->get_permohonan_kode($id));

        // echo "<pre>";
        // print_r($data['permohonan']);
        // exit();

        $data['not_found'] = 'assets/image/identitas/image-not-found.png';
                                    
        parent::display('list_permohonan', $data, 'footer_list_permohonan');        
    }

    public function download_identitas($id = null)
    {
        $this->load->helper('download');
        
        $result = $this->m_permohonan->get_detail_permohonan($id);

        $gambar_identitas  = $result['gambar_identitas'];        

        force_download($gambar_identitas, null);        
    }

    public function download_permohonan($id = null)
    {
        $this->load->helper('download');
        
        $result = $this->m_permohonan->get_detail_permohonan($id);
        
        $gambar_permohonan = $result['gambar_permohonan'];

        force_download($gambar_permohonan, null);        
    }

    // menampilkan edit data permohonan
    public function edit_data($id = NULL)
    {        
        if(empty($id))
            redirect('permohonan');

        $data['permohonan'] = $this->m_permohonan->edit_data($id);     

        parent::display('edit_permohonan', $data);        
    }

    /**
     * check
     */
    public function get_view()
    {
        $this->_set_page_role('r');

        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        // parameter lihat data
        $post['permohonan_id'] = $this->input->post('data_id');
        $data['data'] = $this->m_permohonan->get_view($post);

        if (!empty($data['data'])) {
            $data['status'] = TRUE;
            $data['pesan'] = 'Data berhasil dihapus.';
        } else {
            $error = $this->m_post->get_db_error();
            $data['status'] = FALSE;
            $data['pesan'] = 'Data gagal dihapus. Error kode : ' . $error['code'];
        }

        return $this->output->set_output(json_encode($data));
    }

    /**
     * get_by_id()
     * menampilkan detail data untuk form edit modal
     */
    public function get_by_id()
    {
        $this->_set_page_role('r');

        if (!$this->input->is_ajax_request() || $this->input->post('data_id', TRUE) == '') {
            show_404();
        }

        // $result = $this->m_permohonan->get_view($this->input->post('data_id', TRUE));
        $post['permohonan_id'] = $this->input->post('data_id', TRUE);
        $result = $this->m_permohonan->get_view($post);

        if (!empty($result)) {
            $data['status'] = TRUE;
            $data['data'] = $result;
        } else {
            $data['status'] = FALSE;
            $data['data'] = null;
            $data['pesan'] = $this->m_permohonan->get_error_message();
        }
        return $this->output->set_output(json_encode($data));
    }

    public function delete_process()
    {
        $this->_set_page_role('d');

        if (!$this->input->is_ajax_request())
            return;

        if ($this->input->post() == '') {
            $respon['status'] = FALSE;
            $respon['pesan'] = 'Data ID tidak tersedia';
        }       

        $hapus = $this->input->post('data_id');        
        $result = $this->m_permohonan->get_detail_permohonan($this->input->post('data_id'));

        if ($this->m_permohonan->hapus($hapus, $result)) {
            $data['status'] = TRUE;
            $data['pesan'] = 'Data berhasil dihapus.';
        } else {
            $error = $this->m_permohonan->get_db_error();
            $data['status'] = FALSE;
            $data['pesan'] = 'Data gagal dihapus. Error kode : ' . $error['code'];
        }
        return $this->output->set_output(json_encode($data));
    }
}
