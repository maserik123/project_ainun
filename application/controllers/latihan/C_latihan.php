<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class C_latihan extends CI_Controller {
    public function index()
    {
        $this->load->view('templates/header'); //manggil file header 
		$this->load->view('templates/sidebar'); //sidebar
        $this->load->view('latihan/V_latihan'); 
        $this->load->view('templates/footer');  
    }

}