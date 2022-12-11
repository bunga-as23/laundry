<?php

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('tgl_indo_helper');
    }

    public function index()
    {
        $isi['content'] = 'backend/laporan/f_laporan';
        $isi['judul'] = 'Laporan Transaksi';
        $this->load->view('backend/dashboard', $isi);
    }

    public function cetak_laporan()
    {
        $tgl_mulai = $this->input->post('tanggal_mulai');
        $tgl_akhir = $this->input->post('tanggal_akhir');
        $isi['laporan'] = $this->M_laporan->filter_laporan($tgl_mulai, $tgl_akhir);
        $this->session->set_userdata('tanggal_mulai', $tgl_mulai);
        $this->session->set_userdata('tanggal_akhir', $tgl_akhir);
        $this->load->view('backend/laporan/cetak_laporan', $isi);
    }
}
