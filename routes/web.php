<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JualController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DetailProdukController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SimpanController;

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
//route

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('store');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//route halaman home
Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('/kategori/{slug}', [KategoriController::class, 'show'])->name('kategori.show');
Route::get('/home/lihatsemua', [KategoriController::class, 'showAllKategori'])->name('kategoriAll.show');


Route::get('/', function () {
    return view("home");
});


//route jual

Route::get('/jual', [JualController::class, 'create']);
Route::post('/jual', [JualController::class, 'store'])->name('jual');


// Rute untuk konfirmasi produk
Route::post('/admin/confirm-product/{productId}', [AdminController::class, 'confirmProduct'])->name('admin.confirm.product');
Route::post('/admin/reject-product/{productId}', [AdminController::class, 'rejectProduct'])->name('admin.reject.product');
Route::post('/admin/cancel-product/{productId}', [AdminController::class, 'cancelConfirm'])->name('admin.cancel.product');
Route::post('/admin/report-product/{productId}', [AdminController::class, 'reportProduct'])->name('admin.report.product');

// Rute untuk menampilkan produk yang telah dikonfirmasi di halaman home
Route::get('/home', [HomeController::class, 'showConfirmedProducts'])->name('home.show.confirmed.products');

// Rute untuk menampilkan halaman detail produk
Route::get('/produk/{id}/{nama}', [DetailProdukController::class, 'show'])->name('produk.show');

// Rute untuk tombol search
Route::get('/home', [SearchController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'search'])->name('produk.search');


// rute profil
Route::get('/profil', [ProfilController::class, 'showProfil'])->name('profil');
Route::get('/profil/{id}', [ProfilController::class, 'showUserProfil'])->name('profil.user');
// Display the form to edit the user profile
Route::get('/profil/{id}/edit', [ProfilController::class, 'edit'])->name('profil.edit');

// Handle the form submission to update the user profile
Route::post('/profil/{id}/update', [ProfilController::class, 'update'])->name('profil.update');


// rute edit produk
Route::get('/jual/edit/{id}', [JualController::class, 'edit'])->name('jual.edit');
Route::post('/jual/update/{id}', [JualController::class, 'update'])->name('jual.update');
Route::delete('/jual/hapus/{id}', [JualController::class, 'destroy'])->name('jual.destroy');


// rute simpan produk
Route::post('/produk/{id}/simpan', [SimpanController::class, 'create'])->name('simpan.create');
Route::get('/tersimpan', [SimpanController::class, 'show'])->name('simpan.show');
Route::delete('/tersimpan/hapus/{id}', [SimpanController::class, 'destroy'])->name('simpan.destroy');
