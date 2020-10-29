<?php

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

Route::group(['middleware' => 'guest'], function (){
    Route::resource('/install', 'InstallController');
});




Route::get('/', 'HomeController@index')->name('/');
Route::resource('/about', 'AboutController');
Route::resource('/post', 'BlogController');
Route::resource('/chefs', 'ChefsController');
Route::resource('/contact', 'ContactController');
Route::resource('/menu', 'MenuController');
//Route::get('/', 'HomeController@index');




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/tester', 'TestController@index');
Route::get('/profile', 'UserController@profile')->name('my_profile');
Route::get('/my_blog', 'MyBlogController@index')->name('my_blog');
Route::get('/my_blog/store', 'MyBlogController@store')->name('my_blog.store');
Route::get('/tables', 'TablesController@index')->name('tables');







Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function (){

    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::get('/routes', 'RouteController@index') ->name('routes');
    Route::get('/manage-role{role}', 'RoleController@managePermissions')->name('roles.manage-permissions');
    Route::post('/manage-role-permissions', 'RoleController@managePermissionsStore')->name('roles.manage-permissions-store');

    Route::resource('/about', 'AboutController');
    Route::resource('/post', 'BlogController');
    Route::resource('/menu', 'MenuController');
    Route::resource('/users', 'UserController');
    Route::resource('/roles', 'RoleController');
    Route::resource('/permissions', 'PermissionController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagController');
    Route::resource('/posts', 'PostController');
    Route::resource('/comments', 'CommentController', ['only' => ['index', 'destroy']]);
});


