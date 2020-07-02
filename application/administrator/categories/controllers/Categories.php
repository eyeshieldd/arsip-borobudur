<?php

/*
 * By : Praditya Kurniawan
 * website : http://masiyak.com
 * email : aku@masiyak.com
 *
 */

class Categories extends Admin_portal
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_categories');
    }

    public function index()
    {
        $this->_set_page_role('r');

        // load jquery validator
        $this->load_css('assets/global/jquery-form-validator-net/form-validator/theme-default.min.css');
        $this->load_js('assets/global/jquery-form-validator-net/form-validator/jquery.form-validator.min.js');

        // get list categories
        $data['rs_categories'] = $this->m_categories->get_list_category();

        parent::display('index', $data, 'footer_index');
    }

    public function get_list_categories()
    {
        $this->_set_page_role('r');

        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        $rs_categories = $this->m_categories->get_list_categories();
        return $this->output->set_output(json_encode($rs_categories));
    }

    public function add_process()
    {
        $this->_set_page_role('c');

        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        // load form validation
        $this->load->library('form_validation');
        // $this->form_validation->set_error_delimiters('<p>', '');
        $this->form_validation->set_rules('categories_name', 'Tags Name', 'required|trim');
        $this->form_validation->set_rules('categories_description', 'Tags Name', 'required|trim');
        $this->form_validation->set_rules('parent_categories', 'Tags Name', 'trim');

        // run validation
        if ($this->form_validation->run($this) == false) {
            $data['pesan']  = validation_errors();
            $data['status'] = false;
            return $this->output->set_output(json_encode($data));
        }

        $data_simpan['categories_name']        = $this->input->post('categories_name', true);
        $data_simpan['categories_description'] = $this->input->post('categories_description', true);
        $data_simpan['categories_slug']        = url_title(strtolower($this->input->post('categories_name', true)));
        $data_simpan['parent_categories']      = $this->input->post('parent_categories', true);
        $data_simpan['ctb']                    = $this->com_user['user_id'];
        $data_simpan['ctd']                    = date('Y-m-d H:i:s');
        $data_simpan['mdb']                    = $this->com_user['user_id'];
        $data_simpan['mdd']                    = date('Y-m-d H:i:s');

        if ($this->m_categories->tambah_data('categories', $data_simpan)) {
            $result['status'] = true;
            $result['pesan']  = 'Data berhasil disimpan.';
        } else {
            $eror             = $this->m_categories->get_db_error();
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
        $hapus['categories_id'] = $this->input->post('data_id');
         if ($this->m_categories->hapus_data('categories', $hapus)) {
            $result['status'] = true;
            $result['pesan']  = 'Data berhasil dihapus.';
        } else {
            $eror             = $this->m_categories->get_db_error();
            $result['status'] = false;
            $result['pesan']  = 'Data gagal dihapus. Eror kode : ' . $eror['code'];
        }
        return $this->output->set_output(json_encode($result));
    }

}
