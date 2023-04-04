<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UlpController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['role:super-admin'])->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('area', AreaController::class);
    Route::resource('users', UserController::class);
});

Route::middleware(['role:admin'])->group(function () {
    Route::resource('ulps', UlpController::class);
    Route::resource('pegawai', PegawaiController::class);
    Route::get('pegawai/filter', [PegawaiController::class, 'filter'])->name('pegawai.filter');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
