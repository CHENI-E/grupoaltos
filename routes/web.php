<?php

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

Route::get('/', [App\Http\Controllers\Ecommerce\InicioController::class, 'index'])->name('ecommerce.inicio');
Route::get('/nosotros', [App\Http\Controllers\Ecommerce\NosotrosController::class, 'index'])->name('ecommerce.nosotros');
Route::get('/contactanos', [App\Http\Controllers\Ecommerce\ContactanosController::class, 'index'])->name('ecommerce.contactanos');
Route::get('/servicio', [App\Http\Controllers\Ecommerce\ServicioController::class, 'index'])->name('ecommerce.servicio');
Route::get('/blog', [App\Http\Controllers\Ecommerce\BlogController::class, 'index'])->name('ecommerce.blog');

Route::middleware('guest')->group(function () {
    Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'index'])->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('login.post');
});


Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::post('/logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('logout');
    /* Route::get('/usuario', [App\Http\Controllers\Admin\UsuarioController::class, 'index'])->name('admin.usuario.index'); */
    Route::resource('/usuario', App\Http\Controllers\Admin\UsuarioController::class);
    Route::resource('/bannerinicio', App\Http\Controllers\Admin\BannerInicioController::class)->except(['show']);
    Route::get('/bannerinicio/getdata', [App\Http\Controllers\Admin\BannerInicioController::class, 'getData']);
    Route::delete('/bannerinicio/delete/{id}', [App\Http\Controllers\Admin\BannerInicioController::class, 'delete']);
    Route::get('/seccion_inicio', [App\Http\Controllers\Admin\SeccionController::class, 'inicio'])->name('seccion.inicio');
    Route::post('/seccion_inicio/store', [App\Http\Controllers\Admin\SeccionController::class, 'storeIdentities'])->name('seccion.identities.store');
    Route::post('/seccion_inicio/store_about_me', [App\Http\Controllers\Admin\SeccionController::class, 'storeAboutMe'])->name('seccion.about_me.store');
});
