@extends('layouts.app')

@section('content')
    <a href="/siswa/create" class="btn btn-primary">+Tambah data siswa</a>
    <table class="table">
        <thead>
            <th>Foto</th>
            <th>Nomor Induk</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @foreach ($data as $datas)
                <tr>
                    <td>
                        @if ($datas->foto)
                            <img style="max-width: 50px; max-height:50px" src="{{ url('foto').'/'.$datas->foto }}" alt="">
                        @endif
                    </td>
                    <td>{{ $datas->nomor_induk }}</td>
                    <td>{{ $datas->nama }}</td>
                    <td>{{ $datas->alamat }}</td>
                    <td>
                        <a href="{{ url('/siswa/'.$datas->nomor_induk) }}" class="btn btn-secondary btn-sm">Detail</a>
                        <a href="{{ url('/siswa/'.$datas->nomor_induk.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                        <form onsubmit="return confirm('Yakin mau hapus data')" action="{{ '/siswa/'.$datas->nomor_induk }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
