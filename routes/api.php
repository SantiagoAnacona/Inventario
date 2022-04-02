<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\PresentacionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VentaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ArticuloController;
//use App\Http\Controllers\RegisterController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [UsersController::class,'register']);
//verificar logeo
//Route::post('login', [::class,'login']);

Route::group( ['middleware' => ["auth:sanctum"]], function(){
    //rutas
    Route::get('userprofile', [UserController::class, 'userProfile']);
   // Route::get('logout', [UserController::class, 'logout']);
});

Route::get('/productos',[ProductoController::class,'index']);
Route::post('/productos', [ProductoController::class,'store']);
Route::put('/productos/{id}', [ProductoController::class,'update']);
Route::delete('/productos/{id}', [ProductoController::class,'destroy']);

//Route::resource('productos', [ProductoController::class]);

Route::post('/proveedor', [ProveedorController::class, 'registerProveedor']);
Route::get('/proveedor', [ProveedorController::class, 'index']);
Route::put('/proveedor', [ProveedorController::class, 'update']);
Route::delete('/proveedor', [ProveedorController::class, 'destroy']);


Route::post('/cliente',[ClienteController::class,'registerCliente']);
Route::get('/cliente',[ClienteController::class,'index']);
Route::put('/cliente',[ClienteController::class,'update']);
Route::delete('/cliente',[ClienteController::class,'destroy']);


Route::post('/marca',[MarcaController::class,'registerMarca']);
Route::get('/marca',[MarcaController::class,'index']);
Route::put('/marca',[MarcaController::class,'update']);
Route::delete('/marca',[MarcaController::class,'destroy']);


Route::post('/compra',[CompraController::class,'registerCompra']);
Route::get('/compra',[CompraController::class,'index']);
Route::put('/compra',[CompraController::class,'update']);
Route::delete('/compra',[CompraController::class,'destroy']);

Route::post('/venta',[VentaController::class,'registerVenta']);
Route::get('/venta',[VentaController::class,'index']);
Route::put('/venta',[VentaController::class,'update']);
Route::delete('/venta',[VentaController::class,'destroy']);


Route::post('/pesentacion', [PresentacionController::class, 'registerPresentacion']);
Route::get('/pesentacion', [PresentacionController::class, 'index']);
Route::put('/pesentacion', [PresentacionController::class, 'update']);
Route::delete('/pesentacion', [PresentacionController::class, 'destroy']);
