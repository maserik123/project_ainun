<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kpi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('perceraian/Md_kpi');
    }

    public function index()
    {
        $data['kpi'] = $this->Md_kpi->getAll();
        $data['penyebab'] = $this->Md_kpi->getFaktorPenyebab();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('perceraian/v_kpi', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($pram1 = '')
    {
        $this->Md_kpi->delete($pram1);
        $this->session->set_flashdata('pesanhapus', 'berhasil');

        redirect('perceraian/kpi');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('tahun', 'fiel tahun', 'required');
        $this->form_validation->set_rules('penyebab', 'fiel penyebab', 'required');
        $this->form_validation->set_rules('kpi', 'file kpi', 'required');



        if ($this->form_validation->run() != false) {
            $cek = $this->Md_kpi->cekData($this->input->post('tahun'),$this->input->post('penyebab'));
            if($cek){
                $this->session->set_flashdata('pesangagalduplikat', 'gagal');
            redirect('perceraian/kpi');
            }else{
            $this->Md_kpi->add(['id_faktor_penyebab_perceraian' => $this->input->post('penyebab'), 'tahun' => $this->input->post('tahun'), 'kpi' => $this->input->post('kpi')]);
            $this->session->set_flashdata('pesanbehasil', 'berhasil');
            redirect('perceraian/kpi');
}
        } else {
            $this->session->set_flashdata('pesangagal', 'gagal');

            redirect('perceraian/kpi');
        }
    }
}

/* End of file Kpi.php */
