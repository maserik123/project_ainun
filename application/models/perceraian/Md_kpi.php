<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Md_kpi extends CI_Model
{
    public function getAll()
    {
        $this->db->select('a.kpi_id, b.faktor_penyebab_perceraian, a.tahun, a.kpi');
        $this->db->join('dim_faktor_penyebab_perceraian as b', 'b.id_faktor_penyebab_perceraian = a.id_faktor_penyebab_perceraian');
        $this->db->order_by('tahun', 'desc');
        return $this->db->get('dim_kpi as a')->result();
    }

    public function delete($id)
    {
        $this->db->where('kpi_id', $id);
        $this->db->delete('dim_kpi');
    }

    public function getFaktorPenyebab()
    {
        return $this->db->get('dim_faktor_penyebab_perceraian')->result();
    }

    public function add($data)
    {
        $this->db->insert('dim_kpi', $data);
    }
    
    public function cekData($thn, $penyebab){
        $this->db->where('tahun', $thn);
        $this->db->where('id_faktor_penyebab_perceraian', $penyebab);
        return $this->db->get('dim_kpi')->result();
    }
}

/* End of file Md_kpi.php */
