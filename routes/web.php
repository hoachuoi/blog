<?php

use App\Http\Controllers\BlogController;
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

//Route::get('/', function () {
//    return view('listblog');
//});
Route::get('/', [BlogController::class, 'index']);
Route::get('/blogs/create', [BlogController::class, 'create']);
Route::get('/blogs/trash', [BlogController::class, 'trash']);
Route::get('/blogs/{id}', [BlogController::class, 'show']);
Route::get('/blogs/{id}/edit', [BlogController::class, 'edit']);
Route::put('/blogs/{id}', [BlogController::class, 'update']);
Route::post('/blogs', [BlogController::class, 'store']);
Route::post('/blogs/search', [BlogController::class, 'search']);

Route::delete('/blogs/{id}', [BlogController::class, 'destroyflag']);
Route::post('/blogs/{id}/restore', [BlogController::class, 'restore'])->name('blogs.restore');
Route::delete('/blogs/{id}/force-delete', [BlogController::class, 'forceDelete'])->name('blogs.forceDelete');
