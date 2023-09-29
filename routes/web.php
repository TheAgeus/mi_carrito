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


 Route::get('/', [App\Http\Controllers\nonAuthHomeController::class, 'index'])->name('index');

 Route::get('/producto/{id}', [App\Http\Controllers\ProductoController::class, 'showProducto'])->name('showProducto');


// Email verification
Auth::routes([

    'verify' => true

]);


// Rutas para el inicio de sesión (any)
Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'loginPost'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');




Route::middleware(['auth', 'user-role:inventarios,admin' , 'verified'])->group(function () {

    Route::resource('categoria', CategoriaController::class);

    Route::resource('productos', ProductoController::class);

    
    // Compras realizadas
    Route::get('AllCompras', [App\Http\Controllers\CarritoController::class, 'AllCompras'])->name('AllCompras');
});




Auth::routes();

// CARRITO

Route::middleware('auth')->group(function () {

    Route::get('/micarrito', [App\Http\Controllers\CarritoController::class, 'index'])->name('micarrito');
    
    // No tendré nada aquí, solo redireccionar
    Route::get('/micarrito/{id}', [App\Http\Controllers\CarritoController::class, 'item'])->name('showCarritoItem'); 
    
    Route::delete('/micarrito/{id}', [App\Http\Controllers\CarritoController::class, 'delete'])->name('deleteCarritoItem');
    Route::delete('deleteAll/micarrito', [App\Http\Controllers\CarritoController::class, 'deleteAll'])->name('deleteAllCarritoItem');
    
    // Mis compras
    Route::get('MisCompras', [App\Http\Controllers\CarritoController::class, 'MisCompras'])->name('MisCompras');
    
    
    // Stripe
    Route::get('Stripe', [App\Http\Controllers\StripeController::class, 'index'])->name('StripeIndex');
    
    Route::post('Stripe', [App\Http\Controllers\StripeController::class, 'stripePost'])->name('stripe.post');

});    


