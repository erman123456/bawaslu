<?php

namespace App\Http\Controllers\pengawasan;

use App\Http\Controllers\Controller;
use App\model\pengawasan\LaporanAkhirPengawasan;
use Illuminate\Http\Request;
use Session;

class LaporanAkhirPengawasanController extends Controller

{ 
    public function index($id)
    {
        $data['all'] = LaporanAkhirPengawasan::where('id_pilih', $id)->get();
        $data['id_pilih'] = $id;
        return view('components.pengawasan.laporan_akhir.index', compact('data'));
    }
    public function store(request $request)
    {
        $request->validate([

            'judul' => 'required',
            'keterangan' => 'required',
            'tanggal' => 'required',
            'file' => 'file|mimes:jpeg,png,jpg,gif,docx,doc,pdf,ppt|max:2048'
        ]);

        if ($request->file != '') {
            $file = date('mdYHis') . time() . '.' . $request->file->extension();
            $request->file->move('berkas/', $file);
        } else {
            $file = '';
        }
        LaporanAkhirPengawasan::create([
            'tanggal' => $request->tanggal,
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'file' => $file,
            'id_pilih' => $request->id_pilih
        ]);
        return redirect("/laporan_pengawasan/$request->id_pilih")->with('status', "Data Laporan Akhir Berhasil di Tambahkan");
    }

    public function getUbah()
    {
        $uid = $_GET["uid"];
        return LaporanAkhirPengawasan::firstWhere('uid', $uid);
    }
    public function update(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'tanggal' => 'required',
            'file' => 'file|mimes:jpeg,png,jpg,gif,docx,doc,pdf,ppt|max:2048'
        ]);

        if ($request->file != '') {
            $file = date('mdYHis') . time() . '.' . $request->file->extension();
            $request->file->move('berkas/', $file);
        } else {
            $file = '';
        }
        if ($request->file == '') {
            LaporanAkhirPengawasan::where('uid', $request->uid)->update([
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
                'judul' => $request->judul,
                'id_pilih' => $request->id_pillih
            ]);
        } 
        else {
            LaporanAkhirPengawasan::where('uid', $request->uid)->update([
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
                'judul' => $request->judul,
                'file' => $file,
                'id_pilih' => $request->id_pilih
            ]);
        }
        return redirect("/laporan_pengawasan/$request->id_pilih")->with('status', 'Data Laporan Akhir Berhasil Telah di Ubah');
    }

    public function destroy()
    {
        // soft delete
        $uid = $_GET["uid"];
        $id_pilih = $_GET["id_pilih"];
        LaporanAkhirPengawasan::where('uid', $uid)->update(['deleted_at' => now()]);
        return redirect("/laporan_pengawasan/$id_pilih")->with('status', 'Data Laporan Akhir Berhasil di Hapus');
    }
    
   public function download($uid)
   {
      $data = LaporanAkhirPengawasan::firstWhere('uid', $uid);
       $file ="./berkas/$data->file";
       return response()->download($file);
   }

}
