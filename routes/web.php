<?php
Auth::routes();
Route::get('/', function () {
    return view('home');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/faqs', function () {
    return view('faqs');
});

Route::get('/signup', function () {
    return view('auth.register');
});

Route::get('/signin', function () {
    return view('auth.login');
});

Route::get('/underconstruction', function () {
    return view('underconstruction');
});
