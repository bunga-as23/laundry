<?php

class M_cek_laundry extends CI_Model
{

    public function cek_status($kode_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('konsumen', 'transaksi.kode_konsumen = konsumen.kode_konsumen', 'left');
        $this->db->join('paket', 'transaksi.kode_paket = paket.kode_paket', 'left');
        $this->db->where('transaksi.kode_transaksi', $kode_transaksi);
        return $this->db->get()->result();
    }
}
