<?php


class Client_konseling_model extends CI_Model
{

    public function storeClientKonseling($data)
    {
         return $this->db->insert('client_konseling',$data);
    }
}