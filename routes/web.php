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

Auth::routes();

// Route::get('/home', 'HomeController@index');
Route::get('/test', 'CategoryController@test');
Route::get('/', 'CategoryController@index');
Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{parent_id}', 'CategoryController@categorydrill');

Route::get('/threads/{thread_id}', 'ThreadController@show');
Route::get('/threads/create/{category_id}', 'ThreadController@showCreateForm');
Route::post('/threads/create/{category_id}', 'ThreadController@create');

Route::get('/replies/create/{thread_id}', 'ReplyController@showCreateForm');
Route::post('/replies/create/{thread_id}', 'ReplyController@create');

Route::get('/replies/{reply_id}/like', 'LikeController@like');
Route::get('/replies/{reply_id}/dislike', 'LikeController@dislike');

//ako je tome tako onda to bas i nije bitno da se vidi

// Route::get('/api/likes/{reply_id}', 'LikeController@likes');
// Route::get('/api/getlikes/{reply_id}', 'LikeController@getLikes');

// Route::get('/tickets', 'TicketController@index');
// Route::get('/tickets/create', 'TicketController@showCreateForm');
// Route::post('/tickets/create', 'TicketController@create');

// Route::get('/ticketdetails/{ticket_id}', 'TicketDetailController@index');
// Route::get('/ticketdetails/{ticket_id}/create/','TicketDetailController@showCreateForm');
// Route::post('/ticketdetails/{ticket_id}/create/','TicketDetailController@create');


// Route::get('/test/page1', function() {
//    Session::flash('status', 'Hello from page1');
//    return redirect('/test/page2');
// });

// Route::get('/test/page2', function() {
//    if( !empty(Session::get('status'))) {
//       return Session::get('status');
//    } else {
//       return "This is just page2";
//    }
//    return Session::get('status');
// });

