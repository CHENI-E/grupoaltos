<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
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
use Illuminate\Support\Facades\Artisan;

Route::get('/clear-all', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');

    return '✅ Cachés limpiadas y optimización reiniciada';
});
Route::post('/emailempleabilidad', [App\Http\Controllers\Ecommerce\InicioController::class, 'emailPostula'])->name('ecommerce.emailempleabilidad')->middleware('throttle:5,1');
Route::post('/emailcontactanos', [App\Http\Controllers\Ecommerce\ContactanosController::class, 'emailContactanos'])->name('ecommerce.emailcontactanos')->middleware('throttle:5,1');

Route::get('/', [App\Http\Controllers\Ecommerce\InicioController::class, 'index'])->name('ecommerce.inicio');
Route::get('/nosotros', [App\Http\Controllers\Ecommerce\NosotrosController::class, 'index'])->name('ecommerce.nosotros');
Route::get('/contactanos', [App\Http\Controllers\Ecommerce\ContactanosController::class, 'index'])->name('ecommerce.contactanos');
Route::get('/productos', [App\Http\Controllers\Ecommerce\ProductosController::class, 'index'])->name('ecommerce.productos');

Route::get('/productos/lista', [App\Http\Controllers\Ecommerce\ProductosController::class, 'getProductosAjax']);
Route::get('/producto/{slug}', [App\Http\Controllers\Ecommerce\ProductosController::class, 'detalle'])->name('producto.detalle');

Route::get('/servicio', [App\Http\Controllers\Ecommerce\ServicioController::class, 'index'])->name('ecommerce.servicio');
Route::get('/servicio/{slug}', [App\Http\Controllers\Ecommerce\ServicioController::class, 'viewdetalle'])->name('ecommerce.servicio.viewdetalle');

Route::get('/proyectos', [App\Http\Controllers\Ecommerce\ProyectosController::class, 'index'])->name('ecommerce.proyectos');
Route::get('/proyectos/{slug}', [App\Http\Controllers\Ecommerce\ProyectosController::class, 'viewdetalle'])->name('ecommerce.proyectos.viewdetalle');

Route::get('/blog', [App\Http\Controllers\Ecommerce\BlogController::class, 'index'])->name('ecommerce.blog');
Route::get('/blog/{slug}', [App\Http\Controllers\Ecommerce\BlogController::class, 'detalle'])->name('ecommerce.blog.detalle');


