@extends('layouts.app')

@section('content')
    <form action="/siswa" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nomor_induk" class="form-label">Nomor Induk</label>
            <input type="text" name="nomor_induk" id="nomor_induk" class="form-control" value="{{ Session::get('nomor_induk') }}">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ Session::get('nama') }}">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="" class="form-control">{{ Session::get('alamat') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">foto</label>
            <input type="file" name="foto" id="foto" class="form-control">
        </div>
        <div class="mb-3">
            <button type="submit" name="" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
