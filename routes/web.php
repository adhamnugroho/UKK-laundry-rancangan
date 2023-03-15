<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('dashboardAdmin');
});

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('postLogin');
    Route::get('/registrasi', [AuthController::class, 'registration'])->name('registrasi');
    Route::post('/registrasiStore', [AuthController::class, 'registrationStore'])->name('registrasiStore');
});

Route::middleware('auth')->group(function () {

    Route::middleware('is_admin')->group(function () {

        Route::prefix('admin')->group(function () {

            Route::get('/dashboard', [DashboardController::class, 'main'])->name('dashboardAdmin');

            Route::prefix('member')->group(function () {

                Route::get('/', [MemberController::class, 'main'])->name('member');
                Route::get('/create', [MemberController::class, 'create'])->name('memberCreate');
                Route::post('/store', [MemberController::class, 'store'])->name('memberStore');
                Route::get('/show/{id}', [MemberController::class, 'show'])->name('memberShow');
                Route::get('/edit/{id}', [MemberController::class, 'edit'])->name('memberEdit');
                Route::post('/update', [MemberController::class, 'update'])->name('memberUpdate');
                Route::get('/delete/{id}', [MemberController::class, 'destroy'])->name('memberDelete');
            });

            Route::prefix('user')->group(function () {

                Route::get('/', [UsersController::class, 'main'])->name('user');
                Route::get('/create', [UsersController::class, 'create'])->name('userCreate');
                Route::post('/store', [UsersController::class, 'store'])->name('userStore');
                Route::get('/show/{id}', [UsersController::class, 'show'])->name('userShow');
                Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('userEdit');
                Route::post('/update', [UsersController::class, 'update'])->name('userUpdate');
                Route::get('/delete/{id}', [UsersController::class, 'destroy'])->name('userDelete');
            });

            Route::prefix('outlet')->group(function () {

                Route::get('/', [OutletController::class, 'main'])->name('outlet');
                Route::get('/create', [OutletController::class, 'create'])->name('outletCreate');
                Route::post('/store', [OutletController::class, 'store'])->name('outletStore');
                Route::get('/show/{id}', [OutletController::class, 'show'])->name('outletShow');
                Route::get('/edit/{id}', [OutletController::class, 'edit'])->name('outletEdit');
                Route::post('/update', [OutletController::class, 'update'])->name('outletUpdate');
                Route::get('/delete/{id}', [OutletController::class, 'destroy'])->name('outletDelete');
            });

            Route::prefix('paket')->group(function () {

                Route::get('/', [PaketController::class, 'main'])->name('paket');
                Route::get('/create', [PaketController::class, 'create'])->name('paketCreate');
                Route::post('/store', [PaketController::class, 'store'])->name('paketStore');
                Route::get('/show/{id}', [PaketController::class, 'show'])->name('paketShow');
                Route::get('/edit/{id}', [PaketController::class, 'edit'])->name('paketEdit');
                Route::post('/update', [PaketController::class, 'update'])->name('paketUpdate');
                Route::get('/delete/{id}', [PaketController::class, 'destroy'])->name('paketDelete');
            });


            Route::prefix('transaksi')->group(function () {

                Route::get('/', [TransaksiController::class, 'main'])->name('transaksi');
                Route::get('/create', [TransaksiController::class, 'create'])->name('transaksiCreate');
                Route::post('/store', [TransaksiController::class, 'store'])->name('transaksiStore');
                Route::get('/show/{id}', [TransaksiController::class, 'show'])->name('transaksiShow');
                Route::get('/preBayar/{id}', [TransaksiController::class, 'preBayar'])->name('transaksiPreBayar');
                Route::post('/postBayar', [TransaksiController::class, 'postBayar'])->name('transaksiPostBayar');
                Route::get('/proses/{id}', [TransaksiController::class, 'prosesTransaksi'])->name('transaksiProses');
                Route::get('/selesai/{id}', [TransaksiController::class, 'selesaiTransaksi'])->name('transaksiSelesai');
            });
        });
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
