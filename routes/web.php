<?php

use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');


//Route::get('/admin', [HomeController::class, 'index'])->name('admin.home');
//Route::resource('/admin/files', FileController::class)->names('admin.files');
//Los dos anteriores los agrupo y les agrego el 'prefix'. Verifico autenticacion
Route::group(['prefix' => 'admin', 'middleware' => 'auth'],  function() {
	Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');
	Route::resource('/files', FileController::class)->names('admin.files');
});



// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
