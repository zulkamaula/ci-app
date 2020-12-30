<?php

class Dosen_model extends CI_Model
{
    public function getAllDosen()
    {
        return $this->db->get('dosen')->result_array();
    }

    public function getDosen($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_dosen', $keyword);
            $this->db->or_like('email', $keyword);
            $this->db->or_like('tlp', $keyword);
        }
        return $this->db->get('dosen', $limit, $start)->result_array();
    }

    public function countAllDosen()
    {
        return $this->db->get('dosen')->num_rows();
    }
}
