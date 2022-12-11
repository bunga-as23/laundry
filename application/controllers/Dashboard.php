<?php

class Dashboard extends CI_Controller
{

    public function index()
    {
        $this->M_squrity->getSqurity();

        $isi['content'] = 'backend/home';
        $isi['judul']   = 'Dashboard';
        $isi['total_konsumen'] = $this->M_dashboard->total_konsumen();
        $isi['transaksi_baru'] = $this->M_dashboard->transaksi_baru();
        $isi['total_transaksi'] = $this->M_dashboard->total_transaksi();
        $this->load->view('backend/dashboard', $isi);
    }
}
