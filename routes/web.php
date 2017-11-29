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

Route::get('/mantenimiento', function () {
    return view('underconstruction');
});

Route::get('/miperfil', function () {
    return view('profile');
});

Route::group(['prefix' => 'upload-estacionamiento', 'middleware' => 'auth'], function(){

  Route::get('infogeneral', 'UploadEstacionamientoController@showUploadEstacionamiento1')->name('upload.estacionamiento.1');

  Route::get('estadias/{id}', 'UploadEstacionamientoController@showUploadEstacionamiento2')->name('upload.estacionamiento.2');

  Route::post('estadias/{id}', 'UploadEstacionamientoController@createEspacioAndShowUploadEstacionamiento2')->name('create.espacio.upload.estacionamiento.2');

  Route::get('diasyhorarios', 'UploadEstacionamientoController@showUploadEstacionamiento3')->name('upload.estacionamiento.3');

  Route::put('diasyhorarios', 'UploadEstacionamientoController@insertAndShowUploadEstacionamiento3')->name('insert.upload.estacionamiento.3');

  Route::get('precios', 'UploadEstacionamientoController@showUploadEstacionamiento4')->name('upload.estacionamiento.4');

  Route::put('precios', 'UploadEstacionamientoController@insertAndShowUploadEstacionamiento4')->name('insert.upload.estacionamiento.4');

  Route::get('resumen', 'UploadEstacionamientoController@showUploadEstacionamientoResumen')->name('upload.estacionamiento.resumen');

});

Route::get('/map', function() {
  return view('leaflet');
});
