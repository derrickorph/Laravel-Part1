<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('users/{name?}', function ($name = null) {
    return 'Hi' .$name;

});
Route::get('/products/{id?}', function ($id = null) {
    return 'Products ID is ' .$id;
});
//On va effacer les regrex et les créer dans RouteServiceProvider
Route::match(['get', 'post'], '/students', function (Request $request) {
    return 'Request method is ' .$request->method();
});
Route::any('/posts', function (Request $request) {
    return 'Request method is ' .$request->method();

});
