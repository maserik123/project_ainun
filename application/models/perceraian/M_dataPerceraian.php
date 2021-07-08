<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_dataPerceraian extends CI_Model {


    public function getDataPerceraian()
    {
        
        $hasil= $this->db->query("SELECT dim_waktu.waktu_full, dim_jenis_perkara.jenis_perkara, dim_pasangan.usia_suami, dim_pasangan.usia_istri,dim_lokasi.kecamatan, dim_faktor_penyebab_perceraian.faktor_penyebab_perceraian
        FROM fact_tingkat_perceraian
        JOIN dim_waktu
        ON fact_tingkat_perceraian.id_waktu=dim_waktu.id_waktu
        JOIN dim_jenis_perkara
        ON fact_tingkat_perceraian.id_jenis_perkara=fact_tingkat_perceraian.id_jenis_perkara
        JOIN dim_pasangan
        ON fact_tingkat_perceraian.id_pasangan=dim_pasangan.id_pasangan
        JOIN dim_lokasi
        ON fact_tingkat_perceraian.id_lokasi=fact_tingkat_perceraian.id_lokasi
        JOIN dim_faktor_penyebab_perceraian
        ON dim_faktor_penyebab_perceraian.id_faktor_penyebab_perceraian=fact_tingkat_perceraian.id_faktor_penyebab_perceraian
        GROUP BY fact_tingkat_perceraian.id_tingkat_perceraian ");
        return $hasil->result_array(); 
    }
}