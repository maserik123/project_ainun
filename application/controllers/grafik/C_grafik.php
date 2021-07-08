<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_grafik extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('grafik/M_grafik');
    }

    public function latihan()
    {
        $data['queryLatihan'] = $this->M_grafik->getTotalCerai(); 

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('grafik/V_latihan', $data);
		$this->load->view('templates/footer');
    }   

    // public function grafiktalak()
    // {
    //     // $data['queryLatihan'] = $this->M_grafik->getTotalCerai(); 

    //     $this->load->view('templates/header');
    //     // $this->load->view('templates/sidebar');
    //     $this->load->view('grafik/V_talak');
	// 	$this->load->view('templates/footer');
    // }    
}