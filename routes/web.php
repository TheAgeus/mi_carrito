<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;


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


// Rutas para registrarse (any)
Route::get('/registro', [AuthController::class, 'register'])->name('register');
Route::post('/registro' , [AuthController::class, 'registerPost'])->name('register');

// Rutas para el inicio de sesión (any)
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'user-role:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'userHome'])->name('home');
});

Route::middleware(['auth', 'user-role:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('home.admin');
});

Route::middleware(['auth', 'user-role:inventarios'])->group(function () {
    Route::get('/inventarios/home', [HomeController::class, 'inventariosHome'])->name('home.inventarios');
});

Route::middleware(['auth', 'user-role:inventarios,admin'])->group(function () {
    Route::resource('categoria', CategoriaController::class);
    Route::resource('productos', ProductoController::class);
});


