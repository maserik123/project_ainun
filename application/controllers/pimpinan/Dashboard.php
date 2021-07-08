<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('staff');
        if ($this->staff->is_role() != "pimpinan") {
            redirect("login/");
        }
    }

    public function index()
    {
        $this->load->view('templates/pimpinan/header');
        $this->load->view('templates/pimpinan/sidebar');
        $this->load->view('pimpinan/dashboard');
        $this->load->view('templates/pimpinan/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
