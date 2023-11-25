<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    function index(){
        $data = siswa::orderBy('nomor_induk','asc')->paginate(1);
        return view('siswa.index')->with('data',$data);
    }
    function detail($id){
        $data = siswa::where('nomor_induk',$id)->first();
        return view('siswa.show')->with('data',$data);
    }
}
