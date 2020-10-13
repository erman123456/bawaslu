<?php

namespace App\Http\Controllers\sengketa;

use App\Http\Controllers\Controller;
use App\model\sengketa\LaporanSengketa;
use Illuminate\Http\Request;
use PDF;

class LaporanSengketaController extends Controller
{ 
    public function index($id)
    {
        $data['all'] = LaporanSengketa::where('id_pilih', $id)->get();
        $data['id_pilih'] = $id;
        return view('components.sengketa.laporan_sengketa.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'file' => 'mimes:jpeg,png,jpg,gif,docx,doc,pdf,ppt|max:2048',
            ]);
            if ($request->file != '') {
                $file = date('mdYHis') . time() . '.' . $request->file->extension();
                $request->file->move('berkas/sengketa/', $file);
            } else {
                $file = '';
            }
            LaporanSengketa::create([
                'tanggal' => $request->tanggal,
                'file' => $file,
                'id_pilih' => $request->id_pilih,
                ]);
                return redirect("laporan_sengketa/$request->id_pilih")->with('status', 'Data Laporan Sengketa Berhasil di Tambahkan');
            }
            
            
            public function getUbah()
            {
                $uid = $_GET["uid"];
        return LaporanSengketa::firstWhere('uid', $uid);
    }
    public function update(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'file' => 'mimes:jpeg,png,jpg,gif,docx,doc,pdf,ppt|max:2048',
            ]);

            if ($request->file != '') {
                $file = date('mdYHis') . time() . '.' . $request->file->extension();
                $request->file->move('berkas/sengketa/', $file);
            } else {
                $file = '';
            }
        if ($request->file == '' ) {
            LaporanSengketa::where('uid', $request->uid)->update([
                'tanggal' => $request->tanggal
            ]);
        }
        else{
            LaporanSengketa::where('uid', $request->uid)->update([
                'tanggal' => $request->tanggal,
                'file' => $file
            ]);
        }
        return redirect("laporan_sengketa/$request->id_pilih")->with('status', 'Laporan Sengketa Telah di Ubah');
    }

    public function destroy()
    {
        // hard delete
        $uid =$_GET["uid"];
        $id_pilih =$_GET["id_pilih"];
        LaporanSengketa::where('uid', $uid)->update(['deleted_at' => now()]);
        return redirect("laporan_sengketa/$id_pilih")->with('status', 'Laporan Sengketa Berhasil di Hapus');
    }

   
   public function download($uid)
   {
      $data = LaporanSengketa::firstWhere('uid', $uid);
       $file = "./berkas/sengketa/$data->file";
       return response()->download($file);
   }

}
