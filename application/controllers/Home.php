<?php

class Home extends CI_Controller
{
    public function index($nama = '')
    {
        $data['judul'] = 'Halaman Home!';
        $data['nama'] = $nama;

        $this->load->view('tamplates/header', $data);

        $this->load->view('home/index', $nama);

        $this->load->view('tamplates/footer');
    }
}
