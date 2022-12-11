<?php

class M_slider extends CI_Model
{

    public function getSlider()
    {
        return $this->db->get('slider')->result();
    }

    public function edit_slider($id_slider)
    {
        $this->db->where('id_slider', $id_slider);
        return $this->db->get('slider')->row_array();
    }

    public function update($id_slider, $data)
    {
        $this->db->where('id_slider', $id_slider);
        $this->db->update('slider', $data);
    }
}
