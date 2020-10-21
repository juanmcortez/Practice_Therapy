<?php

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

Route::get('/', function () {
    return view('pages.index', ['title' => 'Welcome']);
});


Route::get('list/patients', [PatientController::class, 'index'])->name('patients');
Route::get('list/patients/{patient?}', [PatientController::class, 'show'])->name('patients.detail');

Route::get('list/doctors', [DoctorController::class, 'index']);
Route::get('list/doctors/{doctor?}', [DoctorController::class, 'show'])->name('doctors.detail');

Route::get('list/insurances', [InsuranceController::class, 'index']);
Route::get('list/insurances/{insurance?}', [InsuranceController::class, 'show'])->name('insurances.detail');


// All other url's fall into
Route::get('/{any?}', function () {
    return view('defaults.pagemodel');
})->where('any', '.*');
