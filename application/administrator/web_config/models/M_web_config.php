<?php

require_once APPPATH . 'models/M_model_base.php';

class M_web_config extends M_model_base
{
    public function __construct()
    {
        parent::__construct();
    }    

    public function get_list_web_config()
    {
        $sql = $this->db->select('config_id, config_name, config_value, mdd')
            ->from('sys_config')
            ->get();

        if ($sql->num_rows() > 0) {
            $result = $sql->result_array();
            $sql->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function update_batch($data)
    {
        $this->db->update_batch('sys_config', $data, 'config_id');
        return $this->db->affected_rows();
    }

    public function get_id()
    {
        $sql = $this->db->select("config_id, config_name, config_value")
            ->from('sys_config')
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
