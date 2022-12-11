<?php

class M_Squrity extends CI_Model
{

    public function getSqurity()
    {
        if (empty($this->session->userdata('username'))) {
            $this->session->sess_destroy();
            redirect('panel');
        }
    }
}
