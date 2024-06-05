<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Route for  login view
Route::get('/login', function () {
    return view('login');
})->name('login');

 // Routes for login role-based
Route::get('/adminLogin', function () {
    return view('AdminLogin');
})->name('adminLogin');

Route::get('/editorLogin', function () {
    return view('EditorLogin');
})->name('editorLogin');

Route::get('/viewerLogin', function () {
    return view('ViewerLogin');
})->name('viewerLogin');

  // Routes for login role-based redirection
  Route::post('/admin', [LoginController::class, 'admin'])->name('admin');
  Route::post('/editor', [LoginController::class, 'editor'])->name('editor');
  Route::post('/viewer', [LoginController::class, 'viewer'])->name('viewer');

// Group routes that require authentication
Route::middleware(['auth', 'prevent-back-history'])->group(function () {
    Route::get('/', function () {
        return redirect('/dashboard');
    });
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [UserController::class, 'show'])->name('dashboard');
    Route::get('/createPage', [UserController::class, 'createPage'])->name('createPage');
    Route::post('/create', [UserController::class, 'create'])->name('create');
    Route::get('/editPage/{id}', [UserController::class, 'editPage'])->name('editPage');
    Route::post('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');

});