Route::middleware('guest')->group(function () {
    Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'index'])->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('login.post');
});


Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::post('/logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('logout');
    /* Route::get('/usuario', [App\Http\Controllers\Admin\UsuarioController::class, 'index'])->name('admin.usuario.index'); */
    Route::resource('/usuario', App\Http\Controllers\Admin\UsuarioController::class);
    Route::get('/usuario/findUser/{id}', [App\Http\Controllers\Admin\UsuarioController::class, 'findUser'])->name('usuario.findUser');

    Route::resource('/bannerinicio', App\Http\Controllers\Admin\BannerInicioController::class)->except(['show']);
    Route::get('/bannerinicio/getdata', [App\Http\Controllers\Admin\BannerInicioController::class, 'getData']);
    Route::delete('/bannerinicio/delete/{id}', [App\Http\Controllers\Admin\BannerInicioController::class, 'delete']);
    Route::get('/seccion_inicio', [App\Http\Controllers\Admin\SeccionController::class, 'inicio'])->name('seccion.inicio');
    Route::post('/seccion_inicio/store', [App\Http\Controllers\Admin\SeccionController::class, 'storeIdentities'])->name('seccion.identities.store');
    Route::post('/seccion_inicio/store_about_me', [App\Http\Controllers\Admin\SeccionController::class, 'storeAboutMe'])->name('seccion.about_me.store');
    Route::post('/seccion_inicio/store_clientes', [App\Http\Controllers\Admin\SeccionController::class, 'storeClientes'])->name('seccion.clientes.store');

    Route::prefix('categoria')->name('categoria.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\CategoriaController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\CategoriaController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\CategoriaController::class, 'store'])->name('store');
        Route::get('/listCategory', [App\Http\Controllers\Admin\CategoriaController::class, 'listCategory'])->name('listCategory');
        Route::get('/mostrar_registro', [App\Http\Controllers\Admin\CategoriaController::class, 'mostrar_registro'])->name('mostrar_registro');
        Route::post('/update', [App\Http\Controllers\Admin\CategoriaController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [App\Http\Controllers\Admin\CategoriaController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('item')->name('item.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\ItemController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\ItemController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\ItemController::class, 'store'])->name('store');
        Route::get('/listItems', [App\Http\Controllers\Admin\ItemController::class, 'listItems'])->name('listItems');
        Route::get('/mostrar_registro_item', [App\Http\Controllers\Admin\ItemController::class, 'mostrar_registro_item'])->name('mostrar_registro_item');
        Route::post('/update', [App\Http\Controllers\Admin\ItemController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [App\Http\Controllers\Admin\ItemController::class, 'destroy'])->name('destroy');
        /* Route::post('/store', [App\Http\Controllers\Admin\ItemController::class, 'store'])->name('store');
        Route::get('/listItem', [App\Http\Controllers\Admin\ItemController::class, 'listItem'])->name('listItem');
        Route::get('/mostrar_registro', [App\Http\Controllers\Admin\ItemController::class, 'mostrar_registro'])->name('mostrar_registro');
        Route::post('/update', [App\Http\Controllers\Admin\ItemController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [App\Http\Controllers\Admin\ItemController::class, 'destroy'])->name('destroy'); */
    });

    Route::prefix('servicio')->name('servicio.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\ServicioController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\ServicioController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\ServicioController::class, 'store'])->name('store');
        Route::get('/listService', [App\Http\Controllers\Admin\ServicioController::class, 'listService'])->name('listService');
        Route::get('/mostrar_registro', [App\Http\Controllers\Admin\ServicioController::class, 'mostrar_registro'])->name('mostrar_registro');
        Route::post('/update', [App\Http\Controllers\Admin\ServicioController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [App\Http\Controllers\Admin\ServicioController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('proyecto')->name('proyecto.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\ProjectController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\ProjectController::class, 'store'])->name('store');
        Route::get('/listProyectos', [App\Http\Controllers\Admin\ProjectController::class, 'listProyectos'])->name('listProyectos');
        Route::get('/mostrar_proyecto', [App\Http\Controllers\Admin\ProjectController::class, 'mostrar_proyecto'])->name('mostrar_proyecto');
        Route::post('/update', [App\Http\Controllers\Admin\ProjectController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('blog')->name('blog.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\BlogController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\BlogController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\BlogController::class, 'store'])->name('store');
        Route::get('/listBlog', [App\Http\Controllers\Admin\BlogController::class, 'listBlog'])->name('listBlog');
        Route::delete('/delete/{id}', [App\Http\Controllers\Admin\BlogController::class, 'destroy'])->name('destroy');
        /* Route::get('/listService', [App\Http\Controllers\Admin\BlogController::class, 'listService'])->name('listService');
        Route::get('/mostrar_registro', [App\Http\Controllers\Admin\BlogController::class, 'mostrar_registro'])->name('mostrar_registro');
        Route::post('/update', [App\Http\Controllers\Admin\BlogController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [App\Http\Controllers\Admin\BlogController::class, 'destroy'])->name('destroy'); */
    });

    Route::prefix('informationExtra')->name('informationExtra.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\InformationExtraController::class, 'index'])->name('index');
        Route::post('/store', [App\Http\Controllers\Admin\InformationExtraController::class, 'storeInicioMapa'])->name('storeInicioMapa');
    });

    Route::prefix('valores')->name('valores.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\ValoresController::class, 'index'])->name('index');
        Route::post('/store', [App\Http\Controllers\Admin\ValoresController::class, 'storeValores'])->name('store');
    });




});

