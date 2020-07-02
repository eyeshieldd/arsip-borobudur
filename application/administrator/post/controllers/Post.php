<?php

/*
 * By : Praditya Kurniawan
 * website : http://masiyak.com
 * email : aku@masiyak.com
 *
 */

class Post extends Admin_portal
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_post');
    }

    public function index()
    {
        $this->_set_page_role('r');

        parent::display('index', null, 'footer_index');
    }


    public function create_post()
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

        $data['rs_categories'] = $this->m_post->get_categories();
        $data['rs_channel'] = $this->m_post->get_channel();
        $data['rs_tags'] = $this->m_post->get_tags();

        // echo "<pre>";
        // print_r($data);
        // exit();

        parent::display('create_post', $data, 'footer_create_post');
    }

    public function save_process()
    {
        $this->_set_page_role('c');

        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        // load form validation
        $this->load->library('form_validation');
        // $this->form_validation->set_error_delimiters('<p>', '');
        $this->form_validation->set_rules('post_title', 'Post Title', 'required|trim');
        $this->form_validation->set_rules('post_content', 'Post Content', 'required|trim');
        $this->form_validation->set_rules('post_status', 'Post Status', 'required|trim');

        // run validation
        if ($this->form_validation->run($this) == false) {
            $data['pesan']  = validation_errors();
            $data['status'] = false;
            return $this->output->set_output(json_encode($data));
        }

        $data_simpan['channel_id']       = $this->input->post('channel_id', true);
        $data_simpan['categories_id']    = $this->input->post('categories_id', true);
        $data_simpan['post_title']       = $this->input->post('post_title');
        $data_simpan['post_content']     = $this->input->post('post_content');
        $data_simpan['post_status']      = $this->input->post('post_status');        
        
        $dt = $this->m_post->count_title($data_simpan['post_title']);

        $post_slug = url_title(strtolower($this->input->post('post_title', true)));

        // check data post_slug - slug yang sama sama
        if ($dt['jumlah_data'] > 0) {
            $post_slug = $post_slug. '-' .$dt['jumlah_data'];
        }
        
        $data_simpan['post_slug']        = $post_slug;
        $data_simpan['meta_title']       = $this->input->post('meta_title');
        $data_simpan['meta_description'] = $this->input->post('meta_description');
        $data_simpan['meta_keyword']     = $this->input->post('meta_keyword');
        $data_simpan['ctb']              = $this->com_user['user_id'];
        $data_simpan['ctd']              = date('Y-m-d H:i:s');
        $data_simpan['mdb']              = $this->com_user['user_id'];
        $data_simpan['mdd']              = date('Y-m-d H:i:s');

        if ($this->m_post->tambah_post($data_simpan, $this->input->post('post_tags'))) {
            $result['status'] = true;
            $result['pesan']  = 'Data berhasil disimpan.';
        } else {
            $eror             = $this->m_post->get_db_error();
            $result['status'] = false;
            $result['pesan']  = 'Data gagal disimpan. Eror kode : ' . $eror['code'];
        }
        return $this->output->set_output(json_encode($result));
    }

    // detail data post - ngak dipakai
    public function get_detail($id)
    {
        $data['post'] = $this->m_post->get_detail($id);

        parent::display('list_post', $data);        
    }

    // menampilkan form edit data
    public function edit_post($id)
    {
        $this->_set_page_role('u');

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
        
        $data['post'] = $this->m_post->edit_post($id);
        $data['tags'] = $this->m_post->edit_tags($id);

        $data['rs_categories'] = $this->m_post->get_categories();
        $data['rs_channel'] = $this->m_post->get_channel();
        $data['rs_tags'] = $this->m_post->get_tags();
        // echo "<pre/>";
        // print_r($data['rs_tags']);
        // exit();

        // ambil data tags berdasar post id
        // $rs_tes = array();
        // foreach ($this->m_backend->get_group_by_user_id($this->input->post('data_id', true)) as $vgroupname) {
        //     $rs_grup[] = $vgroupname['group_id'];
        // };

        parent::display('edit_post', $data, 'footer_edit_post');
    }

    // update
    public function update_process()
    {
        $this->_set_page_role('u');

        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        // load form validation
        $this->load->library('form_validation');
        // $this->form_validation->set_error_delimiters('<p>', '');
        $this->form_validation->set_rules('post_title', 'Post Title', 'required|trim');
        $this->form_validation->set_rules('post_content', 'Post Content', 'required|trim');
        $this->form_validation->set_rules('post_status', 'Post Status', 'required|trim');

        // run validation
        if ($this->form_validation->run($this) == false) {
            $data['pesan']  = validation_errors();
            $data['status'] = false;
            return $this->output->set_output(json_encode($data));
        }
        
        $data_simpan['channel_id']       = $this->input->post('channel_id', true);
        $data_simpan['categories_id']    = $this->input->post('categories_id', true);
        $data_simpan['post_title']       = $this->input->post('post_title', true);
        $data_simpan['post_content']     = $this->input->post('post_content');
        $data_simpan['post_status']      = $this->input->post('post_status');
        // $data_simpan['post_slug']        = url_title(strtolower($this->input->post('post_title', true)));
        $data_simpan['meta_title']       = $this->input->post('meta_title');
        $data_simpan['meta_description'] = $this->input->post('meta_description');
        $data_simpan['meta_keyword']     = $this->input->post('meta_keyword');       
        $data_simpan['mdd']              = date('Y-m-d H:i:s');
        
        if ($this->m_post->ubah_post($data_simpan, $this->input->post('post_id'), $this->input->post('post_tags', true))){
            $result['status'] = true;
            $result['pesan']  = 'Data berhasil diubah.';
        } else {
            $eror             = $this->m_post->get_db_error();
            $result['status'] = false;
            $result['pesan']  = 'Data gagal diubah. Eror kode : ' . $eror['code'];
        }
        return $this->output->set_output(json_encode($result));
    }


    // cara kedua
    function get_list_post()
    {
        $this->_set_page_role('r');

        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        $rs_post = $this->m_post->get_list_post();
        return $this->output->set_output(json_encode($rs_post));
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

        // parameter hapus
        $hapus['post_id'] = $this->input->post('data_id');
        if ($this->m_post->hapus_data('posts', $hapus)) {
            $data['status'] = TRUE;
            $data['pesan'] = 'Data berhasil dihapus.';
        } else {
            $error = $this->m_post->get_db_error();
            $data['status'] = FALSE;
            $data['pesan'] = 'Data gagal dihapus. Error kode : ' . $error['code'];
        }
        return $this->output->set_output(json_encode($data));
    }
}
