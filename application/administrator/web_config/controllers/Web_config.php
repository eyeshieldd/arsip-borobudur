<?php

class Web_config extends Admin_portal
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_web_config');
    }

    public function index()
    {
        $this->_set_page_role('u');

        // load jquery validator
        $this->load_css('assets/global/jquery-form-validator-net/form-validator/theme-default.min.css');
        $this->load_js('assets/global/jquery-form-validator-net/form-validator/jquery.form-validator.min.js');

        $rsdata['config'] = $this->m_web_config->get_list_web_config();

        foreach ($rsdata['config'] as $key => $dt) {
            $data['name'][$dt['config_name']] = $dt['config_name'];
            $data['value'][$dt['config_name']] = $dt['config_value'];
            $data['mdd'][$dt['config_name']] = $dt['mdd'];            
        }
        // echo "<pre>";
        // print_r($data);
        // exit();
        parent::display('edit', $data, 'footer_edit');
    }    

    public function save_process()
    {
        $this->_set_page_role('c');

        if (!$this->input->is_ajax_request())
            show_404();

        // load form validation        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('instagram_url', 'Instagram Url', 'required|trim');
        $this->form_validation->set_rules('facebook_url', 'Facebook URL', 'required|trim');
        $this->form_validation->set_rules('twitter_url', 'Twitter URL', 'required|trim');
        $this->form_validation->set_rules('web_title', 'Title Web', 'required|trim');
        $this->form_validation->set_rules('web_footer', 'Footer Web', 'required|trim');
        $this->form_validation->set_rules('company_name', 'Company Name', 'required|trim');
        $this->form_validation->set_rules('company_address', 'Company Address', 'required|trim');
        $this->form_validation->set_rules('company_email', 'Company Email', 'required|trim');
        $this->form_validation->set_rules('company_telp', 'Company Telp', 'required|trim');        
        $this->form_validation->set_rules('meta_title', 'Meta Title', 'required|trim');
        $this->form_validation->set_rules('meta_description', 'Meta Description', 'required|trim');
        $this->form_validation->set_rules('meta_tags', 'Meta Tags', 'required|trim');
        $this->form_validation->set_rules('meta_image', 'Meta Image', 'required|trim');
        $this->form_validation->set_rules('meta_keyword', 'Meta Keyword', 'required|trim');
        $this->form_validation->set_rules('meta_author', 'Meta Author', 'required|trim');
        $this->form_validation->set_rules('admin_email', 'Admin Email', 'required|trim');
        $this->form_validation->set_rules('protocol', 'Protocol', 'required|trim');
        $this->form_validation->set_rules('smtp_host', 'Smtp Host', 'required|trim');
        $this->form_validation->set_rules('smtp_port', 'Smtp Port', 'required|trim|integer');
        $this->form_validation->set_rules('smtp_user', 'Smtp User', 'required|trim');
        $this->form_validation->set_rules('smtp_pass', 'Smtp Password', 'required|trim');
        $this->form_validation->set_rules('crlf', 'Crlf', 'required|trim');
        $this->form_validation->set_rules('newline', 'Newline', 'required|trim');
        
        // run validation
        if ($this->form_validation->run($this) == FALSE) {
            $data['pesan'] = validation_errors();
            $data['status'] = FALSE;
            return $this->output->set_output(json_encode($data));
        }        

        $dtid = $this->m_web_config->get_id();
        foreach ($dtid as $key => $value) {
            $data[$key]['config_id']    = $value['config_id'];
            $data[$key]['config_value'] = $this->input->post($value['config_name']);
            $data[$key]['mdd']          = date('Y-m-d H:i:s');
        }
        // echo "<pre>";
        // print_r($data);
        // print_r(($this->input->post()));
        // exit();            

        if ($this->m_web_config->update_batch($data)) {
            $result['status'] = TRUE;
            $result['pesan']  = 'Data berhasil disimpan.';
        } else {
            $eror             = $this->m_web_config->get_db_error();
            $result['status'] = FALSE;
            $result['pesan']  = 'Data gagal disimpan. Eror kode : ' . $eror['code'];
        }

        return $this->output->set_output(json_encode($result));
    }    
}
