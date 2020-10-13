<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\model\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DivisiController extends Controller

{
    public function index()
    {
        $data['all'] = Divisi::all();
        return view('components.Divisi.index', compact('data'));
    }

    public function store(request $request)
    {
        $request->validate([
            'nama_divisi' => 'required',
            
        ]);
        
        Divisi::create([
            'nama_divisi' => $request->nama_divisi,
            
        ]);
        return redirect("/divisi")->with('status', "Data Divisi Berhasil di Tambahkan");
    }
    
    public function getUbah()
    {
        $uid = $_GET["uid"];
        return Divisi::firstWhere('uid', $uid);
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_divisi' => 'required' ]);
            
        Divisi::where('uid', $request->uid)->update([
            'nama_divisi' => $request->nama_divisi
            ]);
        
        return redirect("/divisi")->with('status', 'Data Lembaga Telah di Ubah');
    }

    public function destroy($uid)
    {
        // hard delete
        Divisi::where('uid', $uid)->update(['deleted_at' => now()]);
        // Lembaga::find($uid)->forceDelete();
        return redirect("/divisi")->with('status', 'Data Divisi Berhasil di Hapus');
    }
}
