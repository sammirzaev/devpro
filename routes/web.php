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

use App\Comment;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostsController@post']);
Route::get('/admin/comments', 'PostCommentsController@search');

Route::group(['middleware'=>'admin'], function(){

    Route::get('/admin', function (){
        return view('admin.index');
    });

    Route::resource('/admin/users', 'AdminUsersController');
    Route::resource('/admin/posts', 'AdminPostsController');
    Route::resource('/admin/categories', 'AdminCategoryController');
    Route::resource('/admin/media', 'AdminPhotosController');
//    Route::get('admin/media/upload', ['as'=>'media.upload', 'uses'=>'AdminPhotosController@store']);
    Route::resource('/admin/comments', 'PostCommentsController');
    Route::resource('/admin/comment/replies', 'CommentRepliesController');
});

Route::group(['middleware'=>'auth'], function(){

     Route::post('comment/reply', 'CommentRepliesController@createReply');

});