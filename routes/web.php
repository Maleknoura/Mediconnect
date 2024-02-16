<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\specialiteController;
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
})->name('home');

Route::get('/dash', function () {
    return view('dash');
})->name('doctor');
Route::get('/appointement', function () {
    return view('appointement');
})->name('appointment');


Route::get('/dash', [specialiteController::class, 'show']);
Route::get('/dash{id}', [specialiteController::class, 'destroy'])->name('speciality.destroy');
Route::post('/dash/create', [specialiteController::class, 'create'])->name('speciality.create');
Route::post('/dash', [specialiteController::class, 'store'])->name('speciality.store');
Route::get('/dash/doctors', [ProfileController::class, 'showDoctors']);





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
