<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/AutoLoader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class C_grafik_perkara extends CI_Controller 
{    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('grafik/M_grafik');
    }
    public function index()
    {    
        $data['totalKecamatan'] = $this->M_grafik->getFaktorPenyebabCerai(); 
        $data['totalUsia'] = $this->M_grafik->totalCeraiUsia(); 
        $data['rentangUsia'] = $this->M_grafik->rentangUsiaPasangan(); 

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('grafik/V_grafik_perkara', $data);
		$this->load->view('templates/footer');
    }
    public function peta()
    {    
        $data['petaUsia'] = $this->M_grafik->getUsiaPeta(); 
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('grafik/V_peta', $data);
		$this->load->view('templates/footer');
    }

    public function faktor_penyebab()
    {
        $data['faktorPenyebab'] = $this->M_grafik->getFaktorPenyebabCerai(); 
        $data['faktorPenyebabKecamatan'] = $this->M_grafik->getFaktorPenyebabCeraiKecamatan(); 
        $data['totalPenyebabKecamatan'] = $this->M_grafik->penyebabPerKecamatan(); 

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('grafik/V_grafik_perkara_faktor_perkara', $data);
		$this->load->view('templates/footer');
    }
}