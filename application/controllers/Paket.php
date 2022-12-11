<?php

class Paket extends CI_Controller
{

    public function index()
    {
        $isi['content'] = 'backend/paket/v_paket.php';
        $isi['judul']   = 'Daftar Data Paket';
        $isi['data']    = $this->M_paket->getAllDataPaket();
        $this->load->view('backend/dashboard', $isi);
    }

    public function tambah()
    {
        $isi['content'] = 'backend/paket/t_paket.php';
        $isi['judul']   = 'Form Tambah Paket';
        $isi['kode_paket'] = $this->M_paket->generate_kode_paket();
        $this->load->view('backend/dashboard', $isi);
    }

    public function simpan()
    {
        $data = array(
            'kode_paket'   => $this->input->post('kode_paket'),
            'nama_paket'   => $this->input->post('nama_paket'),
            'harga_paket'  => $this->input->post('harga_paket'),
        );

        $query = $this->db->insert('paket', $data);
        if ($query = true) {
            $this->session->set_flashdata('info', '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> Data Berhasil di Simpan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('paket');
        }
    }

    public function edit($id)
    {
        $isi['content']  = 'backend/paket/e_paket';
        $isi['judul']    = 'Data paket';
        $isi['paket'] = $this->M_paket->edit($id);
        $this->load->view('backend/dashboard', $isi);
    }

    public function update()
    {
        $kode_paket = $this->input->post('kode_paket');

        $data = array(
            'kode_paket'   => $this->input->post('kode_paket'),
            'nama_paket'   => $this->input->post('nama_paket'),
            'harga_paket' => $this->input->post('harga_paket'),
        );

        $query = $this->M_paket->update($kode_paket, $data);
        if ($query = true) {
            $this->session->set_flashdata('info', '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> Data Berhasil di Update
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('paket');
        }
    }

    public function delete($id)
    {
        $query = $this->M_paket->delete($id);
        if ($query = true) {
            $this->session->set_flashdata('info', '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> Data Berhasil di Hapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('paket');
        }
    }
}
