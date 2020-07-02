<?php

/*
 * By : Praditya Kurniawan
 * website : http://masiyak.com
 * email : aku@masiyak.com
 * 
 */
require_once APPPATH . 'models/M_model_base.php';

class M_dashboard extends M_model_base {

    public function __construct() {
        parent::__construct();
    }

    public function get_status() {
        $sql = $this->db->query("SELECT status ,count(status) as jumlah, year(created_at) as tahun from permohonan group by tahun,status ORDER BY tahun ASC");

        if ($sql->num_rows() != 0){
            foreach($sql->result() as $data){
                $result[] = $data;
            }                    
            return $result;        
        }                    
        return array();        
    }

    public function get_status_laporan() {
        $sql = $this->db->query("SELECT status, count(status) as jumlah from permohonan where  year(created_at) = year(curdate()) group by status");

        if ($sql->num_rows() != 0){
            foreach($sql->result() as $data){
                $result[] = $data;
            }                    
            return $result;        
        }                    
        return array();        
    }


    public function get_status_bulan() {
        $sql = $this->db->query("SELECT status, count(status) as jumlah_bulan from permohonan where  month(created_at) = month(curdate()) group by status");

        if ($sql->num_rows() != 0){
            foreach($sql->result() as $data){
                $result[] = $data;
            }                    
            return $result;        
        }                    
        return array();        
    }

    public function get_grafik_bulan() {
        $sql = $this->db->query("SELECT COUNT(*) as total, date_format(created_at, '%M/%Y') AS bulan, status FROM `permohonan` WHERE year(created_at) GROUP BY  MONTH(created_at) DESC , YEAR(created_at), status ");          
        if ($sql->num_rows() != 0){ 
            foreach($sql->result() as $data){
                $result[] = $data;
            }                    
            return $result;        
        }                    
        return array();  
    }

    public function get_grafik() {
        $sql = $this->db->query("SELECT * FROM (SELECT COUNT(*) as total, date_format(created_at, '%Y-%m') AS bulan, status, created_at FROM `permohonan` WHERE year(created_at)  GROUP BY YEAR(created_at), MONTH(created_at) DESC LIMIT 4) AS data ORDER BY created_at asc");          
        if ($sql->num_rows() != 0){ 
            foreach($sql->result() as $data){
                $result[] = $data;
            }                    
            return $result;        
        }                    
        return array();  
    }

    public function get_grafik_tahun() {
        $sql = $this->db->query("SELECT COUNT(*) as totall, date_format(created_at, '%Y') AS tahun FROM `permohonan` WHERE year(created_at) GROUP BY year(created_at)");        


        if ($sql->num_rows() != 0){
            foreach($sql->result() as $data){
                $result[] = $data;
            }                    
            return $result;        
        }                    
        return array();  
    }


    public function get_detail_status() {
        $sql = $this->db->query("SELECT COUNT(permohonan_id) as jumlah, status, date_format(created_at, '%M/%Y') as tahun_det FROM permohonan WHERE month(created_at) GROUP BY MONTH(created_at) DESC , YEAR(created_at)ASC, status
            ");        


        if ($sql->num_rows() != 0){
            foreach($sql->result() as $data){
                $result[] = $data;
            }                    
            return $result;        
        }                    
        return array();  
    }

    public function get_group_status() {
        $sql = $this->db->query("SELECT DISTINCT status FROM permohonan WHERE month(created_at) GROUP BY MONTH(created_at) DESC , YEAR(created_at)ASC, status
            ");        


        if ($sql->num_rows() != 0){
            foreach($sql->result() as $data){
                $result[] = $data;
            }                    
            return $result;        
        }                    
        return array();  
    }



}
