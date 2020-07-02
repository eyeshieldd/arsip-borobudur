<?php

/*
 * By : Praditya Kurniawan
 * website : http://masiyak.com
 * email : aku@masiyak.com
 * 
 */

class Dashboard extends Admin_portal {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_dashboard');
    }

    function index() {
        $this->_set_page_role('r');
        $data = NULL;

        $this->load_js('assets/operator/js/moments.min.js');

        $rsdata['status_laporan'] = $this->m_dashboard->get_status_laporan();
        $rsdata['status'] = $this->m_dashboard->get_status();
        $rsdata['grafik'] = $this->m_dashboard->get_grafik();
        // $rsdata['grafik'] = $this->m_dashboard->get_grafik_coba();

        $rsdataa['grafike'] = $this->m_dashboard->get_grafik_tahun();
        $data['laporan_tahunan'] = $this->m_dashboard->get_status();
        $rsdata['status_detail'] = $this->m_dashboard->get_detail_status();
        $rsdata['group_status'] = $this->m_dashboard->get_group_status();
        $data['laporan_bulanan'] = $this->m_dashboard->get_grafik_bulan();

        // Mengambil data laporan
        foreach ($rsdata['status_laporan'] as $dt) {
            $data['status_grafik'][] = $dt->status;
            $data['jumlah_grafik'][] = $dt->jumlah;
        }

        // Mengambil data tahunan
        $th = date('Y') - 4;
        while ($th <= date('Y') - 1) {
            $tahun[$th] = 0;
            $th++;
        }

        foreach ($tahun as $b =>$var) {  
            $data['tahun'][$b] = 0;
            foreach ($rsdataa['grafike'] as $dt) {
                $data['tahun'][] = $dt->totall; 
            }
        }

        foreach ($data['tahun'] as $key => $valu) {
            $data['tah'][] = $key;
            $data['tot'][] = $valu;
        }
       
        // Mengambil data bulanan
        $bl = date('Y-m', strtotime("-5 month"));
        $batas =  date('Y-m');
        while ($bl <= $batas) {
            $bulan[$bl] = 0;
            $bl = date('Y-m', strtotime($bl . " +1 month"));
        }
        // echo "<pre>";
        // print_r($rsdata['grafik']);
        // exit();
        foreach ($bulan as $c =>$var) {           
            $data['bulan'][$c] =0;}

            foreach ($rsdata['grafik'] as $db) {
                $data['bulan'][$db->bulan] = $db->total; 
            }
            foreach ($data['bulan'] as $key => $value) {
                $data['bul'][] = $key;
                $data['totl'][] = $value;
            }
        // echo "<pre>";
        // print_r($data['totl']);        
        // exit();

        // $data['totale'][]    = 0;
        // $data['totale'][]    = 0;
        // $data['totale'][]    = 0;
        // $data['totale'][]    = 0;
        // $data['bulan'][]  = 'Juni/2019';
        // $data['bulan'][]  = 'July/2019';
        // $data['bulan'][]  = 'August/2019';
        // $data['bulan'][]  = 'September/2019';

        // // mengambil data grafik bulanan
        // if (!empty($rsdata['grafik'])) {            
        //     foreach ($rsdata['grafik'] as $dt) {
        //         $data['totale'][]    = $dt->total;
        //         $data['bulan'][]  = $dt->bulan;
        //     }        
        // // data dummy - 6 bulan

        // }
            // Mengambil data laporan bulanan
            if (!empty( $data['laporan_bulanan'])) {            
                foreach ($data['laporan_bulanan'] as $dt) {
                    $data['total'][$dt->status][$dt->bulan]    = $dt->total;
                }       

                foreach ($data['total'] as $key => $value) {
                    foreach ($value as $k => $val) {
                        $data['total'][$key][]    = $val;
                    }
                    $data['total2'][]    = $data['total'][$key];

                    $data['total'][$key][]    = 0;
                    $data['total'][$key][]    = 0;
                    $data['total'][$key][]    = 0;
                    $data['total'][$key][]    = 0;
                }
            }

        // $this->load_css('assets/operator/plugins/ga-dev-tools/css/chartjs-visualizations.css');
            $this->load_js('assets/operator/plugins/Chart.js/Chart.min.js');
        // $this->load_js('assets/operator/plugins/Chart.js/chartjs.init.js');

            parent::display('index', $data, 'footer_index');
        }
    }
