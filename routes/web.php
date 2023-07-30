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
    Route::get('/admin/kartukeluarga', [AdminController::class, 'indexKartuKeluarga'])->name('kartukeluarga.index');
    Route::get('/getexportdatakk', [AdminController::class, 'exportdatakk'])->name('kartukeluarga.export');
    Route::get('/admin/editdatakk/{id}', [AdminController::class, 'editdatakk'])->name('kartukeluarga.edit');
    Route::post('/admin/storedatakk', [AdminController::class, 'storedatakk'])->name('kartukeluarga.store');
    Route::put('/admin/updatedatakk', [AdminController::class, 'updatedatakk'])->name('kartukeluarga.update');
    Route::delete('/admin/destroydatakk/{id}', [AdminController::class, 'deletedatakk'])->name('kartukeluarga.destroy');

    //datapenduduk
    Route::get('/admin/datapenduduk', [AdminController::class, 'indexdatapenduduk'])->name('datapenduduk.index');
    Route::get('/admin/createdatapenduduk', [AdminController::class, 'createdatapenduduk'])->name('datapenduduk.create');
    Route::get('/admin/editdatapenduduk/{id}', [AdminController::class, 'editdatapenduduk'])->name('datapenduduk.edit');
    Route::post('/admin/storedatapenduduk', [AdminController::class, 'storedatapenduduk'])->name('datapenduduk.store');
    Route::put('/admin/updatedatapenduduk', [AdminController::class, 'updatedatapenduduk'])->name('datapenduduk.update');
    Route::delete('/admin/destroydatapenduduk/{id}', [AdminController::class, 'deletedatapenduduk'])->name('datapenduduk.destroy');
    Route::get('/getexportdatakk', [AdminController::class, 'exportdatapenduduk'])->name('datapenduduk.export');

    //resource ajax
    Route::get('getregency/{id}', [AdminController::class, 'getregency']);
    Route::get('getdistrict/{id}', [AdminController::class, 'getdistrict']);
    Route::get('getvillage/{id}', [AdminController::class, 'getvillage']);
});
