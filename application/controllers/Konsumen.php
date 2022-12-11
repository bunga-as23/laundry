<?php

class Konsumen extends CI_Controller
{

    public function index()
    {
        $isi['content'] = 'backend/konsumen/v_konsumen';
        $isi['judul']   = 'Data Konsumen';
        $isi['data']    = $this->M_konsumen->getAllDataKonsumen();
        $this->load->view('backend/dashboard', $isi);
    }

    public function tambah()
    {
        $isi['content'] = 'backend/konsumen/t_konsumen';
        $isi['judul']   = 'Form Tambah Konsumen';
        $isi['kode_konsumen'] = $this->M_konsumen->generate_kode_konsumen();
        $this->load->view('backend/dashboard', $isi);
    }

    public function simpan()
    {
        $data = array(
            'kode_konsumen'   => $this->input->post('kode_konsumen'),
            'nama_konsumen'   => $this->input->post('nama_konsumen'),
            'alamat_konsumen' => $this->input->post('alamat_konsumen'),
            'no_telp'         => $this->input->post('no_telp'),
        );

        $query = $this->db->insert('konsumen', $data);
        if ($query = true) {
            $this->session->set_flashdata('info', '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> Data Berhasil di Simpan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('konsumen');
        }
    }

    public function edit($id)
    {
        $isi['content']  = 'backend/konsumen/e_konsumen';
        $isi['judul']    = 'Data Konsumen';
        $isi['konsumen'] = $this->M_konsumen->edit($id);
        $this->load->view('backend/dashboard', $isi);
    }

    public function update()
    {
        $kode_konsumen = $this->input->post('kode_konsumen');

        $data = array(
            'kode_konsumen'   => $this->input->post('kode_konsumen'),
            'nama_konsumen'   => $this->input->post('nama_konsumen'),
            'alamat_konsumen' => $this->input->post('alamat_konsumen'),
            'no_telp'         => $this->input->post('no_telp'),
        );

        $query = $this->M_konsumen->update($kode_konsumen, $data);
        if ($query = true) {
            $this->session->set_flashdata('info', '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> Data Berhasil di Update
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('konsumen');
        }
    }

    public function delete($id)
    {
        $query = $this->M_konsumen->delete($id);
        if ($query = true) {
            $this->session->set_flashdata('info', '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> Data Berhasil di Hapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('konsumen');
        }
    }
}
