<?php


class Kategori_layanan_konseling_model extends CI_Model
{

    public function getAllKategori()
    {
        $this->db->select('*')->from('kategori_layanan_konseling');
        return $this->db->get()->result_array();
    }

}