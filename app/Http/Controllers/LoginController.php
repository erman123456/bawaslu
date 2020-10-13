<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\model\Users;
use App\assetModel\AksesMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }
    public function cek_login(Request $request){
        // dd($request->all());
        if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])){
        return redirect(route('dashboard.index'));
        }
         else{
            return redirect('login')->with('error','Email salah atau tidak terdaftar!');
        }
    }
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('login')->with('success', 'Logout Success !');
    }
}

