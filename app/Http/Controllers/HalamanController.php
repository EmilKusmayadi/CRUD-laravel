<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
function index(){
    $judul = "ini halaman utama";
    return view('halaman.home')->with('judul_utama', $judul);
}
function tentang($id){
    $judul = "ini halaman tentang dengan id $id";
    return view('halaman.tentang')->with('judul_tentang', $judul);
}
function kontak(){
    $data = [
        'judul' => 'ini halaman kontak',
        'kontak' => [
            'email' => 'emil0@gmail.com',
            'ig' => 'emil_ksmyd_'
        ]
        ];
        return view('halaman.kontak')->with($data);
    }
}
