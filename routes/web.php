<?php

use App\Http\Controllers\HalamanController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::resource('siswa', SiswaController::class);

Route::get('/', [HalamanController::class, 'index']);
Route::get('/tentang/{id}', [HalamanController::class, 'tentang'])->where('id','[0-9]+');
Route::get('/kontak', [HalamanController::class, 'kontak']);
