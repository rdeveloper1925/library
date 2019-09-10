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

Route::get('/',function(){ return view('login');});

Route::get('/login', function () {return view('login');})->name('login');
Route::post('/doLogin','PagesController@doLogin');

Route::middleware('auth')->group(function (){
    Route::middleware('reset-rights')->group(function (){
        Route::get('/pwdResetStudent/{id}','StudentsController@pwdReset');
        Route::resource('/teachers','TeachersController');
        Route::resource('/librarians','LibrarianController');
        Route::get('/resetdp/{id}','StudentsController@dpReset');

    });
    Route::get('/home',"PagesController@showHome");
    Route::get('/profile','PagesController@profile');
    Route::post('/uploadDp',"PagesController@uploadDp");
    Route::get('/register',function(){ return view('register');})->name('register');
    Route::post('/doRegister',"PagesController@doRegister");
    Route::get('/students','StudentsController@index')->name('studentListing');
    Route::get('/students/create','StudentsController@create');
    Route::post('/students/store','StudentsController@store');
    Route::get('/students/{id}/view','StudentsController@view');
    Route::get('/students/{id}/edit','StudentsController@edit');
    Route::post('/students/{id}/update','StudentsController@update');
    Route::get('/students/{id}/delete','StudentsController@destroy');
    Route::resource('/books','BooksController');
});
Route::get('/logout','PagesController@doLogout');

Route::get('/try',function (){
    $d=\Illuminate\Support\Facades\Storage::disk('local');
    return $d->exists('dp/4/4-1564155629DP.jpg');
    //return $d->exists('public/img/dps/3.jpg')?'true':'false';
    //return asset('storage/app/dp/4/4-1564155629DP.jpg');
});
