@extends('layouts.app')

@section('content')
    <a href="/siswa" class="btn btn-secondary">Kembali</a>
    <form action="{{ '/siswa/'.$data->nomor_induk }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <h1>Nomor Induk : {{ $data->nomor_induk }}</h1>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $data->nama }}">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="" class="form-control">{{ $data->alamat }}</textarea>
        </div>
        @if ($data->foto)
            <div class="mb-3">
                <img style="max-width: 50px; max-height:50px;" src="{{ url('foto').'/'.$data->foto }}" alt="">
            </div>
        @endif
        <div class="mb-3">
            <label for="foto" class="form-label">foto</label>
            <input type="file" name="foto" id="foto" class="form-control">
        </div>
        <div class="mb-3">
            <button type="submit" name="" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
