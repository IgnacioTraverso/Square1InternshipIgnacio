<?php
use GuzzleHttp\Client;

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
// });

Auth::routes();



Route::get('/', 'BlogController@index');



Route::post('/blogs','BlogController@store');
Route::get('/blogs/pd/{blog}',	'BlogController@show');
Route::get('/blogs/nl/{blog}',	'BlogController@showorderbylikes');
Route::post('/posts',	'PostController@store');

Route::get('/posts/{post}','PostController@show');


Route::get('/userposts', 'BlogController@UserPosts');


Route::get('/posts/like/{id}', 'PostController@like')->name('post.like');

Route::get('/posts/unlike/{id}', 'PostController@unlike')->name('post.unlike');


//datatable