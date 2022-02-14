<?php


class Konseling_model extends CI_Model
{

    public function storeClientKonseling($data)
    {
         return $this->db->insert('client_konseling',$data);
    }

    public function storeJadwalAndReturnId($data)
    {
        $this->db->insert('jadwal_konseling',$data);
        return $this->db->insert_id();
    }

    public function getLayananKonselingByCategoryId($id)
    {
        $this->db->select('*')->from('layanan_konseling')->where('kategori_layanan_konseling_id', $id);
        return $this->db->get()->result_array();
    }

    public function getAllKategori()
    {
        $this->db->select('*')->from('kategori_layanan_konseling');
        return $this->db->get()->result_array();
    }
// KHUSUS KONSELOR
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
        return $this->db->insert_id();
    }

    //provinsi db_punyalink
    public function getProvinsi()
    {
        return $this->db_master->get('provinsi')->result();
    }

    public function getKabKota($id_prov)
    {
        $this->db_master->where('id_prov', $id_prov);
        return $this->db_master->get('kabupaten')->result();
    }

    public function getAllKategoriTestDasar()
    {
        $this->db->select('*')->from('kategori_test_dasar_konselor');
        return $this->db->get()->result_array();
    }
    public function getAllSubkategoriTestDasar($id)
    {
        $this->db->select('*')->from('subkategori_test_dasar_konselor')->where('kategori_test_dasar_konselor_id', $id);
        return $this->db->get()->result_array();
    }
}