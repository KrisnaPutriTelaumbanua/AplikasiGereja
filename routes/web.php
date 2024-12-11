<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelayanController;
use App\Http\Controllers\IbadahController;
use App\Http\Controllers\PelayanIbadahController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\SubdepartemenController;


Route::get('/', function () {
    return view('welcome');
});

//Auth::routes(['verify'=>true]);
Route::get('/login', [AuthController::class, 'index'])->name('login');

//Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/verify', [AuthController::class, 'verify']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerProceed']);
Route::get('/register/activation/{token}', [AuthController::class, 'registerVerify']);

Route::get('mail/test', function () {
    \Illuminate\Support\Facades\Mail::to('jokowi@gmail.com')
        ->queue(new \App\Mail\TestMail());
});

Route::get('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/admin/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'list'])->name('kategori.list');
    Route::get('/add', [KategoriController::class, 'add']);
    Route::get('/edit/{id}', [KategoriController::class, 'edit']);
    Route::post('/update/{id}', [KategoriController::class, 'update']);
    Route::post('/insert', [KategoriController::class, 'insert']);
    Route::post('/delete', [KategoriController::class, 'delete']);
});

Route::group(['prefix' => 'pelayan'], function () {
    Route::get('/', [PelayanController::class, 'list'])->name('pelayan.list');
    Route::get('/add', [PelayanController::class, 'add'])->name('add');
    Route::post('/insert', [PelayanController::class, 'insert'])->name('insert');
    Route::get('/edit/{pelayan}', [PelayanController::class, 'edit'])->name('pelayan.edit');
    Route::post('/update/{pelayan}', [PelayanController::class, 'update'])->name('pelayan.update');
    Route::post('/delete', [PelayanController::class, 'delete'])->name('pelayan.delete');
});

Route::group(['prefix' => 'ibadah'], function () {
    Route::get('/', [IbadahController::class, 'list'])->name('ibadah.list');
    Route::get('/add', [IbadahController::class, 'add'])->name('ibadah.add');
    Route::post('/insert', [IbadahController::class, 'insert'])->name('ibadah.insert');
    Route::get('/edit/{ibadah}', [IbadahController::class, 'edit'])->name('ibadah.edit');
    Route::post('/update/{ibadah}', [IbadahController::class, 'update'])->name('ibadah.update');
    Route::post('/delete', [IbadahController::class, 'delete'])->name('ibadah.delete');
});


Route::group(['prefix' => 'pelayanIbadah'], function () {
    Route::get('/', [PelayanIbadahController::class, 'list'])->name('pelayanIbadah.list');
    Route::get('/add', [PelayanIbadahController::class, 'add'])->name('pelayanIbadah.add');
    Route::post('/insert', [PelayanIbadahController::class, 'insert'])->name('pelayanIbadah.insert');
    Route::get('/edit/{pelayanIbadah}', [PelayanIbadahController::class, 'edit'])->name('pelayanIbadah.edit');
    Route::post('/update/{pelayanIbadah}', [PelayanIbadahController::class, 'update'])->name('pelayanIbadah.update');
    Route::post('/delete', [PelayanIbadahController::class, 'delete'])->name('pelayanIbadah.delete');
});



Route::group(['prefix' => 'departemen'], function () {
    Route::get('/', [DepartemenController::class, 'list'])->name('departemen.list');
    Route::get('/add', [DepartemenController::class, 'add'])->name('departemen.add');
    Route::post('/insert', [DepartemenController::class, 'insert'])->name('departemen.insert');
    Route::get('/edit/{departemen}', [DepartemenController::class, 'edit'])->name('departemen.edit');
    Route::post('/update/{departemen}', [DepartemenController::class, 'update'])->name('departemen.update');
    Route::post('/delete', [DepartemenController::class, 'delete'])->name('departemen.delete');
});


Route::group(['prefix' => 'subdepartemen'], function () {
    Route::get('/', [SubdepartemenController::class, 'list'])->name('subdepartemen.list');
    Route::get('/add', [SubdepartemenController::class, 'add'])->name('subdepartemen.add');
    Route::post('/insert', [SubdepartemenController::class, 'insert'])->name('subdepartemen.insert');
    Route::get('/edit/{subdepartemen}', [SubdepartemenController::class, 'edit'])->name('subdepartemen.edit');
    Route::put('/update/{subdepartemen}', [SubdepartemenController::class, 'update'])->name('subdepartemen.update');
    Route::post('/delete', [SubdepartemenController::class, 'delete'])->name('subdepartemen.delete');
});




