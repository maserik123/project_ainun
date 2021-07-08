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
    
    public function getJenisCeraiTalak()
    {
        $query = $this->db->query("SELECT dim_waktu.tahun as tahun, COUNT(fact_tingkat_perceraian.id_tingkat_perceraian) as total, dim_jenis_perkara.jenis_perkara
        FROM fact_tingkat_perceraian 
        JOIN dim_jenis_perkara
        ON fact_tingkat_perceraian.id_jenis_perkara=dim_jenis_perkara.id_jenis_perkara
        JOIN dim_waktu
        ON fact_tingkat_perceraian.id_waktu=dim_waktu.id_waktu
        WHERE dim_jenis_perkara.jenis_perkara='Cerai Talak'
        GROUP BY dim_waktu.tahun
        ")->result();
        return $query;
    }
    public function getJenisCeraiGugat()
    {
        $query = $this->db->query("SELECT dim_waktu.tahun as tahunGugat, COUNT(fact_tingkat_perceraian.id_tingkat_perceraian) as totalGugat, dim_jenis_perkara.jenis_perkara
        FROM fact_tingkat_perceraian 
        JOIN dim_jenis_perkara
        ON fact_tingkat_perceraian.id_jenis_perkara=dim_jenis_perkara.id_jenis_perkara
        JOIN dim_waktu
        ON fact_tingkat_perceraian.id_waktu=dim_waktu.id_waktu
        WHERE dim_jenis_perkara.jenis_perkara='Cerai Gugat'
        GROUP BY dim_waktu.tahun
        ")->result();
        return $query;
    }
    public function getKelompokSuami()
    {
        $query = $this->db->query("SELECT (fact_tingkat_perceraian.id_tingkat_perceraian) as usiaSuami, 
        CASE 
        WHEN dim_pasangan.usia_suami BETWEEN 15 AND 20  THEN '15-20'
        WHEN dim_pasangan.usia_suami BETWEEN 21 AND 30  THEN '21-30'
        WHEN dim_pasangan.usia_suami BETWEEN 31 AND 40  THEN '31-40'
        WHEN dim_pasangan.usia_suami BETWEEN 41 AND 50  THEN '41-50'
        WHEN dim_pasangan.usia_suami BETWEEN 51 AND 60  THEN '51-60'
        WHEN dim_pasangan.usia_suami >= 61 THEN '60+' 
        END as kelompok
        FROM fact_tingkat_perceraian
        JOIN dim_pasangan
        ON fact_tingkat_perceraian.id_pasangan=dim_pasangan.id_pasangan
        GROUP BY kelompok
        ")->result();
        return $query;
    }
    public function getKelompokistri()
    {
        $query = $this->db->query("SELECT (fact_tingkat_perceraian.id_tingkat_perceraian) as usiaistri, 
        CASE 
        WHEN dim_pasangan.usia_istri BETWEEN 15 AND 20  THEN '15-20'
        WHEN dim_pasangan.usia_istri BETWEEN 21 AND 30  THEN '21-30'
        WHEN dim_pasangan.usia_istri BETWEEN 31 AND 40  THEN '31-40'
        WHEN dim_pasangan.usia_istri BETWEEN 41 AND 50  THEN '41-50'
        WHEN dim_pasangan.usia_istri BETWEEN 51 AND 60  THEN '51-60'
        WHEN dim_pasangan.usia_istri >= 61 THEN '60+' 
        END as kelompok
        FROM fact_tingkat_perceraian
        JOIN dim_pasangan
        ON fact_tingkat_perceraian.id_pasangan=dim_pasangan.id_pasangan
        GROUP BY kelompok
        ");
        return $query->result_array();
    }
    public function getPenyebabPercerian()
    {
        $query = $this->db->query("SELECT COUNT(fact_tingkat_perceraian.id_tingkat_perceraian) as total, dim_faktor_penyebab_perceraian.faktor_penyebab_perceraian as penyebab
        FROM fact_tingkat_perceraian
        JOIN dim_faktor_penyebab_perceraian
        ON fact_tingkat_perceraian.id_faktor_penyebab_perceraian=dim_faktor_penyebab_perceraian.id_faktor_penyebab_perceraian
        GROUP BY dim_faktor_penyebab_perceraian.faktor_penyebab_perceraian
        ")->result();
        return $query;
    }

    public function getFaktorPenyebabCerai()
    {
        // $query = $this->db->query("SELECT COUNT(fact_tingkat_perceraian.id_tingkat_perceraian) AS TotalCerai, dim_lokasi.kecamatan as lokasi
        // FROM fact_tingkat_perceraian
        // JOIN dim_lokasi
        // ON fact_tingkat_perceraian.id_lokasi=dim_lokasi.id_lokasi
        // GROUP BY dim_lokasi.kecamatan
        // ")->result();
        // return $query;
        
        $query = $this->db->query("SELECT 
        dim_lokasi.kecamatan as kecamatan, 
        COUNT( if( dim_faktor_penyebab_perceraian.faktor_penyebab_perceraian = 'Ekonomi', fact_tingkat_perceraian.id_tingkat_perceraian, 0 ) ) AS A,  
        COUNT( if( dim_faktor_penyebab_perceraian.faktor_penyebab_perceraian = 'KDRT', fact_tingkat_perceraian.id_tingkat_perceraian, 0 ) ) AS B, 
        COUNT( if( dim_faktor_penyebab_perceraian.faktor_penyebab_perceraian = 'Menikah Dini', fact_tingkat_perceraian.id_tingkat_perceraian, 0 ) ) AS C,
         COUNT( if( dim_faktor_penyebab_perceraian.faktor_penyebab_perceraian = 'Poligami', fact_tingkat_perceraian.id_tingkat_perceraian, 0 ) ) AS D, 
        COUNT( if( dim_faktor_penyebab_perceraian.faktor_penyebab_perceraian = 'Selingkuh', fact_tingkat_perceraian.id_tingkat_perceraian, 0 ) ) AS E 
    FROM 
        fact_tingkat_perceraian
        JOIN dim_lokasi
        ON fact_tingkat_perceraian.id_lokasi=dim_lokasi.id_lokasi
        JOIN dim_faktor_penyebab_perceraian
        ON fact_tingkat_perceraian.id_faktor_penyebab_perceraian=dim_faktor_penyebab_perceraian.id_faktor_penyebab_perceraian
    GROUP BY 
        dim_lokasi.kecamatan
        ");
        return $query->result();
    }
    
    public function totalCeraiUsia()
    {
        $query = $this->db->query("SELECT usia, COUNT(dim_pasangan.id_pasangan) totalUsiaCerai FROM(
            SELECT dim_pasangan.id_pasangan, usia_suami as usia FROM dim_pasangan
            UNION ALL
            SELECT dim_pasangan.id_pasangan, usia_istri as usia FROM dim_pasangan) t1
            JOIN dim_pasangan
            ON t1.id_pasangan=dim_pasangan.id_pasangan
            GROUP BY usia
        ")->result();
        return $query;
    }

    public function rentangUsiaPasangan()
    {
        $query = $this->db->query("SELECT CASE 
        WHEN ABS(usia_suami-usia_istri) BETWEEN 0 AND 10  THEN '0-10'
        WHEN ABS(usia_suami-usia_istri) BETWEEN 11 AND 20  THEN '10-20'
        WHEN ABS(usia_suami-usia_istri) BETWEEN 21 AND 30  THEN '20-30'
        WHEN ABS(usia_suami-usia_istri) >= 30 THEN '30+' 
        END as kelompok,  COUNT(dim_pasangan.id_pasangan) as kasusTotalRentang
        FROM fact_tingkat_perceraian
        JOIN dim_pasangan
        ON fact_tingkat_perceraian.id_pasangan=dim_pasangan.id_pasangan
        GROUP BY kelompok
        ")->result();
        return $query;
    }

    public function getUsiaPeta()

    {
        $query = $this->db->query("SELECT ROUND(AVG(total), 1) as rata, dim_lokasi.kecamatan, dim_lokasi.la, dim_lokasi.lo
        FROM(
        SELECT *,dim_pasangan.usia_suami AS total FROM dim_pasangan
        UNION ALL
        SELECT *,dim_pasangan.usia_istri as total FROM dim_pasangan) t1 JOIN
        fact_tingkat_perceraian
        ON t1.id_pasangan = fact_tingkat_perceraian.id_pasangan
        JOIN dim_lokasi
        ON fact_tingkat_perceraian.id_lokasi=dim_lokasi.id_lokasi
        GROUP BY dim_lokasi.kecamatan")->result();
        return $query;
    }
    
 }