
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
 Route::get('/home', [App\Http\Controllers\nonAuthHomeController::class, 'index'])->name('index');

 Route::get('/producto/{id}', [App\Http\Controllers\ProductoController::class, 'showProducto'])->name('showProducto');
 Route::get('/categoria/{id}', [App\Http\Controllers\CategoriaController::class, 'showCategoria'])->name('showCategoria');
 Route::get('/categorias/', [App\Http\Controllers\CategoriaController::class, 'showCategorias'])->name('showCategorias');


// Email verification
Auth::routes([
    'verify' => true
]);

Route::get('/emailSend', [App\Http\Controllers\AuthController::class, 'emailSend'])->name('emailSend')->middleware('auth');

// Rutas para el inicio de sesión (any)
//Route::get('/login', [AuthController::class, 'login'])->name('login');

//Route::post('/login', [AuthController::class, 'loginPost'])->name('login');

//Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');




Route::middleware(['auth', 'user-role:inventarios,admin' , 'verified'])->group(function () {

    Route::get('adminpanel', [App\Http\Controllers\HomeController::class, 'Admin_Panel'])->name('admin.panel');

    Route::resource('categoria', CategoriaController::class);

    Route::resource('productos', ProductoController::class);

    
    // Compras realizadas
    Route::get('AllCompras', [App\Http\Controllers\CarritoController::class, 'AllCompras'])->name('AllCompras');
});




//Auth::routes();

// CARRITO

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/paypal/pay', [App\Http\Controllers\PaymentController::class, 'payWithPaypal']);
    Route::get('/paypal/status', [App\Http\Controllers\PaymentController::class, 'payPalStatus']);

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


Route::middleware(['auth', 'verified'])->group(function() {
    Route::post('agregar_comentario', [App\Http\Controllers\ComentarioController::class, 'store'])->name('agregar_comentario');
});


Route::get('/test_route', [App\Http\Controllers\StripeController::class, 'test_stripe'])->name('stripe.test');

