<?php

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();


        // pagination
        // Load lobrary pagination
        $this->load->library('pagination');

        // ambil data pencarian
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // config
        $config['base_url'] = 'http://localhost/ci-app/mahasiswa/index';

        $this->db->like('nama', $data['keyword']);
        $this->db->or_like('NPM', $data['keyword']);
        $this->db->or_like('email', $data['keyword']);
        $this->db->or_like('jurusan', $data['keyword']);
        $this->db->from('mahasiswa');

        $config['total_rows'] = $this->db->count_all_results();

        $config['per_page'] = 6;
        $config['start'] = $this->uri->segment(3);
        $config['num_links'] = 3;
        $data['total_rows'] = $config['total_rows'];


        // inisialisasi
        $this->pagination->initialize($config);

        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswa($config['per_page'], $config['start'], $data['keyword']);

        $this->load->view('tamplates/header', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('tamplates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'From Tambah Data Mahasiswa';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('npm', 'NPM', 'required|numeric');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('tamplates/header', $data);
            $this->load->view('mahasiswa/tambah');
            $this->load->view('tamplates/footer');
        } else {
            $this->Mahasiswa_model->tambahDataMahasiswa();
            $this->session->set_flashdata('flash', ' mahasiswa ditambahkan!');
            redirect('mahasiswa');
        }
    }

    public function hapus($id)
    {
        $this->Mahasiswa_model->hapusDataMahasiswa($id);
        $this->session->set_flashdata('flash', ' mahasiswa dihapus!');
        redirect('mahasiswa');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);

        $this->load->view('tamplates/header', $data);
        $this->load->view('mahasiswa/detail', $data);
        $this->load->view('tamplates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'From Ubah Data Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
        $data['jurusan'] = ['Teknik Informatika', 'Teknik Industri', 'Ekonomi', 'DKV', 'Bahasa Inggris'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('npm', 'NPM', 'required|numeric');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('tamplates/header', $data);
            $this->load->view('mahasiswa/ubah', $id);
            $this->load->view('tamplates/footer');
        } else {
            $this->Mahasiswa_model->ubahDataMahasiswa();
            $this->session->set_flashdata('flash', ' mahasiswa diubah!');
            redirect('mahasiswa');
        }
    }
}
