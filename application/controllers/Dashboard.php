<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('staff');
        //cek session dan level user
        if (empty($this->session->userdata('role'))) {
            redirect('login');
        }

        $this->load->model('Md_dashboard');
    }

    public function index($param1 = '')
    {
        $thn = '';

        if ($param1 == '') {
            $thn = date('Y');
        } else {
            $thn = $param1;
        }

        $data['thn'] = $thn;
        $data['Poligami'] = $this->Md_dashboard->getJumlahPerceraianByFaktor('Poligami', $thn);
        $data['Selingkuh'] = $this->Md_dashboard->getJumlahPerceraianByFaktor('Selingkuh', $thn);
        $data['Ekonomi'] = $this->Md_dashboard->getJumlahPerceraianByFaktor('Ekonomi', $thn);
        $data['Menikah_Dini'] = $this->Md_dashboard->getJumlahPerceraianByFaktor('Menikah Dini', $thn);
        $data['KDRT'] = $this->Md_dashboard->getJumlahPerceraianByFaktor('KDRT', $thn);
        $data['Cerai_Gugat'] = $this->Md_dashboard->getJumlahPerceraianByJenis('Cerai Gugat', $thn);
        $data['Cerai_Talak'] = $this->Md_dashboard->getJumlahPerceraianByJenis('Cerai Talak', $thn);
        $data['page'] = 'dashboard';

        $faktorpenyebab = $this->Md_dashboard->getFaktorPenyebab();
        foreach ($faktorpenyebab as $list) {
            $list->data = $this->Md_dashboard->getFaktorPenyebabByPenyebabTahun($list->faktor_penyebab_perceraian, $thn);
        }

        $data['faktorPenyebab'] = $faktorpenyebab;

        $perkara = $this->Md_dashboard->getFaktorPerkara();
        foreach ($perkara as $list) {
            $list->data = $this->Md_dashboard->getFaktorPerkaraByPerkara($list->jenis_perkara);
        }
        $data['faktorPerkara'] = $perkara;
        // var_dump($perkara);
        // die;
        $mapkec = $this->Md_dashboard->getKasusPerkecamatan($thn);

        foreach ($mapkec as $row) {
            $row->data2 = $this->Md_dashboard->getUsiaByKecamatan2($row->kecamatan, $thn);
        }
        $data['maps'] = $mapkec;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/pimpinan/footer');
    }

    public function faktor_penyebab()
    {
        $faktor = $this->Md_dashboard->getKecamatan();
        foreach ($faktor as $row) {
            $row->data = $this->Md_dashboard->getFaktorPerceraianBykecamatan($row->id_lokasi);
        }
        foreach ($faktor as $row2) {
            foreach ($row2->data as $row3) {
                $row3->data2 = $this->Md_dashboard->getFaktorperceraianByLokasi($row3->kecamatan, $row3->tahun);
                $row3->data3 = $this->Md_dashboard->getKpiByTahun($row3->tahun);
            }
        }
        // var_dump($faktor);
        // die;
        $data['graf_faktor'] = $faktor;
        $data['page'] = 'dashboard_faktor_penyebab';

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard_faktor_penyebab', $data);
        $this->load->view('templates/pimpinan/footer');
    }

    public function faktor_perkara()
    {
        $faktor = $this->Md_dashboard->getKecamatan();
        foreach ($faktor as $row) {
            $row->data = $this->Md_dashboard->getFaktorPerceraianBykecamatan($row->id_lokasi);
        }
        foreach ($faktor as $row2) {
            foreach ($row2->data as $row3) {
                $row3->data2 = $this->Md_dashboard->getJenisperkaraByLokasi($row3->kecamatan, $row3->tahun);
            }
        }
        // var_dump($faktor);
        // die;
        $data['graf_faktor'] = $faktor;
        $data['page'] = 'dashboard_faktor_perkara';

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard_faktor_perkara', $data);
        $this->load->view('templates/pimpinan/footer');
    }

    public function peta($param1 = '')
    {
        if (empty($param1)) {
            $thn = date('Y');
        } else {
            $thn = $param1;
        }

        $mapkec = $this->Md_dashboard->getKasusPerkecamatan($thn);

        foreach ($mapkec as $row) {
            $row->data2 = $this->Md_dashboard->getUsiaByKecamatan2($row->kecamatan, $thn);
        }
        $data['maps'] = $mapkec;
        $data['page'] = 'dashboard_peta';

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard_peta', $data);
        $this->load->view('templates/pimpinan/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
