<?php

class Fakultas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Fakultas_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['judul'] = 'Fakultas';
        $data['fakultas'] = $this->Fakultas_model->getAllFakultas();


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
        $config['base_url'] = 'http://localhost/ci-app/fakultas/index';

        $this->db->like('nama_fakultas', $data['keyword']);
        $this->db->from('fakultas');

        $config['total_rows'] = $this->db->count_all_results();

        $config['per_page'] = 6;
        $config['start'] = $this->uri->segment(3);
        $config['num_links'] = 3;
        $data['total_rows'] = $config['total_rows'];


        // inisialisasi
        $this->pagination->initialize($config);

        $data['fakultas'] = $this->Fakultas_model->getFakultas($config['per_page'], $config['start'], $data['keyword']);

        $this->load->view('tamplates/header', $data);
        $this->load->view('fakultas/index', $data);
        $this->load->view('tamplates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'From Tambah Data Fakultas';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('npm', 'NPM', 'required|numeric');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('tamplates/header', $data);
            $this->load->view('fakultas/tambah');
            $this->load->view('tamplates/footer');
        } else {
            $this->Fakultas_model->tambahDataFakultas();
            $this->session->set_flashdata('flash', ' fakultas ditambahkan!');
            redirect('fakultas');
        }
    }

    public function hapus($id)
    {
        $this->Fakultas_model->hapusDataFakultas($id);
        $this->session->set_flashdata('flash', ' fakultas dihapus!');
        redirect('fakultas');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Fakultas';
        $data['fakultas'] = $this->Fakultas_model->getFakultasById($id);

        $this->load->view('tamplates/header', $data);
        $this->load->view('fakultas/detail', $data);
        $this->load->view('tamplates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'From Ubah Data fakultas';
        $data['fakultas'] = $this->Fakultas_model->getFakultasById($id);
        $data['jurusan'] = ['Teknik Informatika', 'Teknik Industri', 'Ekonomi', 'DKV', 'Bahasa Inggris'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('npm', 'NPM', 'required|numeric');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('tamplates/header', $data);
            $this->load->view('fakultas/ubah', $id);
            $this->load->view('tamplates/footer');
        } else {
            $this->Fakultas_model->ubahDataFakultas();
            $this->session->set_flashdata('flash', ' fakultas diubah!');
            redirect('fakultas');
        }
    }
}
