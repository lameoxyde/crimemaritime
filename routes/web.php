<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\ThematiqueController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController; 
use App\Http\Controllers\Admin\RoleController;

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

Route::get('/dashboard', function () {
   return view('dashboard');
})->middleware(['auth'])->name('dashboard');



// Route::resource('/admin', UserController::class, ['except'=> ['show', 'create', 'store']]);


Route::group(['middleware' => 'auth'], function() {
   Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
   Route::resource('user', UserController::class);
   Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
   Route::post('/profile', [UserController::class, 'postProfile'])->name('user.postProfile');

   Route::get('/password/change', [UserController::class,'getPassword'])->name('userGetPassword');

   Route::post('/password/change', [UserController::class, 'postPassword'])->name('userPostPassword');



   Route::resource('permission', PermissionController::class);
   Route::resource('role', RoleController::class);


   // Route::get('/home' ,[HomeController::class, 'home'])->name('home.home');
   Route::get('/thematiquechart' ,[ChartController::class, 'thematiquechart'])->name('thematiquechart');



   Route::resource('thematique', ThematiqueController::class);

   Route::resource('pages', PageController::class);
   Route::get('/upload', [PageController::class,'upload'])->name('upload');
   Route::post('/import', [PageController::class,'import'])->name('import');

   Route::post('/searchdate',[PageController::class, 'searchByDate'])->name('searchdate');

});  





Auth::routes();




// Route Api vue

Route::post('/postRole', [RoleController::class, 'store']);
Route::get("/getAllRoles", [RoleController::class,'getAll']);
Route::put("/role/update/{id}", [RoleController::class,'update']);

Route::get('/getAllPermission', [PermissionController::class, 'getAllPermissions']);
Route::get("/getAllPermissions", [PermissionController::class, 'getAll']);

Route::get('/getAllUsers', [UserController::class, 'getAll']);
Route::post('/account/create', [UserController::class, 'store']);
Route::put('/account/update/{id}', [UserController::class, 'update']);
Route::delete('/delete/user/{id}', [UserController::class, 'delete']);
Route::get('/search/user', [UserController::class, 'search']);






