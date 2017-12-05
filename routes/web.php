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

Route::get('/perfil', 'ProfileController@mostrarPerfil')->name('profile');

Route::group(['prefix' => 'upload-estacionamiento', 'middleware' => 'auth'], function(){

  Route::get('infogeneral/{espacio?}', 'UploadEstacionamientoController@showUploadEstacionamiento1')->name('upload.estacionamiento.1');

  Route::get('infogeneral/editar/{espacio}', 'UploadEstacionamientoController@showEditarUploadEstacionamiento1')->name('editar.upload.estacionamiento.1');

  Route::post('estadias', 'UploadEstacionamientoController@createEspacioAndShowUploadEstacionamiento2')->name('create.espacio.upload.estacionamiento.2');

  Route::put('estadias/{id}', 'UploadEstacionamientoController@insertAndShowUploadEstacionamiento2')->name('insert.upload.estacionamiento.2');

  Route::get('estadias/{espacio}', 'UploadEstacionamientoController@showUploadEstacionamiento2')->name('upload.estacionamiento.2');

  Route::put('diasyhorarios/{id}', 'UploadEstacionamientoController@insertAndShowUploadEstacionamiento3')->name('insert.upload.estacionamiento.3');

  Route::get('diasyhorarios/{espacio}', 'UploadEstacionamientoController@showUploadEstacionamiento3')->name('upload.estacionamiento.3');

  Route::put('precios/{id}', 'UploadEstacionamientoController@insertAndShowUploadEstacionamiento4')->name('insert.upload.estacionamiento.4');

  Route::get('precios/{espacio}', 'UploadEstacionamientoController@showUploadEstacionamiento4')->name('upload.estacionamiento.4');

  Route::put('resumen/{id}', 'UploadEstacionamientoController@insertAndShowUploadEstacionamientoResumen')->name('insert.upload.estacionamiento.resumen');

  Route::get('resumen/{espacio}', 'UploadEstacionamientoController@showUploadEstacionamientoResumen')->name('upload.estacionamiento.resumen');

});

Route::get('/map', function() {
  return view('leaflet');
});

Route::get('/mapita', function() {
  return view('map');
});

Route::get('/locations','LocationsController@map');
