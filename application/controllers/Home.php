<?php
class Home extends CI_Controller
{

    public function index()
    {
        $isi['slider'] = $this->db->get('slider')->result();
        $isi['about'] = $this->db->get('about')->result();
        $isi['paket'] = $this->db->get('paket')->result();
        $this->load->view('frontend/header', $isi);
        $this->load->view('frontend/home');
        $this->load->view('frontend/footer');
    }
}
