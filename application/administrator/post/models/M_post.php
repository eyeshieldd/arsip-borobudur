<?php

/*
 * By : Praditya Kurniawan
 * website : http://masiyak.com
 * email : aku@masiyak.com
 *
 */

require_once APPPATH . 'models/M_model_base.php';

class M_post extends M_model_base
{

    public function __construct()
    {
        parent::__construct();
    }

    public function tambah_post($post = null, $post_tags = null)
    {
        $this->db->trans_begin();
        $this->tambah_data('posts', $post);

        $post_id = $this->db->insert_id();

        if (!empty($post_tags)) {
            $dt_tags = [];
            foreach ($post_tags as $vtags) {
                $d['post_id'] = $post_id;
                $d['tags_id'] = $vtags;
                $d['ctd'] = date('Y-m-d H:i:s');
                $dt_tags[] = $d;
            }
            $this->tambah_data_batch('posts_tags', $dt_tags);
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    // ubah post - $tabel, $kolom, $id = null, $data
    public function ubah_post($post_data = NULL, $post_id, $post_tags = array())
    {        
        $this->db->trans_begin();
                

        $this->ubah_data('posts', 'post_id', $post_id, $post_data);
        
        $this->hapus_data('posts_tags', array('post_id' => $post_id));        
        
        if (!empty($post_tags)) {
            $dt_ptags = [];
            foreach ($post_tags as $i => $vtags) {
                $d[$i]['post_id'] = $post_id;
                $d[$i]['tags_id'] = $vtags;
                $dt_ptags = $d;       
            }
            $this->tambah_data_batch('posts_tags', $dt_ptags);
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function get_channel()
    {
        $sql = $this->db->select('channel_id, channel_name')
            ->from('channel')
            ->get();

        if ($sql->num_rows() > 0) {
            $result = $sql->result_array();
            $sql->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function get_categories()
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

    public function get_tags()
    {
        $sql = $this->db->select('tags_id, tags_name')
            ->from('tags')
            ->get();

        if ($sql->num_rows() > 0) {
            $result = $sql->result_array();
            $sql->free_result();
            return $result;
        } else {
            return array();
        }
    }


    public function get_list_post()
    {
        $sql = "SELECT p.post_id, p.post_title, p.post_status, c.channel_name
                    FROM posts p
                    JOIN channel c 
                    ON p.channel_id = c.channel_id";

        // search
        $where = '';
        // nama lengkap
        if (isset($params['post_title']) && !empty($params['post_title'])) {
            if (!empty($where)) {
                $where .= ' AND ';
            }
            $where .= '(p.post_title LIKE "%' . $this->db->escape_like_str($params['post_title']) . '%")';
        }
        // where clause
        if (!empty($where)) {
            $sql = $sql . ' WHERE ' . $where;
        }

        $sql .= ' ORDER BY post_title ASC';
        // hitung filtered data
        $filteredRow = $this->db->query($sql)->num_rows();


        /*
         * Parameter yang wajib ada untuk datatabel : 
         * 1. recordsTotal => berisi jumlah total keseluruhan data
         * 2. draw => langsung ambil parameter post draw
         * 3. recordsFiltered => berisi jumlah total data dengan parameter pencarian (sejumlah data pencarian)
         * 4. data => data yang ditampilkan
         */

        // run query
        $rs_post = $this->db->query($sql);

        // membuat nomor data
        $no = $this->input->post('start') + 1;

        // jika ada data maka buat susunan data
        if ($rs_post->num_rows() > 0) {
            foreach ($rs_post->result_array() as $vpost) {
                
                $aksi_kolom = cek_akses(' <a class="btn btn-md btn-warning btn-circle-md btn-circle" href="'.site_url() .'/post/edit_post/' . $vpost['post_id'] . '"><i class="fas fa-pencil-alt"></i></a>', 'u');
                // $aksi_kolom .= cek_akses(' <button class="btn btn-md btn-danger btn-circle-md btn-circle hapus-data" data-id="' . $vpost['post_id'] . '"><i class="fa fa-trash"></i> </button>', 'd');

                $d['post_id'] = $vpost['post_id'];
                $d['post_title'] = $vpost['post_title'];
                $d['channel_name'] = $vpost['channel_name'];
                $d['post_status'] = $vpost['post_status'];
                $d['aksi'] = $aksi_kolom;

                $data['data'][] = $d;
            }
        } else {
            // jika kosong maka data diisi array kosong
            $data['data'] = array();
        }

        // return data
        return $data;
    }

    public function get_detail($id)
    {
        return $this->db->where('post_id', $id)->get('posts')->row();
    }

    public function edit_post($id)
    {
        // Code success
        // return $this->db->where('post_id', $id)->get('posts')->row();
        
        // Try Left join 3 tabel Channel, Categories, Post
        $this->db->select('p.post_id, p.post_title, p.post_slug, ch.channel_id, ch.channel_name, ct.categories_id, ct.categories_name, p.post_content, p.post_status, p.meta_title, p.meta_description, p.meta_keyword');
        $this->db->from('posts p'); 
        $this->db->join('categories ct', 'ct.categories_id = p.categories_id', 'left');
        $this->db->join('channel ch', 'ch.channel_id = p.channel_id', 'left');
        $this->db->where('p.post_id',$id);

        $query = $this->db->get(); 
        if($query->num_rows() != 0)
        {
            return $query->row_array(); // row_array()
        }
        else
        {
            return false;
        }        
    }

    public function edit_tags($id)
    {
        // Code success
        // return $this->db->where('tags_id', $id)->get('tags')->row();
        
        // Try Left join 3 tabel post, posts_tags, tags
        $this->db->select('t.tags_id, t.tags_name');
        $this->db->from('posts_tags pt'); 
        $this->db->join('posts p', 'p.post_id = pt.post_id', 'left');        
        $this->db->join('tags t', 't.tags_id = pt.tags_id', 'left');        
        $this->db->where('p.post_id',$id);

        $query = $this->db->get(); 
        if($query->num_rows() != 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        } 
        
    }

    // tampilkan detail post
    public function get_detail_post($userId)
    {
        // $this->db->where('post_id', $post_id);
        // $query = $this->db->get('posts')->result();


        // $sql = 'SELECT * FROM posts WHERE post_id = ?';

        // $sql = "SELECT p.post_id, p.post_title, p.post_status, c.channel_name
        //             FROM posts p
        //             JOIN channel c 
        //             ON p.channel_id = c.channel_id
        //             where post_id = ?";
        // $data = array();
        // $post_id = array('post_id', $id);        
        // $sql = $this->db->get_where('posts', $post_id, 1);
        $this->db->where('userId',$userId);
        $this->db->from('posts');
        $q = $this->db->get();
        return $q->result();

        // $this->db->select('*');
        // $this->db->from('posts');
        // $this->db->where('post_id =', $params);
        // $query = $this->db->get();

        // die(var_dump($query));
        if ($sql->num_rows() > 0) {
            $result = $sql->row_array();
            $sql->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function count_title($param)
    {
        $sql = "SELECT COUNT(post_title) AS jumlah_data FROM posts WHERE post_title = ?";

        $query = $this->db->query($sql, $param); 
        if($query->num_rows() != 0)
        {
            return $query->row_array();
        }
        else
        {
            return array();
        }
    }
}
