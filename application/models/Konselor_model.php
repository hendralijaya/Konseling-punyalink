<?php


class Konselor_model extends CI_Model
{
    public function storeInformasiPribadiKonselor($data)
    {
        $this->db->insert('informasi_pribadi_konselor',$data);
        return $this->db->insert_id();
    }

    public function storePendidikanPengalamanKonselor($data)
    {
        $this->db->insert('pendidikan_pengalaman_konselor',$data);
        return $this->db->insert_id();
    }

    public function storeInformasiRekeningBankKonselor($data)
    {
        $this->db->insert('informasi_rekening_bank_konselor',$data);
        return $this->db->insert_id();
    }

    public function storeKonselor($data)
    {
        $this->db->insert('konselor',$data);
    }
}