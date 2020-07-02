<?php

/*
 * By : Praditya Kurniawan
 * website : http://masiyak.com
 * email : aku@masiyak.com
 * 
 */

require_once APPPATH . 'models/M_model_base.php';

class M_channel extends M_model_base
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_list_channel()
    {

        // select data
        $rs_data = $this->db->select('c.channel_id, c.channel_name, c.channel_shortname, c.channel_slug')
            ->from('channel c');

        // get total records data
        $option['recordsTotal'] = $rs_data->count_all_results('', FALSE);

        // searching function should be here
        if (!empty($this->input->post('search')['value'])) {
            // get list colomn
            $lskolom = ['c.channel_name', 'c.channel_slug', 'c.channel_description', 'c.channel_shortname'];
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
            $btn = '<button class="btn btn-md btn-warning btn-circle-md btn-circle edit-data" style="margin-right: 5px;" data-id="' . $vdata['channel_id'] . '"><i class="fas fa-pencil-alt"></i> </button>';
            $btn .= '<button class="btn btn-md btn-circle btn-circle-md btn-danger hapus-data" data-id="' . $vdata['channel_id'] . '"><i class="fa fa-trash"></i></button>';

            $vdata = xss_clean($vdata);
            $vdata['aksi'] = $btn;

            $rs_data_[] = $vdata;
        }
        $option['data'] = $rs_data_;
        return $option;
    }
}
