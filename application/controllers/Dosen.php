<?php

class Dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dosen_model');
        $this->load->library('form_validation');
    }

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

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Dosen';

        // $this->load->view('tamplates/header', $data);
        // $this->load->view('dosen/tambah', $data);
        // $this->load->view('tamplates/footer');

        $this->form_validation->set_rules('nama_dosen', 'Nama', 'required');
        $this->form_validation->set_rules('tlp', 'Tlp', 'required|numeric');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('tamplates/header', $data);
            $this->load->view('dosen/tambah');
            $this->load->view('tamplates/footer');
        } else {
            $this->Dosen_model->tambahDataDosen();
            $this->session->set_flashdata('flash', ' dosen ditambahkan!');
            redirect('dosen');
        }
    }

    public function hapus($id)
    {
        $this->Dosen_model->hapusDataDosen($id);
        $this->session->set_flashdata('flash', ' dosen dihapus!');
        redirect('dosen');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Dosen';
        $data['dosen'] = $this->Dosen_model->getDosenById($id);

        $this->load->view('tamplates/header', $data);
        $this->load->view('dosen/detail', $data);
        $this->load->view('tamplates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'From Ubah Data Dosen';
        $data['dosen'] = $this->Dosen_model->getDosenById($id);
        // $data['jurusan'] = ['Teknik Informatika', 'Teknik Industri', 'Ekonomi', 'DKV', 'Bahasa Inggris'];

        $this->form_validation->set_rules('nama_dosen', 'Nama', 'required');
        $this->form_validation->set_rules('tlp', 'Telepon', 'required|numeric');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('tamplates/header', $data);
            $this->load->view('dosen/ubah', $id);
            $this->load->view('tamplates/footer');
        } else {
            $this->Dosen_model->ubahDataDosen();
            $this->session->set_flashdata('flash', ' dosen diubah!');
            redirect('dosen');
        }
    }
}
