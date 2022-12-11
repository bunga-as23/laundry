<?php
class About extends CI_Controller
{

    public function index()
    {
        $isi['content'] = 'backend/about/v_about';
        $isi['judul']   = 'Data About';
        $isi['about'] = $this->db->get('about')->result();
        $this->load->view('backend/dashboard', $isi);
    }

    public function tambah()
    {
        $isi['content'] = 'backend/about/t_about';
        $isi['judul']   = 'Form Tambah About';
        $this->load->view('backend/dashboard', $isi);
    }

    public function simpan()
    {
        $config['upload_path'] = 'assets/images/about';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '2048';
        $this->load->library('upload', $config);
        $this->upload->do_upload('gambar_about');
        $file_name = $this->upload->data();

        $data = array(
            'judul_about' => $this->input->post('judul_about'),
            'deskripsi_about' => $this->input->post('deskripsi_about'),
            'gambar_about' => $file_name['file_name'],
        );

        $query = $this->db->insert('about', $data);
        if ($query = true) {
            $this->session->set_flashdata('info', '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> Data Berhasil di Simpan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('about');
        }
    }

    public function edit($id_about)
    {
        $isi['content'] = 'backend/about/e_about';
        $isi['judul']   = 'Form Edit About';
        $isi['about'] = $this->M_about->edit_about($id_about);
        $this->load->view('backend/dashboard', $isi);
    }

    public function update()
    {
        $id_about = $this->input->post('id_about');
        $config['upload_path'] = 'assets/images/about';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '2048';

        $this->load->library('upload', $config);

        if (!empty($_FILES['gambar_about']['name'])) {
            $this->upload->do_upload('gambar_about');
            $upload = $this->upload->data();
            $gambar = $upload['file_name'];

            $data = array(
                'gambar_about' => $gambar,
                'judul_about' => $this->input->post('judul_about'),
                'deskripsi_about' => $this->input->post('deskripsi_about'),
            );

            $_id = $this->db->get_where('about', ['id_about' => $id_about])->row();

            $query = $this->M_about->update($id_about, $data);
            if ($query = true) {
                $this->session->set_flashdata('info', '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> Data Berhasil di Update
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
                unlink('assets/images/about/' . $_id->gambar_about);
                redirect('about');
            }
        } else {
            $data = array(
                'judul_about' => $this->input->post('judul_about'),
                'deskripsi_about' => $this->input->post('deskripsi_about'),
            );
            $query = $this->M_about->update($id_about, $data);
            if ($query = true) {
                $this->session->set_flashdata('info', '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> Data Berhasil di Update
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
                redirect('about');
            }
        }
    }

    public function delete($id_about)
    {
        $_id = $this->db->get_where('about', ['id_about' => $id_about])->row();
        $query = $this->db->delete('about', ['id_about' => $id_about]);
        if ($query = true) {
            $this->session->set_flashdata('info', '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> Data Berhasil di Hapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            unlink('assets/images/about/' . $_id->gambar_about);
            redirect('about');
        }
    }
}
