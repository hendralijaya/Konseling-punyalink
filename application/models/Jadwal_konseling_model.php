<?php


class Jadwal_konseling_model extends CI_Model
{

    public function storeJadwalAndReturnId($data)
    {
        $this->db->insert('jadwal_konseling',$data);
        return $this->db->insert_id();
    }

}