@extends('layouts.app')

@section('content')
    <div class="w-50 center border rounded py-3 px-3 max-auto">
        <h1>Login</h1>
        <form action="/sesi/login" method="POST">
        @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ Session::get('email') }}"">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="mb-3 d-grid">

                <button name="submit" type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
@endsection
