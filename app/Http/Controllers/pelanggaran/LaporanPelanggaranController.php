<?php

namespace App\Http\Controllers\pelanggaran;

use App\Http\Controllers\Controller;
use App\model\pelanggaran\Pelanggaran;
use App\model\pelanggaran\LaporanPelanggaran;
use App\model\pelanggaran\PenangananPelanggaran;
use Illuminate\Http\Request;

class LaporanPelanggaranController extends Controller
{ 
    public function index($id)
    {
        $tindakan = $_GET['uid_pelanggaran'];
        $data['all'] = LaporanPelanggaran::where('uid_pelanggaran', $tindakan)->where('id_pilih', $id)->get();
        $data['pelanggaran'] = Pelanggaran::where('id_pilih', $id)->get();
        $data["id_pilih"] = $id;
        return view('components.pelanggaran.laporan_pelanggaran.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'uid_pelanggaran' => 'required',
            'file' => 'file|mimes:jpeg,png,jpg,gif,docx,doc,pdf,ppt|max:2048',
        ]);
        if ($request->file != '') {
            $file = date('mdYHis') . time() . '.' . $request->file->extension();
            $request->file->move('berkas/', $file);
        } else {
            $file = '';
        }
        LaporanPelanggaran::create([
            'tanggal' => $request->tanggal,
            'uid_pelanggaran' => $request->uid_pelanggaran,
            'file' => $file,
            'id_pilih' => $request->id_pilih
        ]);
        return redirect("/laporan_pelanggaran/$request->id_pilih?uid_pelanggaran=$request->uid_pelanggaran")->with('status', 'Data Pelanggaran Berhasil di Tambahkan');
    }


    public function getUbah()
    {
        $uid = $_GET["uid"];
        return LaporanPelanggaran::firstWhere('uid', $uid);
    }

    public function update(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'uid_pelanggaran' => 'required',
            'file' => 'file|mimes:jpeg,png,jpg,gif,docx,doc,pdf,ppt|max:2048',
        ]);
        if ($request->file != '') {
            $file = date('mdYHis') . time() . '.' . $request->file->extension();
            $request->file->move('berkas/', $file);
        } else {
            $file = '';
        }
        if ($request->file == '') {
            LaporanPelanggaran::where('uid', $request->uid)->update([
                'tanggal' => $request->tanggal,
                'uid_pelanggaran' => $request->uid_pelanggaran,
                'id_pilih' => $request->id_pilih,
            ]);
        } 
        else {
            LaporanPelanggaran::where('uid', $request->uid)->update([
                'tanggal' => $request->tanggal,
                'uid_pelanggaran' => $request->uid_pelanggaran,
                'file' => $file,
                'id_pilih' => $request->id_pilih,
            ]);
        }
        return redirect("/laporan_pelanggaran/$request->id_pilih?uid_pelanggaran=$request->uid_pelanggaran")->with('status', 'Data Pelanggaran Telah di Ubah');
    }

    public function destroy()
    {
        $uid = $_GET["uid"];
        $id_pilih = $_GET["id_pilih"];
        // hard delete
        $a = LaporanPelanggaran::firstWhere('uid', $uid);
        LaporanPelanggaran::where('uid', $uid)->update(['deleted_at' => now()]);
        return redirect("/laporan_pelanggaran/$id_pilih?uid_pelanggaran=$a[uid_pelanggaran]")->with('status', 'Data Pelanggaran Berhasil di Hapus');
    }

    public function download($uid)
    {
       $data = LaporanPelanggaran::firstWhere('uid', $uid);
        $file = "./berkas/$data->file";
        return response()->download($file);
    }

}
