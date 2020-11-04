<?php

use App\Http\Controllers\Admin\UsersController;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\UserTestController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('users',UsersController::class);
});

Route::resource('test',UserTestController::class);
Route::get('/testEdit/{id}', [UserTestController::class,'getUserById']);
Route::put('/testUpdate', [UserTestController::class,'updateUser'])->name('update.user');
Route::post('test/{test}/delete', [UserTestController::class,'destroy'])->name('destroyUserTest');
Route::post('/progress', [UserTestController::class,'uploadFile'])->name('upload.file');

