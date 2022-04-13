<?php

use App\Http\Controllers\ProductController;
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


//Route::domain('admin.'.env('APP_DOMAIN'))
//    ->middleware(['web', 'auth', 'admin',])
//    ->group(base_path('routes/admin.php'));


Route::prefix('/admin')
//    ->middleware(['web',])
        ->middleware(['web', 'auth', 'admin',])
    ->group(base_path('routes/admin.php'));


Route::get('/', function () {
    return view('welcome');
});


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
