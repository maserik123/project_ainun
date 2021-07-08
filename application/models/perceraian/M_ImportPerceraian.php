<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_ImportPerceraian extends CI_Model {

    //insert dim lokasi
    public function getKecamatan($kecamatan) //ngambil data dr controller tadi yg isinya value kecamatan
    {
        $priority= $this->db->query("SELECT kecamatan FROM dim_lokasi WHERE kecamatan = '$kecamatan'")->result();

        if (empty($priority)){
            $dimLokasi = array('kecamatan'=> $kecamatan); //cocokkan isi variabel dari $kecamatan ke dalam kolom kecamatan di db
            $this->db->replace('dim_lokasi', $dimLokasi); //masukkan data / insert
        }
    }       

    //insert dim jenis perkara
    public function getPerkara($jenisPerkara)
    {
        $priority= $this->db->query("SELECT jenis_perkara FROM dim_jenis_perkara WHERE jenis_perkara = '$jenisPerkara'")->result();

        if (empty($priority)){
            $dimPerkara = array('jenis_perkara'=> $jenisPerkara);
            $this->db->replace('dim_jenis_perkara', $dimPerkara);
    }
}

    //insert dim penyebab
    public function getpenyebab($penyebab)
    {
        $priority= $this->db->query("SELECT faktor_penyebab_perceraian FROM dim_faktor_penyebab_perceraian WHERE faktor_penyebab_perceraian = '$penyebab'")->result();

        if (empty($priority)){
            $dimPenyabab = array('faktor_penyebab_perceraian'=> $penyebab); 
            $this->db->replace('dim_faktor_penyebab_perceraian', $dimPenyabab);
    }
}

    //insert dim pasangan
    public function getpasangan($usiaSuami, $usiaIstri)
    {
        $dimPasangan = array('usia_suami'=> $usiaSuami, 'usia_istri' => $usiaIstri);

        $this->db->replace('dim_pasangan', $dimPasangan);
    }

    //insert fact tingkat perceraian
    public function import_data_fact($waktu2, $pasanganFact, $kecamatanFact, $jenisPerkaraFact, $penyebabFact)
    {
        $factCerai = array('id_waktu'=> $waktu2, 'id_pasangan' => $pasanganFact, 'id_jenis_perkara' => $jenisPerkaraFact, 'id_lokasi' => $kecamatanFact, 'id_faktor_penyebab_perceraian' => $penyebabFact);

        $this->db->replace('fact_tingkat_perceraian', $factCerai);
    }
    
}