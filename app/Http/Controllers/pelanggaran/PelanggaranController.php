<?php

namespace App\Http\Controllers\pelanggaran;

use App\Http\Controllers\Controller;
use App\model\pelanggaran\Pelanggaran;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{ 
    public function index($id)
    {
    $data['all'] = Pelanggaran::where('id_pilih' , $id)->get();
    $data['id_pilih'] = $id;
    return view('components.pelanggaran.pelanggaran.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggaran' => 'required',
        ]);
        Pelanggaran::create([
            'nama_pelanggaran' => $request->nama_pelanggaran,
            'id_pilih' => $request->id_pilih
        ]);
        return redirect("/pelanggaran/$request->id_pilih")->with('status', 'Data Pelanggaran Berhasil di Tambahkan');
    }


    public function getUbah()
    {
        $uid = $_GET["uid"];
        return Pelanggaran::firstWhere('uid', $uid);
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_pelanggaran' => 'required'
        ]);
        Pelanggaran::where('uid', $request->uid)->update([
            'nama_pelanggaran' => $request->nama_pelanggaran,
            'id_pilih' => $request->id_pilih
            ]);

        return redirect("/pelanggaran/$request->id_pilih")->with('status', 'Data Pelanggaran Telah di Ubah');
    }

    public function destroy()
    {
        // hard delete
        $uid =$_GET["uid"];
        $id_pilih =$_GET["id_pilih"];
        Pelanggaran::where('uid', $uid)->update(['deleted_at' => now()]);
        return redirect("/pelanggaran/$id_pilih")->with('status', 'Data Pelanggaran Berhasil di Hapus');
    }

}
