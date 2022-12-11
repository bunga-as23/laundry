<?php

class Transaksi extends CI_Controller
{

    public function tambah()
    {
        $isi['content'] = 'backend/transaksi/t_transaksi';
        $isi['judul']   = 'Form Tambah Transaksi';
        $isi['konsumen'] = $this->db->get('konsumen')->result();
        $isi['paket'] = $this->db->get('paket')->result();
        $isi['kode_transaksi'] = $this->M_transaksi->generateKode();
        $this->load->view('backend/dashboard', $isi);
    }

    public function getHargaPaket()
    {
        $kode_paket = $this->input->post('kode_paket');
        $data = $this->M_transaksi->getHargaPaket($kode_paket);
        echo json_encode($data);
    }

    public function simpan()
    {
        $data = array(
            'kode_transaksi' => $this->input->post('kode_transaksi'),
            'kode_konsumen' => $this->input->post('kode_konsumen'),
            'kode_paket' => $this->input->post('kode_paket'),
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'tgl_ambil' => '',
            'berat' => $this->input->post('berat'),
            'grand_total' => $this->input->post('grand_total'),
            'bayar' => $this->input->post('bayar'),
            'status' => $this->input->post('status'),
        );

        $query = $this->db->insert('transaksi', $data);
        if ($query = true) {
            $this->session->set_flashdata('info', '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> Data Berhasil di Simpan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('transaksi/tambah');
        }
    }

    public function riwayat()
    {
        $isi['content'] = 'backend/transaksi/riwayat_transaksi';
        $isi['title']   = 'Riwayat Transaksi';
        $isi['data']    = $this->M_transaksi->getAllRiwayat();
        $this->load->view('backend/dashboard', $isi);
    }

    public function update_status()
    {
        $kode_transaksi = $this->input->post('kt');
        $status = $this->input->post('stt');
        $tgl_ambil = date('Y-m-d h:i:s');
        $status_bayar = 'Lunas';

        if ($status == "Baru" or $status == "Proses") {
            $this->M_transaksi->update_status($kode_transaksi, $status);
        } else {
            $this->M_transaksi->update_status1($kode_transaksi, $status, $tgl_ambil, $status_bayar);
        }
    }

    public function edit_transaksi($kode_transaksi)
    {
        $isi['content'] = 'backend/transaksi/edit_transaksi';
        $isi['judul']   = 'Form Edit Transaksi';
        $isi['transaksi'] = $this->M_transaksi->edit_transaksi($kode_transaksi);
        $isi['konsumen']  = $this->db->get('konsumen')->result();
        $isi['paket']  = $this->db->get('paket')->result();
        $this->load->view('backend/dashboard', $isi);
    }

    public function update()
    {
        $kode_transaksi = $this->input->post('kode_transaksi');
        $data = array(
            'kode_transaksi' => $this->input->post('kode_transaksi'),
            'kode_konsumen' => $this->input->post('kode_konsumen'),
            'kode_paket' => $this->input->post('kode_paket'),
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'tgl_ambil' => '',
            'berat' => $this->input->post('berat'),
            'grand_total' => $this->input->post('grand_total'),
            'bayar' => $this->input->post('bayar'),
            'status' => $this->input->post('status'),
        );

        $query = $this->M_transaksi->update($kode_transaksi, $data);
        if ($query = true) {
            $this->session->set_flashdata('info', '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> Data Berhasil di Update
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('transaksi/riwayat');
        }
    }

    public function detail($kode_transaksi)
    {
        // $this->load->library('Pdfgenerator');

        $isi['title'] = 'Detail Transaksi';
        $isi['transaksi'] = $this->M_transaksi->detail($kode_transaksi);
        // $this->load->view('backend/transaksi/detail', $isi);

        // filename dari pdf ketika didownload
        // $filename = 'detail_transaksi';
        // // setting paper
        // $paper = 'A5';
        // //orientasi paper potrait / landscape
        // $orientation = "landscape";

        $this->load->view('backend/transaksi/detail', $isi);

        // // run pdf
        // $this->pdfgenerator->generate($html, $filename, $paper, $orientation);

        // $paper_size = 'A5';
        // $orientation = 'landscape';
        // $html = $this->output->get_output();

        // $this->dompdf->set_paper($paper_size, $orientation);

        // $this->dompdf->load_html($html);
        // $this->dompdf->render();
        // $this->dompdf->stream("Detail Transaksi", array('Attachment' => 0));
    }
}
