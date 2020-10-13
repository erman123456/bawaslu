<?php

namespace App\Http\Controllers\pelanggaran;

use App\Http\Controllers\Controller;
use App\model\pelanggaran\Pelanggaran;
use App\model\pelanggaran\PenangananPelanggaran;
use Illuminate\Http\Request;

class PenangananPelanggaranController extends Controller
{ 
    public function index($id)
    {
        $data['all'] = PenangananPelanggaran::where('id_pilih' , $id)->get();
        $data['id_pilih'] = $id;
        $data['pelanggaran'] = Pelanggaran::where('id_pilih', $id)->get();
        return view('components.pelanggaran.penanganan_pelanggaran.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'uid_pelanggaran' => 'required',
            'keterangan' => 'required',
            'file' => 'file|mimes:jpeg,png,jpg,gif,svg,docx,doc,pdf,pptx,ppt|max:2048'
        ]);

        if ($request->file != '') {
            $File = time() . '.' . $request->file->extension();
            $request->file->move('berkas/', $File);
            PenangananPelanggaran::create([
                'tanggal' => $request->tanggal,
                'uid_pelanggaran' => $request->uid_pelanggaran,
                'keterangan' => $request->keterangan,
                'file' => $File,
                'id_pilih' => $request->id_pilih
            ]);
        } else { 
            PenangananPelanggaran::create([
            'tanggal' => $request->tanggal,
            'uid_pelanggaran' => $request->uid_pelanggaran,
            'keterangan' => $request->keterangan,
            'id_pilih' => $request->id_pilih,
        ]);
        }

       
        return redirect("/penanganan_pelanggaran/$request->id_pilih")->with('status', 'Data Penanganan Pelanggaran Berhasil di Tambahkan');
    }


    public function getUbah()
    {
        $uid = $_GET["uid"];
        return PenangananPelanggaran::firstWhere('uid', $uid);
    }
    public function update(Request $request)
    {
        // return $request->uid;
        $request->validate([
            'tanggal' => 'required',
            'uid_pelanggaran' => 'required',
            'keterangan' => 'required',
            'file' => 'file|mimes:jpeg,png,jpg,gif,docx,doc,pdf,ppt|max:2048',
        ]);
        if ($request->file != '') {
            $File = time() . '.' . $request->file->extension();
            $request->file->move('berkas/', $File);
        } else {
            $File = '';
        }
        if ($request->file == '') {
            PenangananPelanggaran::where('uid', $request->uid)->update([
                'tanggal' => $request->tanggal,
                'uid_pelanggaran' => $request->uid_pelanggaran,
                'keterangan' => $request->keterangan,
                'id_pilih' => $request->id_pilih
            ]);
        } 
        else {
            PenangananPelanggaran::where('uid', $request->uid)->update([
                'tanggal' => $request->tanggal,
                'uid_pelanggaran' => $request->uid_pelanggaran,
                'keterangan' => $request->keterangan,
                'file' => $File,
                'id_pilih' => $request->id_pilih
            ]);
        }
        return redirect("/penanganan_pelanggaran/$request->id_pilih")->with('status', 'Data Lembaga Telah di Ubah');
    }

    public function destroy()
    {
        // soft delete
        $uid = $_GET["uid"];
        $id_pilih = $_GET["id_pilih"];
        PenangananPelanggaran::where('uid', $uid)->update(['deleted_at' => now()]);
        return redirect("/penanganan_pelanggaran/$id_pilih")->with('status', 'Data Penanganan Pelanggaran Berhasil di Hapus');
    }

    public function download($uid)
    {
       $data = PenangananPelanggaran::firstWhere('uid', $uid);
        $file = "./berkas/$data->file";
        return response()->download($file);
    }

    public function cek(Request $request)
    {
        if(! $request->uid_pelanggaran){
            $html ='<option value="">'.trans('global.pleaseSelect').'</option>';
        }
        else{
            $html ='';
            $data = Pelanggaran::where('uid_parent', $request->uid_pelanggaran)->get();
            foreach($data as $row){
                $html .='<option value="'.$row->uid.'">'.$row->nama_pelanggaran.'</option>';
            }
        }
        return response()->json(['html' => $html]);

    }
}
