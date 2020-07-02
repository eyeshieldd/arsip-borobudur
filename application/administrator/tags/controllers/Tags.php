<?php

/*
 * By : Praditya Kurniawan
 * website : http://masiyak.com
 * email : aku@masiyak.com
 * 
 */

class Tags extends Admin_portal {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_tags');
    }

    public function index() {
        $this->_set_page_role('r');

        // load jquery validator
        $this->load_css('assets/global/jquery-form-validator-net/form-validator/theme-default.min.css');
        $this->load_js('assets/global/jquery-form-validator-net/form-validator/jquery.form-validator.min.js');

        parent::display('index', NULL, 'footer_index');
    }

    public function get_list_tags(){
    	$this->_set_page_role('r');

    	if(!$this->input->is_ajax_request())
    		show_404();

    	$rs_tags = $this->m_tags->get_list_tags();
    	return $this->output->set_output(json_encode($rs_tags));
    }

    public function add_process(){
        $this->_set_page_role('c');

        if(!$this->input->is_ajax_request())
            show_404();

        // load form validation
        $this->load->library('form_validation');
        // $this->form_validation->set_error_delimiters('<p>', '');
        $this->form_validation->set_rules('tags_name', 'Tags Name', 'required|trim');

        // run validation
        if ($this->form_validation->run($this) == false) {
            $data['pesan']  = validation_errors();
            $data['status'] = false;
            return $this->output->set_output(json_encode($data));
        }

        // library uuid
        $this->load->library('uuid');

        $data_simpan['tags_name']    = $this->input->post('tags_name', true);
        $data_simpan['tags_slug']    = url_title(strtolower($this->input->post('tags_name', true)));
        $data_simpan['ctb']          = $this->com_user['user_id'];
        $data_simpan['ctd']          = date('Y-m-d H:i:s');
        $data_simpan['mdb']          = $this->com_user['user_id'];
        $data_simpan['mdd']          = date('Y-m-d H:i:s');

        if ($this->m_tags->tambah_data('tags', $data_simpan)) {
            $result['status'] = true;
            $result['pesan']  = 'Data berhasil disimpan.';
        } else {
            $eror             = $this->m_tags->get_db_error();
            $result['status'] = false;
            $result['pesan']  = 'Data gagal disimpan. Eror kode : ' . $eror['code'];
        }
        return $this->output->set_output(json_encode($result));
    }

    public function delete_process(){
         // set permission
        $this->_set_page_role('d');

        // validasi hanya request lewat ajax
        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        // parameter
        $hapus['tags_id'] = $this->input->post('data_id');
         if ($this->m_tags->hapus_data('tags', $hapus)) {
            $result['status'] = true;
            $result['pesan']  = 'Data berhasil dihapus.';
        } else {
            $eror             = $this->m_tags->get_db_error();
            $result['status'] = false;
            $result['pesan']  = 'Data gagal dihapus. Eror kode : ' . $eror['code'];
        }
        return $this->output->set_output(json_encode($result));
    }

}
