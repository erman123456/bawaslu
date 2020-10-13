<?php

namespace App\Http\Controllers;

use App\model\Divisi;
use App\model\pelanggaran\Pelanggaran;
use App\model\pelanggaran\PenangananPelanggaran;
use App\model\pengawasan\LaporanAkhirPengawasan;
use App\model\pengawasan\Pilih as PengawasanPilih;
use App\model\sengketa\Pilih;
use App\model\sengketa\LaporanSengketa;

class DashboardController extends Controller
{
    public function index()
    {
    $data["jumlah_pelanggaran"] = PenangananPelanggaran::count();
    $data["jumlah_sengketa"] = LaporanSengketa::count();
    $data["jumlah_pengawasan"] = LaporanAkhirPengawasan::count();
    $data["jumlah_divisi"] = Divisi::count();
   
    $pelanggaran = Pelanggaran::all();
     $data_pelanggaran = [];
     foreach($pelanggaran as $row) {
        $data_pelanggaran['label'][] = $row->nama_pelanggaran;
        $data_pelanggaran['data'][] = $row->jumlah;
      }
 
    $data['pelanggaran'] = json_encode($data_pelanggaran);

      
    $sengketa = Pilih::all();
     $data_sengketa = [];
     foreach($sengketa as $row) {
        $data_sengketa['label'][] = $row->nama;
        $data_sengketa['data'][] = $row->jumlah;
      }
 
    $data['sengketa'] = json_encode($data_sengketa);
        return view('components.dashboard.dashboard', $data);
    }
}
