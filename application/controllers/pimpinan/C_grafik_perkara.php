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
        $data['total'] = $this->M_grafik->getTotalCerai();   
        $data['kelompokUsiaSuami'] = $this->M_grafik->getKelompokSuami();   
        $data['kelompokUsiaIstri'] = $this->M_grafik->getKelompokistri();   
        $data['penyebabCerai'] = $this->M_grafik->getPenyebabPercerian();   
        $data['ceraiTalak'] = $this->M_grafik->getJenisCeraiTalak(); 
        $data['ceraiGugat'] = $this->M_grafik->getJenisCeraiGugat(); 
        $this->load->view('templates/pimpinan/header');
        $this->load->view('templates/pimpinan/sidebar');
        $this->load->view('grafik/V_grafik_perkara', $data);
		$this->load->view('templates/pimpinan/footer');
    }
}