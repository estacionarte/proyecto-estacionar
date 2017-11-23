<?php
Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/faqs', function () {
    return view('faqs');
});

Route::get('/signup', 'Auth\RegisterController@showRegistrationForm');

Route::get('/signin', 'Auth\LoginController@showLoginForm');

Route::get('/underconstruction', function () {
    return view('underconstruction');
});

Route::get('/upload-estacionamiento/infogeneral', 'UploadEstacionamientoController@showUploadEstacionamiento1')->name('upload.estacionamiento.1');

Route::get('/upload-estacionamiento/estadias', 'UploadEstacionamientoController@showUploadEstacionamiento2')->name('upload.estacionamiento.2');
