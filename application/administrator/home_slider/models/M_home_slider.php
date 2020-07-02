<?php

require_once APPPATH . 'models/M_model_base.php';

class M_home_slider extends M_model_base
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_list_slider()
    {
        $query = $this->db->select('slider_id, image_url, title, caption, is_active')
            ->from('slider')->get();

        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function get_detail_data($id)
    {
        $query = $this->db->select('slider_id, image_url, title, caption, is_active')
            ->from('slider')->where('slider_id', $id)->get();

        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $result['status_val'] = $result['is_active'] == 1 ?'Active':'Not Active';
            if(!empty($result['image_url']) && is_file($result['image_url'])){
                $result['image_url'] = base_url($result['image_url']);
            } else {
                $result['image_url'] = base_url('assets/image/identitas/image-not-found.png');
            }
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function hapus($id)
    {
        if (empty($id)) {
            return false;
        }
        // get id 
        $q = $this->db->select('image_url')->from('slider')->where('slider_id', $id)->get();
        $result = $q->row_array();
        if (empty($result['image_url'])) {
            return false;
        }
        if (!empty($result['image_url'] && is_file($result['image_url']))) {
            unlink($result['image_url']);
        }

        $this->hapus_data('slider', array('slider_id' => $id));

        return true;
    }
}

/* End of file M_home_slider.php */
/* Location: ./application/administrator/home_slider/models/M_home_slider.php */
