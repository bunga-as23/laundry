<?php

class Slider extends CI_Controller
{
    public function index()
    {
        $isi['content'] = 'backend/slider/v_slider';
        $isi['judul']   = 'Daftar Slider';
        $isi['slider'] = $this->M_slider->getSlider();
        $this->load->view('backend/dashboard', $isi);
    }

    public function tambah()
    {
        $isi['content'] = 'backend/slider/t_slider';
        $isi['judul']   = 'Form Tambah Slider';
        $this->load->view('backend/dashboard', $isi);
    }

    public function simpan()
    {
        $config['upload_path'] = 'assets/images/slider';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '2048';
        $this->load->library('upload', $config);
        $this->upload->do_upload('gambar_slider');
        $file_name = $this->upload->data();

        $data = array(
            'judul_slider' => $this->input->post('judul_slider'),
            'deskripsi_slider' => $this->input->post('deskripsi_slider'),
            'gambar_slider' => $file_name['file_name'],
            'status_slider' => $this->input->post('status_slider'),
        );

        $query = $this->db->insert('slider', $data);
        if ($query = true) {
            $this->session->set_flashdata('info', '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> Data Berhasil di Simpan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('slider');
        }
    }

    public function edit($id_slider)
    {
        $isi['content'] = 'backend/slider/e_slider';
        $isi['judul']   = 'Form Edit Slider';
        $isi['slider'] = $this->M_slider->edit_slider($id_slider);
        $this->load->view('backend/dashboard', $isi);
    }

    public function update()
    {
        $id_slider = $this->input->post('id_slider');
        $config['upload_path'] = 'assets/images/slider';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '2048';

        $this->load->library('upload', $config);

        if (!empty($_FILES['gambar_slider']['name'])) {
            $this->upload->do_upload('gambar_slider');
            $upload = $this->upload->data();
            $gambar = $upload['file_name'];

            $data = array(
                'gambar_slider' => $gambar,
                'judul_slider' => $this->input->post('judul_slider'),
                'deskripsi_slider' => $this->input->post('deskripsi_slider'),
                'status_slider' => $this->input->post('status_slider'),
            );

            $_id = $this->db->get_where('slider', ['id_slider' => $id_slider])->row();

            $query = $this->M_slider->update($id_slider, $data);
            if ($query = true) {
                $this->session->set_flashdata('info', '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> Data Berhasil di Update
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
                unlink('assets/images/slider/' . $_id->gambar_slider);
                redirect('slider');
            }
        } else {
            $data = array(
                'judul_slider' => $this->input->post('judul_slider'),
                'deskripsi_slider' => $this->input->post('deskripsi_slider'),
                'status_slider' => $this->input->post('status_slider'),
            );
            $query = $this->M_slider->update($id_slider, $data);
            if ($query = true) {
                $this->session->set_flashdata('info', '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> Data Berhasil di Update
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
                redirect('slider');
            }
        }
    }

    public function delete($id_slider)
    {
        $_id = $this->db->get_where('slider', ['id_slider' => $id_slider])->row();
        $query = $this->db->delete('slider', ['id_slider' => $id_slider]);
        if ($query = true) {
            $this->session->set_flashdata('info', '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> Data Berhasil di Hapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            unlink('assets/images/slider/' . $_id->gambar_slider);
            redirect('slider');
        }
    }
}
