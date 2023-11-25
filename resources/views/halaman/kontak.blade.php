@extends('layouts.app')

@section('content')

    <h1>{{ $judul }}</h1>
    <ul>
        <li>{{ $kontak['email'] }}</li>
        <li>{{ $kontak['ig'] }}</li>
    </ul>

@endsection
