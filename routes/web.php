<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LendingController;




// Route::get('/', function () {
//     return view('dashboard.index');
// });

Route::middleware('isGuest')->group(function () {
    Route::get('/', [LendingController::class, 'login'])->name('login');
    Route::get('/register', [LendingController::class, 'register'])->name('register');
    Route::post('/register', [LendingController::class, 'inputRegister'])->name('register.post'); 
    Route::post('/login', [LendingController::class, 'auth'])->name('login.auth');
});


Route::get('/logout', [LendingController::class, 'logout'])->name('logout');


Route::middleware('isLogin')->prefix('/lending')->name('lending.')->group(function () {
    Route::get('/home', [LendingController::class, 'home'])->name('home');
    Route::get('/data', [LendingController::class, 'data'])->name('data');
    Route::get('/create', [LendingController::class, 'create'])->name('create');
    Route::patch('/update/{id}', [LendingController::class, 'update'])->name('update');
    Route::post('/store', [LendingController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [LendingController::class, 'edit'])->name('edit'); //untuk mengedit-> {id} untuk mengedit id yang dipilih
    Route::delete('/delete/{id}', [LendingController::class, 'destroy'])->name('delete'); //route untuk btn delete todo index 
    Route::patch('/complated/{id}', [LendingController::class, 'updateComplated'])->name('update-complated');  
});


