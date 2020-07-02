<?php

/*
 * By : Praditya Kurniawan
 * website : http://masiyak.com
 * email : aku@masiyak.com
 * 
 */

require_once APPPATH . 'models/M_model_base.php';

class M_Categories extends M_model_base
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_list_categories()
    {

        // select data
        $rs_data = $this->db->select('c.categories_id, c.categories_name, c.categories_slug, c.categories_description, cp.categories_name AS parent')
            ->from('categories c')
            ->join('categories cp', 'cp.categories_id = c.parent_categories', 'left');

        // get total records data
        $option['recordsTotal'] = $rs_data->count_all_results('', FALSE);

        // searching function should be here
        if (!empty($this->input->post('search')['value'])) {
            // get list colomn
            $lskolom = ['c.categories_name', 'c.categories_slug', 'c.categories_description'];
            $rs_data->group_start();
            foreach ($lskolom as $vkolom) {
                $rs_data->or_like($vkolom, $this->input->post('search')['value'], 'both');
            }
            $rs_data->group_end();
        }

        // hitung data setelah filter
        $option['recordsFiltered'] = $rs_data->count_all_results('', FALSE);
        // limit data
        if ($this->input->post('length') > -1)
            $rs_data->limit($this->input->post('length', TRUE), $this->input->post('start', TRUE));
        $option['draw'] = $this->input->post('draw');

        // build data
        $rs_data_ = [];
        foreach ($rs_data->get()->result_array() as  $vdata) {
            // add button
            $btn = '<button class="btn btn-md btn-warning btn-circle-md btn-circle edit-data" style="margin-right: 5px;" data-id="' . $vdata['categories_id'] . '"><i class="fas fa-pencil-alt"></i> </button>';
            $btn .= '<button class="btn btn-md btn-circle btn-circle-md btn-danger hapus-data" data-id="' . $vdata['categories_id'] . '"><i class="fa fa-trash"></i></button>';
            $vdata = xss_clean($vdata);
            $vdata['aksi'] = $btn;

            $rs_data_[] = $vdata;
        }
        $option['data'] = $rs_data_;
        return $option;
    }

    public function get_list_category()
    {
        $sql = $this->db->select('categories_id, categories_name')
            ->from('categories')
            ->get();

        if ($sql->num_rows() > 0) {
            $result = $sql->result_array();
            $sql->free_result();
            return $result;
        } else {
            return array();
        }
    }
}
