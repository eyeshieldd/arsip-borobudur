<?php

require_once APPPATH . 'models/M_model_base.php';

class M_post extends M_model_base
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_slug($slug)
    {
        $this->db->select('post_title, post_content, meta_title, meta_keyword, meta_description')
            ->where('post_slug', $slug);
        return $this->db->get('posts')->row_array();
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
}
