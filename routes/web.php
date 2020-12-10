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



// Route::get('/about', function () {
//     return view('pages.about');
// });

// Route::get('/user', function () {
//     return view('pages.about');
// });

Route::get('/', 'PagesController@index');
Route::get('/gallery', 'PagesController@gallery');
Route::get('/services', 'PagesController@services');


Route::resource('posts','PostsController');
// Route::resource('admin','AdminController');

Route::get('/admin/users', 'AdminController@users')->name('/admin/users');
Route::get('/admin/posts', 'AdminController@posts')->name('/admin/posts');

Route::get('/admin/user/{id}', 'AdminController@showuser')->name('/admin/user/{id}');
Route::get('/admin/post/{id}', 'AdminController@showpost')->name('/admin/post/{id}');
Route::delete('/admin/delete/{id}', 'AdminController@destroy')->name('/admin/delete/{id}');
Route::put('/admin/user/{id}/edit', 'AdminController@updateusercertification')->name('/admin/user/{id}/edit');

Route::resource('users', 'UsersController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/landlord', 'HomeController@landlord')->name('landlord');

Route::resource('contact', 'MailController');
Route::resource('setting', 'SettingsController');
Route::put('/posts/validid/{id}',[
    'as' => 'create.validid',
    'uses' => 'SettingsController@validid'
]);
// Route::put('posts/create/{$id}', 'SettingsController@valid_id')->name('posts/create/validid.');



// Route::get('/message',function(){
//     return view('posts.contact');
// });

// Route::post('contact', function(Request $request){
//      Mail::send(new ContactMail($request));
//      return redirect('/');
//  });
