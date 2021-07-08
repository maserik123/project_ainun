<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require_once APPPATH . 'third_party/Spout/AutoLoader/autoload.php';

// use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class DataPerceraian extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('perceraian/M_dataPerceraian');
    }
    
    public function index()
    {
        
        $data['semuaPerceraian'] = $this->M_dataPerceraian->getDataPerceraian();
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('perceraian/V_dataPerceraian', $data);
		$this->load->view('templates/footer');
    }
}