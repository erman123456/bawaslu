<?php

namespace App\Http\Controllers\sengketa;

use App\Http\Controllers\Controller;
use App\model\sengketa\Sengketa1;
use Illuminate\Http\Request;
use PDF;

class SengketaController extends Controller
{ 
    public function index($id)
    {
        $data['all'] = Sengketa1::where('id_pilih',$id)->get();
        $data["id_pilih"] = $id;
        return view('components.sengketa.sengketa.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'tanggal' => 'required',
            'nomor_pemohon' => 'required',
            'nik' => 'required',
            'nama_pemohon' => 'required',
            'jk' => 'required',
            'objek_sengketa' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'tindak_lanjut' => 'mimes:jpeg,png,jpg,gif,docx,doc,pdf,ppt|max:2048',
            'putusan_penyelesaian' => 'mimes:jpeg,png,jpg,gif,docx,doc,pdf,ppt|max:2048',
            ]);
            if ($request->tindak_lanjut != '') {
                $tindak_lanjut = date('mdYHis') . time() . '.' . $request->tindak_lanjut->extension();
                $request->tindak_lanjut->move('berkas/sengketa/', $tindak_lanjut);
            }
            else{

                $tindak_lanjut = '';
            }
            if ($request->putusan_penyelesaian != '') {
                $putusan_penyelesaian = time() . '.' . $request->putusan_penyelesaian->extension();
                $request->putusan_penyelesaian->move('berkas/sengketa/', $putusan_penyelesaian);
            } else {
                $putusan_penyelesaian = '';
            }
            Sengketa1::create([
                'nik' => $request->nik,
                'tanggal' => $request->tanggal,
                'nomor_pemohon' => $request->nomor_pemohon,
                'nik' => $request->nik,
                'nama_pemohon' => $request->nama_pemohon,
                'jk' => $request->jk,
                'objek_sengketa' => $request->objek_sengketa,
                'alamat' => $request->alamat,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'pekerjaan' => $request->pekerjaan,
                'tindak_lanjut' => $tindak_lanjut,
                'putusan_penyelesaian' => $putusan_penyelesaian,
                'id_pilih' => $request->id_pilih,
                ]);
                return redirect("/sengketa/$request->id_pilih")->with('status', 'Data Registrasi Sengketa Berhasil di Tambahkan');
            }
            
            
            public function getUbah()
            {
                $uid = $_GET["uid"];
        return Sengketa1::firstWhere('uid', $uid);
    }
    public function update(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'tanggal' => 'required',
            'nomor_pemohon' => 'required',
            'nik' => 'required',
            'nama_pemohon' => 'required',
            'jk' => 'required',
            'objek_sengketa' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'tindak_lanjut' => 'mimes:jpeg,png,jpg,gif,docx,doc,pdf,ppt|max:2048',
            'putusan_penyelesaian' => 'mimes:jpeg,png,jpg,gif,docx,doc,pdf,ppt|max:2048',
            ]);
            if ($request->tindak_lanjut != '') {
                $tindak_lanjut = date('mdYHis') . time() . '.' . $request->tindak_lanjut->extension();
                $request->tindak_lanjut->move('berkas/sengketa/', $tindak_lanjut);
                
            }
            else{
                $tindak_lanjut = '';
            }
            
            if ($request->putusan_penyelesaian != '' ) {
                $putusan_penyelesaian = date('mdYHis') . '.' . $request->putusan_penyelesaian->extension();
                $request->putusan_penyelesaian->move('berkas/sengketa/', $putusan_penyelesaian);
                
            }else {
                $putusan_penyelesaian = '';
            }
    
            if ($request->tindak_lanjut == '' and $request->putusan_penyelesaian =='') {
                Sengketa1::where('uid', $request->uid)->update([
                    'nik' => $request->nik,
                    'tanggal' => $request->tanggal,
                    'nomor_pemohon' => $request->nomor_pemohon,
                    'nik' => $request->nik,
                    'nama_pemohon' => $request->nama_pemohon,
                    'jk' => $request->jk,
                    'objek_sengketa' => $request->objek_sengketa,
                    'alamat' => $request->alamat,
                    'pekerjaan' => $request->pekerjaan,
                ]);
            }
            elseif($request->tindak_lanjut == '' ) {
                Sengketa1::where('uid', $request->uid)->update([
                    'nik' => $request->nik,
                    'tanggal' => $request->tanggal,
                    'nomor_pemohon' => $request->nomor_pemohon,
                    'nik' => $request->nik,
                    'nama_pemohon' => $request->nama_pemohon,
                    'jk' => $request->jk,
                    'objek_sengketa' => $request->objek_sengketa,
                    'alamat' => $request->alamat,
                    'pekerjaan' => $request->pekerjaan,
                    'putusan_penyelesaian' => $putusan_penyelesaian,
                ]);
            }
            elseif($request->putusan_penyelesaian == '' ) {
                Sengketa1::where('uid', $request->uid)->update([
                    'nik' => $request->nik,
                    'tanggal' => $request->tanggal,
                    'nomor_pemohon' => $request->nomor_pemohon,
                    'nik' => $request->nik,
                    'nama_pemohon' => $request->nama_pemohon,
                    'jk' => $request->jk,
                    'objek_sengketa' => $request->objek_sengketa,
                    'alamat' => $request->alamat,
                    'pekerjaan' => $request->pekerjaan,
                    'tindak_lanjut' => $tindak_lanjut,
                ]);
            }
            else{
                Sengketa1::where('uid', $request->uid)->update([
                    'nik' => $request->nik,
                    'tanggal' => $request->tanggal,
                    'nomor_pemohon' => $request->nomor_pemohon,
                    'nik' => $request->nik,
                    'nama_pemohon' => $request->nama_pemohon,
                    'jk' => $request->jk,
                    'objek_sengketa' => $request->objek_sengketa,
                    'alamat' => $request->alamat,
                    'pekerjaan' => $request->pekerjaan,
                    'putusan_penyelesaian' => $putusan_penyelesaian,
                    'tindak_lanjut' => $tindak_lanjut,
                ]);
            }
        return redirect("/sengketa/$request->id_pilih")->with('status', 'Registrasi Sengketa Telah di Ubah');
    }

    public function destroy()
    {
        // Soft delete
        $uid = $_GET["uid"];
        $id_pilih = $_GET["id_pilih"];
        Sengketa1::where('uid', $uid)->update(['deleted_at' => now()]);
        return redirect("/sengketa/$id_pilih")->with('status', 'Registrasi Sengketa Berhasil di Hapus');
    }

   
   public function putusan_penyelesaian_sengketa($uid)
   {
      $data = Sengketa1::firstWhere('uid', $uid);
       $file = public_path(). "/berkas/sengketa/$data->putusan_penyelesaian";
       return response()->download($file);
   }
   public function tindak_lanjut_sengketa($uid)
   {
      $data = Sengketa1::firstWhere('uid', $uid);
       $file = "./berkas/sengketa/$data->tindak_lanjut";
       return response()->download($file);
   }

}
