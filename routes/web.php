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


 Route::get('/', [HomeController::class, 'index'])->name('index');




// Email verification
Auth::routes([

    'verify' => true

]);


// Rutas para el inicio de sesión (any)
Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'loginPost'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');




Route::middleware(['auth', 'user-role:user', 'verified'])->group(function () {

    Route::get('/home', [HomeController::class, 'userHome'])->name('home');
});


Route::middleware(['auth', 'user-role:inventarios,admin' , 'verified'])->group(function () {

    Route::resource('categoria', CategoriaController::class);

    Route::resource('productos', ProductoController::class);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/micarrito', [App\Http\Controllers\CarritoController::class, 'index'])->name('micarrito');

// No tendré nada aquí, solo redireccionar
Route::get('/micarrito/{id}', [App\Http\Controllers\CarritoController::class, 'item'])->name('showCarritoItem'); 

Route::delete('/micarrito/{id}', [App\Http\Controllers\CarritoController::class, 'delete'])->name('deleteCarritoItem');