<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\model\Users;
use App\model\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller

{
    public function index()
    {
        $data['all'] = Users::all();
        $data['divisi'] = Divisi::all();
        return view('components.users.index', compact('data'));
    }

    public function store(request $request)
    {
        $request->validate([
            'nama' => 'required',
            'id_jk' => 'required',
            'email' => 'email',
            'password' => 'required',
            'uid_divisi' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        if($request->foto != ''){
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move('images/', $imageName);
        }
        else{
            $imageName = '';
        }
            $password = $request->password; // password is form field
            $hashed = Hash::make($password);

        Users::create([
            'nama' => $request->nama,
            'id_jk' => $request->id_jk,
            'email' => $request->email,
            'password' => $hashed,
            'uid_divisi' => $request->uid_divisi,
            'foto' => $imageName,
        ]);
        return redirect('/users')->with('status', "Data Users Berhasil di Tambahkan")
            ->with('foto', $imageName);
    }
    
    public function getUbah()
    {
        $uid = $_GET["uid"];
        return Users::firstWhere('uid', $uid);
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'id_jk' => 'required',
            'email' => 'email',
            'uid_divisi' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($request->foto != ''){
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move('images/', $imageName);
        }
            $password = $request->password; // password is form field
            $hashed = Hash::make($password);
        if($password == '' && $request->foto == ''){
            Users::where('uid', $request->uid)->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'id_jk' => $request->id_jk,
                'uid_divisi' => $request->uid_divisi
                ]);
            }
        else if($password == ''){
            Users::where('uid', $request->uid)->update([
                'nama' => $request->nama,
                'id_jk' => $request->id_jk,
                'email' => $request->email,
                'uid_divisi' => $request->uid_divisi,
                'foto' => $imageName,
                ]);
            }
        else if($request->foto == ''){
            Users::where('uid', $request->uid)->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'id_jk' => $request->id_jk,
                'password' => $hashed,
                'uid_divisi' => $request->uid_divisi
                ]);
            }
        else{
        Users::where('uid', $request->uid)->update([
            'nama' => $request->nama,
            'id_jk' => $request->id_jk,
            'email' => $request->email,
            'password' => $hashed,
            'uid_divisi' => $request->uid_divisi,
            'foto' => $imageName,
            ]);
        }
        return redirect('/users')->with('status', 'Data Lembaga Telah di Ubah');
    }

    public function destroy($uid)
    {
        // hard delete
        Users::where('uid', $uid)->update(['deleted_at' => now()]);
        // Lembaga::find($uid)->forceDelete();
        return redirect('/users')->with('status', 'Data Users Berhasil di Hapus');
    }
}
