<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Cek_laundry extends CI_Controller
{
    public function index()
    {
        $kode_transaksi = $this->input->post('kode_transaksi');
        $isi['data'] = $this->M_cek_laundry->cek_status($kode_transaksi);
        $isi['slider'] = $this->db->get('slider')->result();
        $this->load->view('frontend/header', $isi);
        $this->load->view('frontend/cek_laundry', $isi);
        $this->load->view('frontend/footer');
    }
}
