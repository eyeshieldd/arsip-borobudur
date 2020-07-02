<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
 * By : Praditya Kurniawan
 * website : http://masiyak.com
 * email : aku@masiyak.com
 *
 */
require_once APPPATH . 'models/M_model_base.php';

class M_home extends M_model_base
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_slider()
    {
        $sql = $this->db->select('slider_id, image_url, title, caption, is_active')
            ->from('slider')
            ->where('is_active', 1)
            ->order_by('slider_id')->get();

        if ($sql->num_rows() > 0) {
            $result = $sql->result_array();
            
            $sql->free_result();
            return $result;
        } else {
            return array();
        }
    }

}
