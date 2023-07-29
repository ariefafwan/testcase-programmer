<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});


require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    //datakk
    Route::get('/admin/datakk', [AdminController::class, 'datakk'])->name('kartukeluarga.data');
    Route::get('/admin/kartukeluarga', [AdminController::class, 'indexKartuKeluarga'])->name('kartukeluarga.index');
    Route::get('/getexportdatakk', [AdminController::class, 'exportdatakk'])->name('kartukeluarga.export');
    Route::get('/admin/editdatakk/{id}', [AdminController::class, 'editdatakk'])->name('kartukeluarga.edit');
    Route::post('/admin/storedatakk', [AdminController::class, 'storedatakk'])->name('kartukeluarga.store');
    Route::put('/admin/updatedatakk', [AdminController::class, 'updatedatakk'])->name('kartukeluarga.update');
    Route::delete('/admin/destroydatakk/{id}', [AdminController::class, 'deletedatakk'])->name('kartukeluarga.destroy');

    //resource ajax
    Route::get('getregency/{id}', [AdminController::class, 'getregency']);
    Route::get('getdistrict/{id}', [AdminController::class, 'getdistrict']);
    Route::get('getvillage/{id}', [AdminController::class, 'getvillage']);
});
