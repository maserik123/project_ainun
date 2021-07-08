<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Md_dashboard extends CI_Model
{
    // fix

    public function getKecamatan()
    {
        return $this->db->get('dim_lokasi')->result();
    }

    public function getFaktorPerceraianBykecamatan($kec)
    {
        $this->db->select('c.tahun, b.kecamatan, count(id_tingkat_perceraian) as jumlah');
        $this->db->join('dim_lokasi as b', 'b.id_lokasi = a.id_lokasi');
        $this->db->join('dim_waktu as c', 'c.id_waktu = a.id_waktu');
        $this->db->where('b.id_lokasi', $kec);
        $this->db->group_by('1,2');
        $this->db->order_by('1 desc, 2 asc');
        return $this->db->get('fact_tingkat_perceraian as a')->result();
    }

    public function getFaktorperceraianByLokasi($lokasi, $thn = '')
    {
        $this->db->select('aa.faktor_penyebab_perceraian as faktor, bb.tahun, bb.kecamatan, bb.jumlah as jumlah_faktor');
        $this->db->join('(SELECT a.id_faktor_penyebab_perceraian, c.tahun, b.kecamatan, coalesce(COUNT(a.id_tingkat_perceraian),0) as jumlah from fact_tingkat_perceraian as a 
        JOIN dim_lokasi as b on b.id_lokasi = a.id_lokasi
        join dim_waktu as c on c.id_waktu = a.id_waktu
         where b.kecamatan = "' . $lokasi . '"
        and c.tahun = ' . $thn . '
        group by 1,2,3) as bb', 'bb.id_faktor_penyebab_perceraian = aa.id_faktor_penyebab_perceraian', 'left');
        $this->db->order_by('1', 'asc');
        return $this->db->get('dim_faktor_penyebab_perceraian as aa')->result();
    }

    public function getKpiByTahun($thn)
    {
        $this->db->select('b.faktor_penyebab_perceraian as faktor, a.kpi');
        $this->db->join('dim_faktor_penyebab_perceraian as b', 'b.id_faktor_penyebab_perceraian = a.id_faktor_penyebab_perceraian', 'right');
        $this->db->order_by('1 asc');
        return $this->db->get('(SELECT * from dim_kpi WHERE tahun = ' . $thn . ') as a')->result();
    }

    public function getJenisperkaraByLokasi($lokasi, $thn)
    {
        $this->db->select('aa.jenis_perkara as faktor, bb.tahun, bb.kecamatan, bb.jumlah as jumlah_faktor');
        $this->db->join('(SELECT a.id_jenis_perkara, c.tahun, b.kecamatan, coalesce(COUNT(a.id_tingkat_perceraian),0) as jumlah from fact_tingkat_perceraian as a 
        JOIN dim_lokasi as b on b.id_lokasi = a.id_lokasi
        join dim_waktu as c on c.id_waktu = a.id_waktu
         where b.kecamatan = "' . $lokasi . '"
        and c.tahun = ' . $thn . '
        group by 1,2,3) as bb', 'bb.id_jenis_perkara = aa.id_jenis_perkara', 'left');
        $this->db->order_by('1', 'asc');
        return $this->db->get('dim_jenis_perkara as aa')->result();
    }

    public function getKasusPerkecamatan($thn)
    {
        $this->db->select('aa.kecamatan, aa.la, aa.lo, COUNT(id_tingkat_perceraian) as jumlah');
        $this->db->join('(select a.* from fact_tingkat_perceraian as a join dim_waktu as b on. b.id_waktu = a.id_waktu where b.tahun = ' . $thn . ') as bb', 'bb.id_lokasi = aa.id_lokasi');
        $this->db->group_by('1');
        $this->db->order_by('4', 'desc');
        return $this->db->get('dim_lokasi as aa')->result();
    }

    public function getUsiaByKecamatan2($kec, $thn)
    {
        $this->db->select('a.*');

        $this->db->from('(select coalesce(dat.usia, dat2.usia) as usia, coalesce(dat.jml_suami,0) as jml_suami, coalesce(dat2.jml_istri,0) as jml_istri 
        from (SELECT c.usia_suami as usia, COUNT(a.id_pasangan) as jml_suami FROM `fact_tingkat_perceraian`as a join dim_lokasi as b on b.id_lokasi = a.id_lokasi join dim_pasangan as c on c.id_pasangan = a.id_pasangan join dim_waktu as d on d.id_waktu = a.id_waktu where d.tahun = ' . $thn . ' and b.kecamatan = "' . $kec . '" group by 1)as dat 
        left join (SELECT c.usia_istri as usia, COUNT(a.id_pasangan) as jml_istri FROM `fact_tingkat_perceraian`as a join dim_lokasi as b on b.id_lokasi = a.id_lokasi join dim_pasangan as c on c.id_pasangan = a.id_pasangan join dim_waktu as d on d.id_waktu = a.id_waktu where d.tahun = ' . $thn . ' and b.kecamatan = "' . $kec . '"  group by 1)as dat2 on dat2. usia = dat.usia
        
        UNION
        
        select coalesce(dat.usia, dat2.usia) as usia, coalesce(dat.jml_suami,0) as jml_suami, coalesce(dat2.jml_istri,0) as jml_istri
        from (SELECT c.usia_suami as usia, COUNT(a.id_pasangan) as jml_suami FROM `fact_tingkat_perceraian`as a join dim_lokasi as b on b.id_lokasi = a.id_lokasi join dim_pasangan as c on c.id_pasangan = a.id_pasangan join dim_waktu as d on d.id_waktu = a.id_waktu where d.tahun = ' . $thn . ' and b.kecamatan = "' . $kec . '"  group by 1)as dat 
        right join (SELECT c.usia_istri as usia, COUNT(a.id_pasangan) as jml_istri FROM `fact_tingkat_perceraian`as a join dim_lokasi as b on b.id_lokasi = a.id_lokasi join dim_pasangan as c on c.id_pasangan = a.id_pasangan join dim_waktu as d on d.id_waktu = a.id_waktu where d.tahun = ' . $thn . ' and b.kecamatan = "' . $kec . '"  group by 1)as dat2 on dat2. usia = dat.usia) as a');
        $this->db->order_by('1', 'asc');

        return $this->db->get()->result();
    }

    public function getJumlahPerceraianByFaktor($faktor, $thn = '')
    {
        $this->db->select('b.faktor_penyebab_perceraian as faktor, COUNT(id_tingkat_perceraian) as jumlah');
        $this->db->join('dim_faktor_penyebab_perceraian as b', 'b.id_faktor_penyebab_perceraian = a.id_faktor_penyebab_perceraian');
        $this->db->join('dim_waktu as c', 'c.id_waktu  = a. id_waktu ');
        $this->db->where('b.faktor_penyebab_perceraian', $faktor);
        if (!empty($thn)) {
            $this->db->where('c.tahun', $thn);
        }
        return $this->db->get('fact_tingkat_perceraian as a')->row();
    }

    public function getJumlahPerceraianByJenis($jenis, $thn = '')
    {
        $this->db->select('b.jenis_perkara as jenis, COUNT(id_tingkat_perceraian) as jumlah');
        $this->db->join('dim_jenis_perkara as b', 'b.id_jenis_perkara = a.id_jenis_perkara');
        $this->db->join('dim_waktu as c', 'c.id_waktu  = a. id_waktu ');
        $this->db->where('b.jenis_perkara', $jenis);
        if (!empty($thn)) {
            $this->db->where('c.tahun', $thn);
        }
        return $this->db->get('fact_tingkat_perceraian as a')->row();
    }

    public function getFaktorPenyebab()
    {
        return $this->db->get('dim_faktor_penyebab_perceraian')->result();
    }

    public function getFaktorPenyebabByPenyebabTahun($penyebab, $thn)
    {
        $this->db->select('d.kecamatan, coalesce(COUNT(a.id_tingkat_perceraian),0) as jumlah');
        $this->db->join('(select * from dim_faktor_penyebab_perceraian where faktor_penyebab_perceraian = "' . $penyebab . '") as b', 'b.id_faktor_penyebab_perceraian = a.id_faktor_penyebab_perceraian');
        $this->db->join('(select * from dim_waktu where tahun ="' . $thn . '") as c', 'c.id_waktu = a.id_waktu');
        $this->db->join('dim_lokasi as d', 'd.id_lokasi = a.id_lokasi', 'right');
        $this->db->group_by('1');

        return $this->db->get('fact_tingkat_perceraian as a')->result();
    }

    public function getFaktorPerkara()
    {
        return $this->db->get('dim_jenis_perkara')->result();
    }

    public function getFaktorPerkaraByPerkara($perkara)
    {
        $this->db->select('c.tahun, coalesce(COUNT(a.id_tingkat_perceraian),0) as jumlah');
        $this->db->join('(select * from dim_jenis_perkara where jenis_perkara = "' . $perkara . '") as b', 'b.id_jenis_perkara = a.id_jenis_perkara');
        $this->db->join('dim_waktu  as c', 'c.id_waktu = a.id_waktu', 'right');
        $this->db->group_by('1');
        return $this->db->get('fact_tingkat_perceraian as a')->result();
    }
}

/* End of file Dashboard.php */
