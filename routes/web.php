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

Route::get('/  mantenimiento', function () {
    return view('underconstruction');
});

Route::get('/miperfil', function () {
    return view('profile');
});

Route::get('/upload-estacionamiento/infogeneral', 'UploadEstacionamientoController@showUploadEstacionamiento1')->name('upload.estacionamiento.1');

Route::get('/upload-estacionamiento/estadias', 'UploadEstacionamientoController@showUploadEstacionamiento2')->name('upload.estacionamiento.2');

Route::post('/upload-estacionamiento/estadias', 'UploadEstacionamientoController@createEspacio')->name('create.espacio');

Route::get('/upload-estacionamiento/diasyhorarios', 'UploadEstacionamientoController@showUploadEstacionamiento3')->name('upload.estacionamiento.3');

Route::get('/upload-estacionamiento/precios', 'UploadEstacionamientoController@showUploadEstacionamiento4')->name('upload.estacionamiento.4');

Route::get('/upload-estacionamiento/resumen', 'UploadEstacionamientoController@showUploadEstacionamientoResumen')->name('upload.estacionamiento.resumen');

Route::get('/map', function() {
  return view('leaflet');
});
