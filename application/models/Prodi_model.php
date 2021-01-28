<?php

class Prodi_model extends CI_Model
{
    public function getAllProdi()
    {
        return $this->db->get('prodi')->result_array();
    }

    public function getProdi()
    {
        $query = "SELECT `prodi`.*, `fakultas`.*
                    FROM `prodi` JOIN `fakultas`
                      ON `prodi`.`id_fakultas` = `fakultas`.`id_fakultas`
        ";

        return $this->db->query($query)->result_array();
    }

    public function countAllProdi()
    {
        return $this->db->get('prodi')->num_rows();
    }

    // akhir pagination

    public function tambahDataProdi()
    {
        $data = [
            "nim" => $this->input->post('nim', true),
            "id_prodi" => $this->input->post('id_prodi', true),
            "nama" => $this->input->post('nama', true),
            "tmp_lahir" => $this->input->post('tmp_lahir', true),
            "tgl_lahir" => $this->input->post('tgl_lahir', true),
            "tahun_masuk" => $this->input->post('tahun_masuk', true),
            "alamat" => $this->input->post('alamat', true),
            "telepon" => $this->input->post('telepon', true)

            // "jurusan" => $this->input->post('jurusan')
        ];

        $this->db->insert('prodi', $data);
    }

    public function hapusDataProdi($id)
    {
        // $this->db->where('id', $id);
        // $this->db->delete('Prodi');
        // atau shorthand dibawah :

        $this->db->delete('prodi', ['id' => $id]);
    }

    public function getProdiById($id)
    {
        return $this->db->get_where('prodi', ['id' => $id])->row_array();
    }

    public function ubahDataProdi()
    {
        $data = [
            "nim" => $this->input->post('nim', true),
            "id_prodi" => $this->input->post('id_prodi', true),
            "nama" => $this->input->post('nama', true),
            "tmp_lahir" => $this->input->post('tmp_lahir', true),
            "tgl_lahir" => $this->input->post('tgl_lahir', true),
            "tahun_masuk" => $this->input->post('tahun_masuk', true),
            "alamat" => $this->input->post('alamat', true),
            "telepon" => $this->input->post('telepon', true)

            // "nama" => $this->input->post('nama', true),
            // "npm" => $this->input->post('npm', true),
            // "email" => $this->input->post('email', true),
            // "jurusan" => $this->input->post('jurusan')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('prodi', $data);
    }
}
