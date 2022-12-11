<?php

class M_paket extends CI_Model
{

    public function generate_kode_paket()
    {
        $this->db->select('RIGHT(paket.kode_paket,3) as kode', false);
        $this->db->order_by('kode_paket', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('paket');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "P" . $kodemax;
        return $kodejadi;
    }

    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('paket');
        $this->db->where('kode_paket', $id);
        return $this->db->get()->row_array();
    }

    public function getAllDataPaket()
    {
        return $this->db->get('paket')->result();
    }

    public function update($kode_paket, $data)
    {
        $this->db->where('kode_paket', $kode_paket);
        $this->db->update('paket', $data);
    }

    public function delete($id)
    {
        $this->db->where('kode_paket', $id);
        $this->db->delete('paket');
    }
}
