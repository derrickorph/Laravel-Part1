<?php

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FluentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PaginationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UploadController;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\UserTestController;
use App\Http\Controllers\UtilisateurController;
use App\PaymentGateway\Payment;
use Illuminate\Support\Facades\App;
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

//Localisation
// Route::get('/{locate}', function ($locate) {
//     App::setLocale($locate);
//     return view('welcome');
// });
 Route::get('/', [ProductController::class, 'index'])->name('product.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('users',UsersController::class);
});
// Travaux Test
Route::resource('test',UserTestController::class);
Route::get('/testEdit/{id}', [UserTestController::class,'getUserById']);
Route::put('/testUpdate', [UserTestController::class,'updateUser'])->name('update.user');
Route::post('test/{test}/delete', [UserTestController::class,'destroy'])->name('destroyUserTest');
Route::post('/progress', [UserTestController::class,'uploadFile'])->name('upload.file');

//Tutoriel LARAVEL 8
Route::get('/utilisateur', [UtilisateurController::class, 'index'])->name('utilisateur.index');
//HTTP CLIENT
Route::get('/posts', [ClientController::class, 'getAllPost'])->name('posts.getallpost');
Route::get('/posts/{id}', [ClientController::class, 'getPostById'])->name('posts.getpostbyid');
Route::get('/add-post', [ClientController::class,'addPost'])->name('posts.addpost');
Route::get('/update-post', [ClientController::class,'updatePost'])->name('posts.update');
Route::get('/delete-post/{id}', [ClientController::class,'deletePost'])->name('posts.delete');

//Fluent String
Route::get('/fluent-string', [FluentController::class, 'index'])->name('fluent.index');

//HTTP REQUEST Pourr afficher la gestion des users il faut commenter ces routes
// Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('checkuser');// checkuser est déclaré dans Kernel
// Route::post('/login', [LoginController::class, 'loginSubmit'])->name('login.submit');

//HTTP Session
Route::get('/session/get', [SessionController::class,'getSessionData'])->name('session.get');
Route::get('/session/set', [SessionController::class,'storeSessionData'])->name('session.store');
Route::get('/session/remove', [SessionController::class,'deleteSessionData'])->name('session.delete');

//DATABASE PART AND CRUD
Route::get('/posts', [PostController::class, 'getAllPost'])->name('post.getallpost');
Route::get('/add-post', [PostController::class, 'addPost'])->name('post.add');
Route::post('/add-post', [PostController::class, 'addPostSubmit'])->name('post.addsubmit');
Route::get('/posts/{id}', [PostController::class, 'getPostById'])->name('post.getbyid');
Route::get('/delete-post/{id}', [PostController::class, 'deletePost'])->name('post.delete');
Route::get('/edit-post/{id}', [PostController::class, 'editPost'])->name('post.edit');
Route::post('/update-post', [PostController::class, 'updatePost'])->name('post.update');
//Inner-Join
Route::get('/inner-join', [PostController::class, 'innerJoinClause'])->name('post.innerjoin');
Route::get('/left-join', [PostController::class, 'leftJoinClause'])->name('post.leftjoin');
Route::get('/right-join', [PostController::class, 'rightJoinClause'])->name('post.rightjoin');
//Models Routing
Route::get('/all-posts', [PostController::class, 'getAllPostsUsingModel'])->name('post.getallpostusingmodel');

//Structure de controle BLADE
Route::get('/test-blade', function () {
    return view('structure-controller');
});

//Template Blade
// Route::get('/home', function () {
//     return view('index');
// });
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
//Pagination Route
Route::get('/users', [PaginationController::class, 'allUsers'])->name('pagination.allusers');
//UploadFile Route
Route::get('/upload', [UploadController::class,'uploadForm'])->name('upload.file');
Route::post('/upload', [UploadController::class,'uploadFile'])->name('store.file');

//Facade
Route::get('/payment', function () {
    return Payment::process();
});

//Envoi de Mail
Route::get('/send-email', [MailController::class,'sendMail'])->name('sent.email');







