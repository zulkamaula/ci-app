<?php

class Fakultas_model extends CI_Model
{
    public function getAllFakultas()
    {
        return $this->db->get('fakultas')->result_array();
    }

    public function getFakultas($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_fakultas', $keyword);
        }

        return $this->db->get('fakultas', $limit, $start)->result_array();

        // $query = "SELECT `fakultas`.*, `prodi`.*
        //             FROM `fakultas` JOIN `prodi`
        //               ON `fakultas`.`id_fakultas` = `prodi`.`id_fakultas`
        // ";

        // return $this->db->query($query)->result_array();
    }

    public function countAllFakultas()
    {
        return $this->db->get('fakultas')->num_rows();
    }

    // akhir pagination

    public function tambahDataFakultas()
    {
        $data = [
            "nama_fakultas" => $this->input->post('nama_fakultas', true)

            // "jurusan" => $this->input->post('jurusan')
        ];

        $this->db->insert('fakultas', $data);
    }

    public function hapusDataFakultas($id)
    {
        // $this->db->where('id', $id);
        // $this->db->delete('mahasiswa');
        // atau shorthand dibawah :

        $this->db->delete('fakultas', ['id_fakultas' => $id]);
    }

    public function getFakultasById($id)
    {
        return $this->db->get_where('fakultas', ['id_fakultas' => $id])->row_array();
    }

    public function ubahDataFakultas()
    {
        $data = [
            "nama_fakultas" => $this->input->post('nama_fakultas', true)
            // "nama" => $this->input->post('nama', true),
            // "npm" => $this->input->post('npm', true),
            // "email" => $this->input->post('email', true),
            // "jurusan" => $this->input->post('jurusan')
        ];

        $this->db->where('id_fakultas', $this->input->post('id_fakultas'));
        $this->db->update('fakultas', $data);
    }
}
