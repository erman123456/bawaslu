<?php

namespace App\Http\Controllers;

use App\model\Divisi;
use App\model\pelanggaran\Pelanggaran;
use App\model\pelanggaran\PenangananPelanggaran;
use App\model\sengketa\Sengketa;

class DashboardController extends Controller
{
    public function index()
    {
    $data["jumlah_temuan_pelanggaran"] = PenangananPelanggaran::count();
    // $data["jumlah_sengketa"] = Sengketa::count();
    $data["jumlah_divisi"] = Divisi::count();
   
    $pelanggaran = Pelanggaran::all();
     $data_pelanggaran = [];
     foreach($pelanggaran as $row) {
        $data_pelanggaran['label'][] = $row->nama_pelanggaran;
        $data_pelanggaran['data'][] = $row->jumlah;
      }
 
    $data['pelanggaran'] = json_encode($data_pelanggaran);
        return view('components.dashboard.dashboard', $data);
    }
}
