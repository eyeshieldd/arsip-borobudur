<?php

/*
 * By : Praditya Kurniawan
 * website : http://masiyak.com
 * email : aku@masiyak.com
 *
 * - CIRCLE LABS - 
 * http://circlelabs.id
 *  
 * 
 * Berisi semua function yang dibutuhkan sejak pertama kali jika menggunakan 
 * core circlelabs
 */

defined('BASEPATH') or exit('No direct script access allowed');


/*
 * Helper untuk cek kondisi sesuai permission
 */

function cek_akses($objek = null, $hak = null) {
    // instance
    $ci = & get_instance();
    if (empty($hak))
        return;
    $a = strlen($hak) - 1;
    while ($a >= 0) {
        if (isset($ci->session->ROLE[substr($hak, $a, 1)]) &&
                $ci->session->ROLE[substr($hak, $a, 1)] == 1)
            return $objek;
        $a--;
    }
    return;
}

if ( ! function_exists('adminbase_url'))
{
    /**
     * Base URL
     *
     * Create a local URL based on your basepath.
     * Segments can be passed in as a string or an array, same as site_url
     * or a URL to a file can be passed in, e.g. to an image file.
     *
     * @param   string  $uri
     * @param   string  $protocol
     * @return  string
     */
    function adminbase_url($uri = '', $protocol = NULL)
    {
        return get_instance()->config->base_url($uri, $protocol);
    }
}
