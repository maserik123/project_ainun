<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'application/third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory; //cara panggil library spout

class ImportPerceraian extends CI_Controller {

    public function __construct()
    {
        //gunanya buat ngenalin ke fungsi lain jadi tidak perlu dibuat berulang-ulang
        parent::__construct();
        $this->load->model('perceraian/M_ImportPerceraian'); //buat ngenalin kalau class terhubung ke model namanya m_ImportPerceraian
        $this->load->model('Dim_waktu_model'); //buat ngenalin kalau class terhubung ke model namanya dim_waktu_model
    }
	public function index()
	{
        $data['title'] = 'Data Cerai';


        $this->load->view('templates/pimpinan/header'); //manggil file header 
		$this->load->view('templates/sidebar'); //sidebar
        $this->load->view('perceraian/v_importPerceraian', $data); //manggil view perceraian di folder perceraian nama v_importPerceraian
        $this->load->view('templates/footer'); //footer
    }
    
    public function uploaddata()
    {
        //awal konfigurasi spout
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'bahan_baku' .time();
        $this->load->library('upload', $config);
        if($this->upload->do_upload('importexcel')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();
            $reader->setShouldFormatDates(true);

            $reader->open('uploads/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet)
            {
                $numRow = 1;
                foreach($sheet->getRowIterator() as $row)
                {
                    if($numRow >1)
                    {
        //akhir

                        //Awal import ke dim waktu
                        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
                        // $now = date('Y-m-d H:i:s');
                        // $dataItem3 = $row->getCellAtIndex(0);
                        $waktuFull = $row->getCellAtIndex(1);
                        $this->Dim_waktu_model->getWaktuCerai($waktuFull);
                        
                        $pecah= explode("-", $waktuFull);

                        $bulan= $pecah[1];
                        $tahun= $pecah[0];
                        $query = $this->db->query("SELECT * FROM dim_waktu;");
                        $this->db->where('tahun', $tahun);
                        $this->db->where('bulan', $bulan);

                        foreach ($query->result() as $waktu)
                        {
                        $waktu2 =$waktu->id_waktu; //id untuk ke fact
                        }

                        //Akhir import ke dim waktu

                        //awal import ke dim lokasi
                        $kecamatan = $row->getCellAtIndex(8);  //$row->getCellAtIndex(cara baca kolom dari library spout). angka 8 karena kecamatan ada di index ke 8
                        $this->M_ImportPerceraian->getKecamatan($kecamatan); //mengambil value dari $kecamatan buat dikasi ke model

                        //coding untuk ngasi id ke fakta
                        $query1 = $this->db->query("SELECT * FROM dim_lokasi WHERE kecamatan = '$kecamatan'")->result(); //ambil tabel lokasi

                        foreach ($query1 as $kecamatan2)
                        {
                        $kecamatanFact =$kecamatan2->id_lokasi; // looping ngasi id sesuai data. //id untuk ke fact
                        }
                        //akhir import ke dim lokasi

                        //awal import ke dim jenis perkara
                        $jenisPerkara = $row->getCellAtIndex(9); //ambil data excel perkara
                        $this->M_ImportPerceraian->getPerkara($jenisPerkara); //kasi data perkara ke model
                        
                        $query2 = $this->db->query("SELECT * FROM dim_jenis_perkara WHERE jenis_perkara ='$jenisPerkara';")->result();

                        foreach ($query2 as $jenisPerkara2)
                        {
                        $jenisPerkaraFact =$jenisPerkara2->id_jenis_perkara; // //id untuk ke fact
                        }
                        //akhir import dim jenis perkara

                        //awal import ke dim penyebab
                        $penyebab = $row->getCellAtIndex(10); //index
                        $this->M_ImportPerceraian->getpenyebab($penyebab);
                           
                        $query3 = $this->db->query("SELECT * FROM dim_faktor_penyebab_perceraian WHERE faktor_penyebab_perceraian = '$penyebab';")->result();

                        foreach ($query3 as $penyebab2)
                        {
                        $penyebabFact =$penyebab2->id_faktor_penyebab_perceraian; // //id untuk ke fact
                        }
                        //akhir import ke dim penyebab

                        //dim pasangan
                        $usiaSuami =  $row->getCellAtIndex(3);
                        $usiaIstri = $row->getCellAtIndex(5);
                        $this->M_ImportPerceraian->getpasangan($usiaSuami, $usiaIstri);
                           
                        $query4 = $this->db->query("SELECT * FROM dim_pasangan;");
                        $this->db->where('usia_suami', $usiaSuami);
                        $this->db->where('usia_istri', $usiaIstri);

                        foreach ($query4->result() as $pasangan)
                        {
                        $pasanganFact =$pasangan->id_pasangan; // //id untuk ke fact
                        }

                        //import ke fact
                        $this->M_ImportPerceraian->import_data_fact($waktu2, $pasanganFact, $kecamatanFact, $jenisPerkaraFact, $penyebabFact);
                        //akhir import ke fact
                    }
                    $numRow++;
                }
                $reader->close();
                unlink('uploads/' . $file['file_name']);
                $this->session->set_flashdata('pesan', 'Import Data Berhasil');
                redirect('home');
            }
        } else{
            echo "Error:" . $this->upload->display_error();
        };
    }
}
