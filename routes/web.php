<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


Route::prefix('list')->group(function () {
    Route::name('patients')->group(function () {
        Route::get('patients', [PatientController::class, 'index']);
        Route::get('patients/{patient?}', [PatientController::class, 'show'])->name('.detail');
        Route::get('patients/edit/{patient}', [PatientController::class, 'edit'])->name('.edit');
    });

    Route::name('doctors')->group(function () {
        Route::get('doctors', [DoctorController::class, 'index']);
        Route::get('doctors/{doctor?}', [DoctorController::class, 'show'])->name('.detail');
    });

    Route::name('insurances')->group(function () {
        Route::get('insurances', [InsuranceController::class, 'index']);
        Route::get('insurances/{insurance?}', [InsuranceController::class, 'show'])->name('.detail');
    });
});


// All other url's fall into
Route::get('/{any?}', function () {
    return view('defaults.pagemodel');
})->where('any', '.*');
