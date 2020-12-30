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

    public function tambahDataDosen()
    {
        $data = [
            "nama_dosen" => $this->input->post('nama_dosen', true),
            "tlp" => $this->input->post('tlp', true),
            "email" => $this->input->post('email', true),
            "alamat" => $this->input->post('alamat', true)
        ];

        $this->db->insert('dosen', $data);
    }

    public function hapusDataDosen($id)
    {
        $this->db->delete('dosen', ['id' => $id]);
    }

    public function getDosenById($id)
    {
        return $this->db->get_where('dosen', ['id' => $id])->row_array();
    }
}
