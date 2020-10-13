<?php

namespace App\Http\Controllers\pelanggaran;

use App\Http\Controllers\Controller;
use App\model\pelanggaran\Pelanggaran;
use App\model\pelanggaran\PenangananPelanggaran;
use Illuminate\Http\Request;

class RekapitulasiPelanggaranController extends Controller
{ 
    public function index($id)
    {
        $data["id_pilih"]= $id;
        $data['all'] = Pelanggaran::where('id_pilih', $id)->get();
        return view('components.pelanggaran.rekapitulasi_pelanggaran.index', compact('data'));
    }

}
