<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index(){
        return view("sesi/index");
    }
    function login(Request $request){

        Session::flash('email',$request->email);

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Email wajib di isi',
            'password.required' => 'Password wajib di isi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password'=> $request->password
        ];

        if(Auth::attempt($infologin)){
            return redirect('siswa')->with('success', 'Berhasil Login');
        }else{
            return redirect('sesi')->withErrors('Email dan Password yang anda masukkan tidak valid');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('sesi')->with('success', 'Berhasil LogOut');
    }

    function register(){
        return view('sesi/register');
    }
    function create(Request $request){
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ], [
            'name.required' => 'Name wajib di isi',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Silahkan masukkan email yang valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib di isi',
            'password.min' => 'Minimum password yang di inputkan 8 karakter',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        User::create($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            return redirect('siswa')->with('success', Auth::user()->name . 'Berhasil Login');
        } else {
            return redirect('sesi')->withErrors('Email dan Password yang anda masukkan tidak valid');
        }
    }
}
