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
Route::get('/profil/editprofil/{id}', [ProfilController::class, 'showEditProfil'])->name('profil.update');


// rute edit produk
Route::get('/jual/edit/{id}', [JualController::class, 'edit'])->name('jual.edit');
Route::post('/jual/update/{id}', [JualController::class, 'update'])->name('jual.update');