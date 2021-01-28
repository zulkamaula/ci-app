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
        $query = "SELECT `mahasiswa`.*, `prodi`.`nama_prodi`
                    FROM `mahasiswa` JOIN `prodi`
                      ON `mahasiswa`.`id_prodi` = `prodi`.`id_prodi`
        ";

        if ($keyword) {
            $this->db->like('nim', $keyword);
            $this->db->or_like('id_prodi', $keyword);
            $this->db->or_like('nama', $keyword);
            $this->db->or_like('tmp_lahir', $keyword);
            $this->db->or_like('tgl_lahir', $keyword);
            $this->db->or_like('tahun_masuk', $keyword);
            $this->db->or_like('alamat', $keyword);
            $this->db->or_like('telepon', $keyword);
        }

        return $this->db->get($query, $limit, $start)->result_array();
    }

    public function countAllMahasiswa()
    {
        return $this->db->get('mahasiswa')->num_rows();
    }

    // akhir pagination

    public function tambahDataMahasiswa()
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
        $this->db->update('mahasiswa', $data);
    }
}
