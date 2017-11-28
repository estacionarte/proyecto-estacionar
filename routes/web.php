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

  Route::get('estadias', 'UploadEstacionamientoController@showUploadEstacionamiento2')->name('upload.estacionamiento.2');

  Route::post('estadias', 'UploadEstacionamientoController@createEspacio')->name('create.espacio');

  Route::get('diasyhorarios', 'UploadEstacionamientoController@showUploadEstacionamiento3')->name('upload.estacionamiento.3');

  Route::post('diasyhorarios', 'UploadEstacionamientoController@insertAndShowUploadEstacionamiento3')->name('insert.upload.estacionamiento.3');

  Route::get('precios', 'UploadEstacionamientoController@showUploadEstacionamiento4')->name('upload.estacionamiento.4');

  Route::get('resumen', 'UploadEstacionamientoController@showUploadEstacionamientoResumen')->name('upload.estacionamiento.resumen');

});

Route::get('/map', function() {
  return view('leaflet');
});
