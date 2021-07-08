<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_grafik extends CI_Model
 {
    public function getTotalCerai()
    {
        $query = $this->db->query("SELECT COUNT(fact_tingkat_perceraian.id_tingkat_perceraian) AS TotalCerai, dim_waktu.tahun as tahun
        FROM fact_tingkat_perceraian
        JOIN dim_waktu
        ON dim_waktu.id_waktu=fact_tingkat_perceraian.id_waktu
        GROUP BY dim_waktu.tahun
        ")->result();
        return $query;
    }
    public function getJenisCerai()
    {
        $query = $this->db->query("SELECT dim_waktu.tahun as waktu, CASE
        WHEN dim_jenis_perkara.jenis_perkara='Cerai Gugat' THEN COUNT(fact_tingkat_perceraian.id_tingkat_perceraian)
        END AS CeraiGugat, CASE
        WHEN dim_jenis_perkara.jenis_perkara='Cerai Talak' THEN COUNT(fact_tingkat_perceraian.id_tingkat_perceraian)
        END AS CeraiTalak
        FROM fact_tingkat_perceraian
        JOIN dim_jenis_perkara
        ON fact_tingkat_perceraian.id_jenis_perkara=dim_jenis_perkara.id_jenis_perkara
        JOIN dim_waktu
        ON fact_tingkat_perceraian.id_waktu=dim_waktu.id_waktu
        GROUP BY dim_waktu.tahun
        ")->result();
        return $query;
    }
 }