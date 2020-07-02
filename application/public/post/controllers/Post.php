<?php

/*
 * By : Praditya Kurniawan
 * website : http://masiyak.com
 * email : aku@masiyak.com
 * 
 */

class Post extends Public_portal
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_post');        
    }

    public function index($slug = NULL)
    {
        if(empty($slug)){
            redirect();
        }
        $data['content'] = $this->m_post->get_slug($slug);
        if(empty($data['content'])){
            show_404();
        }
        // get default web title
        $web_title = $this->m_post->get_web_title();
        $data['post_title'] = $web_title['config_value'].' :: '.$data['content']['post_title'];
        // display footer
        $data['display_footer'] = TRUE;
        parent::display('index', xss_clean($data));
    }
}
