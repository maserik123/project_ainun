<?php

Class Home extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard');
        $this->load->view('templates/footer');
    }

    public function pimpinan()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('home_pimpinan');
        $this->load->view('layout/footer');
    }
}
?>