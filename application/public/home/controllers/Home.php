<?php

/*
 * By : Praditya Kurniawan
 * website : http://masiyak.com
 * email : aku@masiyak.com
 * 
 */

class Home extends Public_portal {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_home');
    }

    public function index() {

        // get list slider
        $data['rs_slider'] = $this->m_home->get_slider();

        // jika data slider tidak ada, maka diberikan nilai default agar tidak rusak
        if(empty($data['rs_slider'])){
            $data['rs_slider'][0]['title'] = 'Borobudur';
            $data['rs_slider'][0]['caption'] = 'Sunrise from Borobudur';
            $data['rs_slider'][0]['image_url'] = base_url('assets/public/images/backgrounds/borobudur-sunset.jpg');
        }

        parent::display('index', $data);
    }

}
