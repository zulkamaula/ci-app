<?php

class Dosen extends CI_Controller
{

    public function index()
    {
        $data['judul'] = 'Daftar Data Dosen';

        $this->load->model('Dosen_model', 'dosenn');

        // Pagination
        // inisialisasi
        $this->load->library('pagination');

        // ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // konfigurasi dasar untuk pagination
        $this->db->like('nama_dosen', $data['keyword']);
        $this->db->or_like('email', $data['keyword']);
        $this->db->or_like('tlp', $data['keyword']);


        $this->db->from('dosen');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        // Initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);

        $data['dosen'] = $this->dosenn->getDosen($config['per_page'], $data['start'], $data['keyword']);


        $this->load->view('tamplates/header', $data);
        $this->load->view('dosen/index', $data);
        $this->load->view('tamplates/footer');
    }
}
