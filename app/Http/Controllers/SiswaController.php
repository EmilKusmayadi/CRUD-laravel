<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = siswa::orderBy('nomor_induk', 'asc')->paginate(5);
        return view('siswa.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nomor_induk', $request->nomor_induk);
        Session::flash('nama', $request->nama);
        Session::flash('alamat', $request->alamat);
        $request->validate([
            'nomor_induk' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
            'foto' => 'required|mimes:png,jpg,jpeg'
        ],[
            'nomor_induk.required' => 'Nomor induk wajid di isi',
            'nomor_induk.numeric' => 'Nomor induk wajid di isi dengan angka',
            'nama.required' => 'Nama wajid di isi',
            'alamat.required' => 'Alamat wajid di isi',
            'foto.required' => 'foto wajid di isi',
            'foto.mimes' => 'Foto hanya di perbolehkan type filenya png.jgp.jpeg'
        ]);

        $foto_file = $request->file('foto');
        $foto_extensi = $foto_file->extension();
        $foto_nama = date('ymdhis'). '.' .$foto_extensi;
        $foto_file->move(public_path('foto'),$foto_nama);
        $data = [
            'nomor_induk' => $request->input('nomor_induk'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'foto' => $foto_nama
        ];
        siswa::create($data);
        return redirect('siswa')->with('success', 'Berhasil memasukkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = siswa::where('nomor_induk', $id)->first();
        return view('siswa.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = siswa::where('nomor_induk', $id)->first();
        return view('siswa.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required'
        ],[
            'nama.required' => 'Nama  wajib di isi',
            'alamat.required' => 'Alamat wajib di ',
        ]);
        $data = [
            'nama' =>$request->input('nama'),
            'alamat' =>$request->input('alamat')
        ];

        if($request->hasFile('foto')){
            $request->validate([
                'foto' => 'mimes:png,jpg,jpeg'
            ],[
                'foto.mimes' => 'Foto hanya di perbolehkan type filenya png.jgp.jpeg'
            ]);
            $foto_file = $request->file('foto');
            $foto_extensi = $foto_file->extension();
            $foto_nama = date('ymdhis') . '.' . $foto_extensi;
            $foto_file->move(public_path('foto'), $foto_nama);

            $data_foto = siswa::where('nomor_induk', $id)->first();
            File::delete(public_path('foto').'/'.$data_foto->foto);

            $data['foto'] = $foto_nama;

        }

        siswa::where('nomor_induk',$id)->update($data);
        return redirect('/siswa')->with('success', 'Berhasil memasukkan data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = siswa::where('nomor_induk', $id)->first();
        File::delete(public_path('foto').'/'.$data->foto);
        siswa::where('nomor_induk', $id)->delete();
        return redirect('/siswa')->with('success', 'Berhasil hapus data');
    }
}
