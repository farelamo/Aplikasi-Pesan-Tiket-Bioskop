<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BioskopController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\KursiController;
use App\Http\Controllers\Admin\TiketController;
use App\Http\Controllers\Admin\NotifikasiController;
use App\Http\Controllers\Admin\FilmController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\UserPenggunaController;
use App\Http\Controllers\User\PageUserController;

use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'login']);

// Profil
Route::middleware('auth')->group(function(){
    Route::get('/profil', [ProfilController::class,'index'])->name('admin.profil');
});
Route::get('/profil.{id}.edit', [ProfilController::class,'edit']);
Route::put('/profil.{id}', [ProfilController::class,'update']);

// Logout
Route::get('/logout', [LoginController::class, 'logout']);

// User
Route::middleware('ceklevel')->group(function(){

Route::get('/user', [UserController::class, 'index'])->name('admin.user');
Route::get('/user.cari', [UserController::class, 'search']);
Route::get('/user.tambah', [UserController::class, 'create']);
Route::post('/user', [UserController::class, 'store']);
Route::get('/user.{id}.edit', [UserController::class, 'edit']);
Route::put('/user.{id}', [UserController::class, 'update']);
Route::get('/user.{id}', [UserController::class, 'show']);
Route::delete('/user.{id}', [UserController::class, 'destroy']);
});
// Bioskop
Route::get('/bioskop', [BioskopController::class, 'index'])->name('admin.bioskop');
Route::get('/bioskop.cari', [BioskopController::class, 'search']);
Route::get('/bioskop.tambah', [BioskopController::class, 'create']);
Route::post('/bioskop', [BioskopController::class, 'store']);
Route::get('/bioskop.{id}.edit', [BioskopController::class, 'edit']);
Route::put('/bioskop.{id}', [BioskopController::class, 'update']);
Route::delete('/bioskop.{id}', [BioskopController::class, 'destroy']);

// Genre
Route::get('/genre', [GenreController::class, 'index'])->name('admin.genre');
Route::get('/genre.cari', [GenreController::class, 'search']);
Route::get('/genre.tambah', [GenreController::class, 'create']);
Route::post('/genre', [GenreController::class, 'store']);
Route::get('/genre.{id}.edit', [GenreController::class, 'edit']);
Route::put('/genre.{id}', [GenreController::class, 'update']);
Route::delete('/genre.{id}', [GenreController::class, 'destroy']);

// Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori');
Route::get('/kategori.cari', [KategoriController::class, 'search']);
Route::get('/kategori.tambah', [KategoriController::class, 'create']);
Route::post('/kategori', [KategoriController::class, 'store']);
Route::get('/kategori.{id}.edit', [KategoriController::class, 'edit']);
Route::put('/kategori.{id}', [KategoriController::class, 'update']);
Route::delete('/kategori.{id}', [KategoriController::class, 'destroy']);

// Kursi
Route::get('/kursi', [KursiController::class, 'index'])->name('admin.kursi');
Route::get('/kursi.cari', [KursiController::class, 'search']);
Route::get('/kursi.tambah', [KursiController::class, 'create']);
Route::post('/kursi', [KursiController::class, 'store']);
Route::get('/kursi.{id}.edit', [KursiController::class, 'edit']);
Route::put('/kursi.{id}', [KursiController::class, 'update']);
Route::delete('/kursi.{id}', [KursiController::class, 'destroy']);

// Notifikasi
Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('admin.kategori');
Route::get('/notifikasi.cari', [NotifikasiController::class, 'search']);
Route::get('/notifikasi.tambah', [NotifikasiController::class, 'create']);
Route::post('/notifikasi', [NotifikasiController::class, 'store']);
Route::get('/notifikasi.{id}.edit', [NotifikasiController::class, 'edit']);
Route::put('/notifikasi.{id}', [NotifikasiController::class, 'update']);
Route::delete('/notifikasi.{id}', [NotifikasiController::class, 'destroy']);

// Tiket
Route::get('/tiket', [TiketController::class, 'index'])->name('admin.tiket');
Route::get('/tiket.cari', [TiketController::class, 'search']);
Route::get('/tiket.tambah', [TiketController::class, 'create']);
Route::post('/tiket', [TiketController::class, 'store']);
Route::get('/tiket.{id}.edit', [TiketController::class, 'edit']);
Route::put('/tiket.{id}', [TiketController::class, 'update']);
Route::delete('/tiket.{id}', [TiketController::class, 'destroy']);

// Film
Route::get('/film', [FilmController::class, 'index'])->name('admin.film');
Route::get('/film.cari', [FilmController::class, 'search']);
Route::get('/film.tambah', [FilmController::class, 'create']);
Route::post('/film', [FilmController::class, 'store']);
Route::get('/film.{id}.edit', [FilmController::class, 'edit']);
Route::put('/film.{id}', [FilmController::class, 'update']);
Route::get('/film.{id}', [FilmController::class, 'show']);
Route::delete('/film.{id}', [FilmController::class, 'destroy']);

// Jadwal
Route::get('/jadwal', [JadwalController::class, 'index'])->name('admin.jadwal');
Route::get('/jadwal.cari', [JadwalController::class, 'search']);
Route::get('/jadwal.tambah', [JadwalController::class, 'create']);
Route::post('/jadwal', [JadwalController::class, 'store']);
Route::get('/jadwal.{id}.edit', [JadwalController::class, 'edit']);
Route::put('/jadwal.{id}', [JadwalController::class, 'update']);
Route::get('/jadwal.{id}', [JadwalController::class, 'show']);
Route::delete('/jadwal.{id}', [JadwalController::class, 'destroy']);

// Transaksi
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi');
Route::get('/transaksi.cari', [TransaksiController::class, 'search']);
Route::get('/transaksi.tambah', [TransaksiController::class, 'create']);
Route::post('/transaksi', [TransaksiController::class, 'store']);
Route::get('/transaksi.{id}.edit', [TransaksiController::class, 'edit']);
Route::put('/transaksi.{id}', [TransaksiController::class, 'update']);
Route::get('/transaksi.{id}', [TransaksiController::class, 'show']);
Route::delete('/transaksi.{id}', [TransaksiController::class, 'destroy']);

// User Pengguna
Route::get('/user_pengguna', [UserPenggunaController::class, 'index'])->name('admin.film');
Route::get('/user_pengguna.cari', [UserPenggunaController::class, 'search']);
Route::get('/user_pengguna.tambah', [UserPenggunaController::class, 'create']);
Route::post('/user_pengguna', [UserPenggunaController::class, 'store']);
Route::get('/user_pengguna.{id}.edit', [UserPenggunaController::class, 'edit']);
Route::put('/user_pengguna.{id}', [UserPenggunaController::class, 'update']);
Route::get('/user_pengguna.{id}', [UserPenggunaController::class, 'show']);
Route::delete('/user_pengguna.{id}', [UserPenggunaController::class, 'destroy']);

//halaman user
Route::get('/', [PageUserController::class, 'index']);
Route::get('/signin', [PageUserController::class, 'signin']);

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');