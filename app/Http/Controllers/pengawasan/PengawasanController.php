<?php

namespace App\Http\Controllers\pengawasan;

use App\Http\Controllers\Controller;
use App\model\pengawasan\Pengawasan;
use Illuminate\Http\Request;
use Session;

class PengawasanController extends Controller

{ 
    public function index($id)
    {
        $data['all'] = Pengawasan::where('id_pilih', $id)->get();
        $data['id_pilih'] = $id;
        return view('components.pengawasan.pengawasan.index', compact('data'));
    }
    public function store(request $request)
    {
        $request->validate([
            'keterangan' => 'required',
            'tanggal' => 'required',
            'paslon' => 'file|mimes:jpeg,png,jpg,gif,docx,doc,pdf,ppt|max:2048',
            'pengguna_hak_pilih' => 'file|mimes:jpeg,png,jpg,gif,docx,doc,pdf,ppt|max:2048',
            'rekapitulasi_hasil_suara' => 'file|mimes:jpeg,png,jpg,gif,docx,doc,pdf,ppt|max:2048',
            'rekomendasi' => 'file|mimes:jpeg,png,jpg,gif,docx,doc,pdf,ppt|max:2048'
        ]);

        if ($request->paslon != '') {
            $paslon = date('mdYHis') . time() . '.' . $request->paslon->extension();
            $request->paslon->move('berkas/', $paslon);
        } 
        else{
            $paslon = '';
        }
        
        if ($request->pengguna_hak_pilih != '') {
            $pengguna_hak_pilih = date('mdYHis') . '.' . $request->pengguna_hak_pilih->extension();
            $request->pengguna_hak_pilih->move('berkas/', $pengguna_hak_pilih);
        } 
        else{
            $pengguna_hak_pilih = '';
        }
        if ($request->rekapitulasi_hasil_suara != '') {
            $rekapitulasi_hasil_suara = time() . '.' . $request->rekapitulasi_hasil_suara->extension();
            $request->rekapitulasi_hasil_suara->move('berkas/', $rekapitulasi_hasil_suara);
        } 
        else{
            $paslon = '';
        }
        if ($request->rekomendasi != '') {
            $rekomendasi =  time() . date('mdYHis') . '.' . $request->rekomendasi->extension();
            $request->rekomendasi->move('berkas/', $rekomendasi);
        } 
        else {
            $rekomendasi = '';
        }
        Pengawasan::create([
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'paslon' => $paslon,
            'pengguna_hak_pilih' => $pengguna_hak_pilih,
            'rekapitulasi_hasil_suara' => $rekapitulasi_hasil_suara,
            'rekomendasi' => $rekomendasi,
            'id_pilih' => $request->id_pilih,
        ]);
        return redirect("/pengawasan/$request->id_pilih")->with('status', "Data Laporan Akhir Berhasil di Tambahkan");
    }

    public function getUbah()
    {
        $uid = $_GET["uid"];
        return Pengawasan::firstWhere('uid', $uid);
    }
    public function update(Request $request)
    {
       
        $request->validate([

            'keterangan' => 'required',
            'tanggal' => 'required',
            'paslon' => 'file|mimes:jpeg,png,jpg,gif,docx,doc,pdf,ppt|max:2048',
            'pengguna_hak_pilih' => 'file|mimes:jpeg,png,jpg,gif,docx,doc,pdf,ppt|max:2048',
            'rekapitulasi_hasil_suara' => 'file|mimes:jpeg,png,jpg,gif,docx,doc,pdf,ppt|max:2048',
            'rekomendasi' => 'file|mimes:jpeg,png,jpg,gif,docx,doc,pdf,ppt|max:2048'
        ]);

        if ($request->paslon != '') {
            $paslon = date('mdYHis') . time() . '.' . $request->paslon->extension();
            $request->paslon->move('berkas/', $paslon);
        } 
        else{
            $paslon = $request->paslon_edit;
        }
        
        if ($request->pengguna_hak_pilih != '') {
            $pengguna_hak_pilih = date('mdYHis') . '.' . $request->pengguna_hak_pilih->extension();
            $request->pengguna_hak_pilih->move('berkas/', $pengguna_hak_pilih);
        } 
        else{
            $pengguna_hak_pilih = $request->pengguna_hak_pilih_edit;
        }
        if ($request->rekapitulasi_hasil_suara != '') {
            $rekapitulasi_hasil_suara = time() . '.' . $request->rekapitulasi_hasil_suara->extension();
            $request->rekapitulasi_hasil_suara->move('berkas/', $rekapitulasi_hasil_suara);
        } 
        else{
            $rekapitulasi_hasil_suara = $request->rekapitulasi_hasil_suara_edit;
        }
        if ($request->rekomendasi != '') {
            $rekomendasi =  time() . date('mdYHis') . '.' . $request->rekomendasi->extension();
            $request->rekomendasi->move('berkas/', $rekomendasi);
        } 
        else {
            $rekomendasi = $request->rekomendasi_edit;
        }
      
            Pengawasan::where('uid', $request->uid)->update([
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
                'paslon' => $paslon,
                'pengguna_hak_pilih' => $pengguna_hak_pilih,
                'rekapitulasi_hasil_suara' => $rekapitulasi_hasil_suara,
                'rekomendasi' => $rekomendasi,
            ]);
        return redirect("/pengawasan/$request->id_pilih")->with('status', 'Data Laporan Akhir Berhasil Telah di Ubah');
    }

    public function destroy()
    {
        // soft delete
        $uid = $_GET["uid"];
        $id_pilih = $_GET["id_pilih"];
        Pengawasan::where('uid', $uid)->update(['deleted_at' => now()]);
        return redirect("/pengawasan/$id_pilih")->with('status', 'Data Laporan Akhir Berhasil di Hapus');
    }
    
   public function paslon($uid)
   {
      $data = Pengawasan::firstWhere('uid', $uid);
       $paslon = "./berkas/$data->paslon";
       return response()->download($paslon);
   }
   public function pengguna_hak_pilih($uid)
   {
      $data = Pengawasan::firstWhere('uid', $uid);
       $pengguna_hak_pilih = "./berkas/$data->pengguna_hak_pilih";
       return response()->download($pengguna_hak_pilih);
   }
   public function rekapitulasi($uid)
   {
      $data = Pengawasan::firstWhere('uid', $uid);
       $rekapitulasi = "./berkas/$data->rekapitulasi_hasil_suara";
       return response()->download($rekapitulasi);
   }
   public function rekomendasi($uid)
   {
      $data = Pengawasan::firstWhere('uid', $uid);
       $rekomendasi = "./berkas/$data->rekomendasi";
       return response()->download($rekomendasi);
   }

}
