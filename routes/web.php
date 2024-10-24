<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertController;
use App\Http\Controllers\PassportController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/somethingwrong', function () {
    return view('somethingwrong');
})->middleware(['auth', 'verified'])->name('somethingwrong');

Route::get('/multi', function () {
    return view('multi');
})->middleware(['auth', 'verified'])->name('multi');

Route::get('/done', function () {
    return view('done');
})->middleware(['auth', 'verified'])->name('done');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';

Route::resource('certs', CertController::class);
Route::resource('passports', PassportController::class);


Route::middleware('auth')->group(function () {
    Route::get('/certsrm/{cert}/remove_issue_flag', [CertController::class, 'remove_issue_flag'])->name('certs.remove_issue_flag');
    
});


