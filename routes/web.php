<?php

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

$link = "<a href='" . url('/admin') ."'>Link Admin</a> - ";
$link .= "<a href='" . url('/owner') ."'>Link Owner</a> - ";
$link .= "<a href='" . url('/owner/create-post') ."'>Link Owner with permission create post</a> - ";
$link .= "<a href='" . url('/owner/edit-user') ."'>Link Owner with permission edit post</a>";
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function() use($link) {
    echo "Hello Admin <br/>" . $link;
})->middleware('role:admin');

Route::get('/owner', function() use($link) {
    echo "Hello Owner <br/>" . $link;
})->middleware('role:owner|admin');

Route::get('/owner/create-post', function() use($link) {
    echo "Hello all and Permission create-post <br/>"  . $link;
})->middleware('role:owner|admin', 'permission:create-post');

Route::get('/owner/edit-user', function() use($link) {
    echo "Hello all and Permission edit-user <br/>"  . $link;
})->middleware('role:owner|admin', 'permission:edit-user');

Route::get('test', function () {
    return view('test');
});