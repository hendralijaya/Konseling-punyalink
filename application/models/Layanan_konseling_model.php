<?php


class Layanan_konseling_model extends CI_Model
{

    public function getLayananKonselingByCategoryId($id = 1)
    {
        $this->db->select('*')->from('layanan_konseling')->where('kategori_layanan_konseling_id', $id);
        return $this->db->get()->result_array();
    }

}