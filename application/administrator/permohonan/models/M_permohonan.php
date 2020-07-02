<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
 * By : Praditya Kurniawan
 * website : http://masiyak.com
 * email : aku@masiyak.com
 *
 */
require_once APPPATH . 'models/M_model_base.php';

class M_permohonan extends M_model_base
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_list_permohonan()
    {
        $rs_data = $this->db->select('p.permohonan_id, p.nomor_layanan, p.nama_pemohon, p.email, p.alamat, p.telepon, p.identitas, p.gambar_identitas, p.status, date(p.created_at) as tanggal')
            ->order_by("created_at", "desc")
            ->from('permohonan p');

        // get total records data
        $option['recordsTotal'] = $rs_data->count_all_results('', false);

        // searching function should be here
        if (!empty($this->input->post('search')['value'])) {
            // get list colomn
            $lskolom = ['p.nomor_layanan','p.nama_pemohon', 'p.email', 'p.status', 'p.created_at'];
            $rs_data->group_start();
            foreach ($lskolom as $vkolom) {
                $rs_data->or_like($vkolom, $this->input->post('search')['value'], 'both');
            }
            $rs_data->group_end();
        }

        // hitung data setelah filter
        $option['recordsFiltered'] = $rs_data->count_all_results('', false);
        // limit data
        if ($this->input->post('length') > -1) {
            $rs_data->limit($this->input->post('length', true), $this->input->post('start', true));
        }

        $option['draw'] = $this->input->post('draw');

        // build data
        $rs_data_ = [];
        foreach ($rs_data->get()->result_array() as $vdata) {

            $btn = '<a class="btn btn-md btn-info btn-circle-md btn-circle" style="margin: 0 5px;" href="' . site_url() . '/permohonan/get_detail/' . $vdata['permohonan_id'] . '"><i class="fas fa-eye"></i></a>';
            $btn .= '<button class="btn btn-md btn-circle btn-circle-md btn-danger hapus-data" data-id="' . $vdata['permohonan_id'] . '"><i class="fa fa-trash"></i></button>';

            $vdata            = xss_clean($vdata);
            $vdata['aksi']    = $btn;
            $vdata['tanggal'] = format_tanggal_indonesia($vdata['tanggal']);

            $rs_data_[] = $vdata;
        }
        $option['data'] = $rs_data_;
        return $option;
    }

    public function get_view($params)
    {
        $sql = "SELECT * FROM permohonan
                where permohonan_id = ?";
        $query = $this->db->query($sql, $params);

        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function get_detail_permohonan($id)
    {
        $sql = $this->db->select('p.permohonan_id, p.nama_pemohon, p.nomor_layanan, p.email, p.alamat, p.telepon, p.identitas, p.gambar_identitas, p.status, p.jenis_layanan, p.gambar_permohonan, p.created_at')
            ->from('permohonan p')
            ->where('p.permohonan_id', $id)
            ->get();

        if ($sql->num_rows() != 0) {
            $result = $sql->row_array();
            $sql->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function get_permohonan_kode($id)
    {
        $sql = $this->db->select('kode_arsip')
            ->from('permohonan_kode_arsip p')
            ->where('p.permohonan_id', $id)
            ->get();

        if ($sql->num_rows() != 0) {
            $result = $sql->result_array();
            $sql->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function edit_data($id)
    {
        return $this->db->where('permohonan_id', $id)->get('permohonan')->row();
    }

    // hapus permohonan kode arsip dulu
    public function hapus($id, $data)
    {
        // $this->db->where('permohonan_id', $id);
        // $this->db->delete(array('permohonan_kode_arsip', 'permohonan'));

        // echo "<pre/>";
        // print_r($data['gambar']);
        // exit();
        $gambar_identitas  = $data['gambar_identitas'];
        $gambar_permohonan = $data['gambar_permohonan'];

        if (empty($id)) {
            return false;
        }
        
        $this->db->where('permohonan_id', $id);
        $this->db->delete(array('permohonan_kode_arsip', 'permohonan'));
        if (!empty($gambar_identitas && file_exists($gambar_identitas))) {
            unlink($gambar_identitas);
        }
        if (!empty($gambar_permohonan) && file_exists($gambar_permohonan)) {
            unlink($gambar_permohonan);
        }
        return true;
    }
}
