<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dim_waktu_model extends CI_Model
 {

    public function getWaktuCerai($waktuFull)
    {    
        $pecah= explode("-", $waktuFull); //kita pecahkan tanggal yang di import (fungsi explode). 


        //2020-10-12

        //Dijadikan 3 index mulai dr 0
        //2020 [0] tahun
        //10 [1] bulan
        //12 [2] tanggal

        $tahun= $pecah[0]; //hasil explode
        $bulan= $pecah[1]; //hasil explode

    $array = array('waktu_full'=>$waktuFull, 'tahun' => $tahun, 'bulan' => $bulan); //sesuaikan kolom di db dengan data
    $this->db->replace('dim_waktu', $array); //insert / import ke tabel waktu

    }
    public function getDimWaktu()
    {
        return $this->db->get('dim_waktu')->result_array();
    }
    

}