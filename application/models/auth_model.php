<?php


class auth_model extends CI_Model
{
    public function updateLastLoginKonseling($id, $date)
    {
        // $sql = "UPDATE {$this->_tableEmployer} SET last_login=date('Y-m-d H:i:s') WHERE id_employer={$id}";
        // $this->db->query($sql);
        $this->db->where('id', $id);

        $this->db->update('user_konseling', ['last_login' => $date]);
    }
    public function updateLastLoginKonselor($id, $date)
    {
        // $sql = "UPDATE {$this->_tableEmployer} SET last_login=date('Y-m-d H:i:s') WHERE id_employer={$id}";
        // $this->db->query($sql);
        $this->db->where('id', $id);

        $this->db->update('user_konselor', ['last_login' => $date]);
    }

    public function check_auth($table, $field1)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where("email = '$field1' OR username = '$field1'");
        // $this->db->where($field2);
        // $this->db->where('status', 1);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
    public function getDataUserByEmail($table, $email)
    {
        return $this->db->get_where($table, ['email' => $email])->row();
    }

    public function checkUsernameKonseling($email)
    {
        $this->db->get_where('user_konseling', ['email' => $email]);
        return $this->db->affected_rows();
    }

    public function checkUsernameKonselor($email)
    {
        $this->db->get_where('user_konselor', ['email' => $email]);
        return $this->db->affected_rows();
    }

    public function checkEmailExist($table , $email)
    {
        return $this->db->get_where($table, ['email' => $email])->num_rows();
    }

    public function checkUsernameExist($table, $username)
    {
        return $this->db->get_where($table, ['username' => $username])->num_rows();
    }

    public function registerKonseling($data){
        $this->db->insert('user_konseling', $data);
    }

    public function registerKonselor($data){
        $this->db->insert('user_konselor', $data);
    }

    public function daftarTokenRegistrasi($data)
    {
        $this->db->insert('_token_registrasi', $data);

        return $this->db->affected_rows();
    }
}