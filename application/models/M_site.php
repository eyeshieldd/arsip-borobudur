<?php

/*
 * By : Praditya Kurniawan
 * website : http://masiyak.com
 * email : aku@masiyak.com
 * 
 */

class M_site extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
     *  GET SIDEBAR PARENT MENU
     */

    function get_parent_menu($params) {
        $sql = 'SELECT a.menu_id, a.portal_id, a.menu_name, a.menu_desc, a.menu_position, a.menu_order, a.menu_parent,
                a.menu_link, a.menu_icon, a.menu_fonticon , b.permission FROM sys_menu a
                INNER JOIN sys_permission b USING(menu_id)
                INNER JOIN sys_portal c USING(portal_id)
                WHERE (b.group_id IN ?) AND a.menu_position = "lfm"
                AND a.menu_parent = ? AND SUBSTRING(b.permission,2,1) = 1 AND c.portal_number = ?
                AND a.menu_show = 1 GROUP BY menu_id ORDER BY a.menu_order';
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_child_menu_by_parent($params) {
        $sql = "SELECT a.*, b.permission FROM sys_menu a
                INNER JOIN sys_permission b USING(menu_id)
                WHERE b.group_id = ? AND menu_position = 'left_sidebar'
                AND a.menu_parent = ? AND SUBSTRING(b.permission,2,1) = 1 AND a.menu_portal = ?
                AND a.menu_show = 1 ORDER BY a.menu_order";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // fungsi ambil permission
    function get_page_role_level($params) {
        $sql = "SELECT a.menu_id, b.permission FROM sys_menu a
                INNER JOIN sys_permission b USING(menu_id) 
                WHERE a.menu_link = ? AND b.group_id IN ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // fungsi ambil permission
    function get_id_menu($params) {
        $sql = "SELECT a.menu_id, b.permission FROM sys_menu a
                INNER JOIN sys_permission b USING(menu_id) 
                WHERE a.menu_link = ? AND b.group_id = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_detail_link_menu_by_name($params) {
        $sql = "SELECT menu_name, menu_desc, menu_parent, menu_link, menu_icon, menu_fonticon 
                FROM sys_menu
                WHERE menu_link = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_detail_link_menu_by_id($params) {
        $sql = "SELECT menu_name, menu_desc, menu_parent, menu_link, menu_icon, menu_fonticon 
                FROM sys_menu
                WHERE menu_id = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_web_config() {
        $sql = "SELECT config_name, config_value FROM sys_config
                WHERE config_group = 'web_config'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_meta_config() {
        $sql = "SELECT config_name, config_value FROM sys_config
                WHERE config_group = 'meta_config'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();

            // create variabel
            foreach ($result as $vmeta) {
                $meta_config[$vmeta['config_name']] = $vmeta['config_value'];
            }
            return $meta_config;
        } else {
            return array();
        }
    }

    /*
     * UNTUK MENU PUBLIC
     *  
     */

    function get_menu_public($params) {
        $sql = "SELECT sm.menu_id, sm.menu_parent, sm.menu_name, sm.menu_desc, sm.menu_link  
                FROM sys_menu sm
                INNER JOIN sys_portal sp ON sp.portal_id = sm.menu_portal
                WHERE sp.portal_id = ? AND sm.menu_parent = ? AND sm.menu_position = 'top_menu'
                AND sm.menu_show = 1
                ORDER BY sm.menu_order";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_list_profil() {
        $sql = "SELECT judul, slug, deskripsi
                FROM post p
                WHERE p.katslug = 'profil' AND DATE(p.published) <= DATE(NOW()) AND p.status = 1
                ORDER BY published DESC
                LIMIT 10";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_list_layanan() {
        $sql = "SELECT judul, slug, deskripsi
                FROM post p
                WHERE p.katslug = 'layanan' AND DATE(p.published) <= DATE(NOW()) AND p.status = 1
                ORDER BY published DESC
                LIMIT 10";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_list_produk() {
        $sql = "SELECT judul, slug, deskripsi
                FROM post p
                WHERE p.katslug = 'produk' AND DATE(p.published) <= DATE(NOW()) AND p.status = 1
                ORDER BY published DESC
                LIMIT 10";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_list_info() {
        $sql = "SELECT kategori, katslug 
                FROM post p
                WHERE p.katslug != 'profil' AND p.katslug != 'produk' AND p.katslug != 'layanan' AND p.katslug != 'karir' 
                AND DATE(p.published) <= DATE(NOW()) AND p.status = 1
                GROUP BY katslug
                ORDER BY published DESC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_list_widget() {
        $sql = "SELECT nama_widget, gambar, keterangan, telepon FROM widget";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_slider() {
        $sql = "SELECT slider_id, original FROM slider WHERE status = 1 ORDER BY ordering ASC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

}
