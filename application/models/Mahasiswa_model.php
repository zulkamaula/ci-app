<?php

class Mahasiswa_model extends CI_model
{
    public function getAllMahasiswa()
    {
        return $this->db->get('mahasiswa')->result_array();
    }

    // pagination
    public function getMahasiswa($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('NPM', $keyword);
            $this->db->or_like('email', $keyword);
            $this->db->or_like('jurusan', $keyword);
        }

        return $this->db->get('mahasiswa', $limit, $start)->result_array();
    }

    public function countAllMahasiswa()
    {
        return $this->db->get('mahasiswa')->num_rows();
    }

    // akhir pagination
    public function tambahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "npm" => $this->input->post('npm', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan')
        ];

        $this->db->insert('mahasiswa', $data);
    }

    public function hapusDataMahasiswa($id)
    {
        // $this->db->where('id', $id);
        // $this->db->delete('mahasiswa');
        // atau shorthand dibawah :

        $this->db->delete('mahasiswa', ['id' => $id]);
    }

    public function getMahasiswaById($id)
    {
        return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
    }

    public function ubahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "npm" => $this->input->post('npm', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('mahasiswa', $data);
    }
}
