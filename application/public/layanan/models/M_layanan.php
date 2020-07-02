<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
 * By : Praditya Kurniawan
 * website : http://masiyak.com
 * email : aku@masiyak.com
 *
 */
require_once APPPATH . 'models/M_model_base.php';

class M_layanan extends M_model_base
{
    var $error_list = array();
    var $file_list = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function simpan($simpan = null, $simpan_detail = null)
    {
        // mulai transaction
        $this->db->trans_begin();

        if(!is_dir('uploads/layanan/'.date('Y-m').'/')){
            mkdir('uploads/layanan/'.date('Y-m').'/');
        }

        $config['upload_path']   = 'uploads/layanan/'.date('Y-m').'/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
        $config['max_size']      = 1024;
        $config['max_width']     = 4096;
        $config['max_height']    = 4096;

        $this->load->library('upload');
        // $this->upload->do_upload('file_identitas');
        $config['file_name'] = $simpan['permohonan_id'].'_file_identitas';
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('file_identitas')) {
            // rollback transaction
            $this->db->trans_rollback();
            // set error message
            $this->error_list[] = 'File identitas gagal di upload. '.$this->upload->display_errors('', '');
            return false;
        }
        $simpan['gambar_identitas'] = $config['upload_path'].$this->upload->data('file_name');
        $this->file_list['gambar_identitas'] = $simpan['gambar_identitas'];

        // upload file surat permohonan
        $config['file_name'] = $simpan['permohonan_id'].'_surat_permohonan';
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('surat_permohonan')) {
            // rollback transaction
            $this->db->trans_rollback();
            // set error message
            $this->error_list[] = 'File surat permohonan gagal di upload. '.$this->upload->display_errors('', '');
            return false;
        }
        $simpan['gambar_permohonan'] = $config['upload_path'].$this->upload->data('file_name');
        $this->file_list['gambar_permohonan'] = $simpan['gambar_permohonan'];
        // tambah data utama
        $this->tambah_data('permohonan', $simpan);

        // kode arsip jika ada
        if (!empty($simpan_detail)) {
            $this->tambah_data_batch('permohonan_kode_arsip', $simpan_detail);
        }

        if ($this->db->trans_status() === false) {
            // set error message
            $this->error_list[] = 'Data gagal disimpan di basis data.';
            // hapus file upload jika gagal simpan
            unlink($simpan['gambar_identitas']);
            unlink($simpan['gambar_permohonan']);
            // roll back transaction
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }

    }

    public function get_file(){
        if(empty($this->file_list))
            return array();

        return $this->file_list;
    }

    public function get_error(){
        if(empty($this->error_list))
            return array();
        $html = '';
        foreach ($this->error_list as $value) {
            $html .= $value.'<br>';
        }
        return $html;
    }

    public function get_web_title(){
        $sql = $this->db->select('config_value')->from('sys_config')
        ->where('config_name', 'web_title')
        ->where('config_group', 'web_config')
        ->get();

        if($sql->num_rows() > 1){
            return $sql->row_array();
        }else{
            return array('config_value'=>'Borobudur Conservation Archive');
        }
    }

    public function get_email_config(){
        $sql = $this->db->select('config_name, config_value')->from('sys_config')
        ->where('config_group', 'mail_config')
        ->get();

        if($sql->num_rows() > 1){
            return $sql->result_array();
        }else{
            return array();
        }
    }

    public function get_last_nomor_layanan(){
        $sql = $this->db->select('MAX(SUBSTRING(nomor_layanan, 4)) AS nomor')->from('permohonan')
        ->get();
        $no = $sql->row_array();

        if($sql->num_rows() > 0 && !empty($no['nomor'])){
            return $no['nomor'] + 1;
        }else{
            return 1001;
        }
    }

    public function get_post_content($slug)
    {
        $this->db->select('post_title, post_content, meta_title, meta_keyword, meta_description')
            ->where('post_slug', $slug);
        return $this->db->get('posts')->row_array();
    }

}
