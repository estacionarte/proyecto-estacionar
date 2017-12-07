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
Route::get('/perfil/editar-imagen', 'ProfileController@showUpdateProfileImage')->name('show.update.profile.image');
Route::put('/perfil/editar-imagen', 'ProfileController@updateProfileImage')->name('update_profile_image');

Route::group(['prefix' => 'upload-espacio', 'middleware' => 'auth'], function(){

  Route::get('infogeneral/{espacio?}', 'UploadEspacioController@showUploadEspacio1')->name('upload.espacio.1');

  Route::get('infogeneral/editar/{espacio}', 'UploadEspacioController@showEditarUploadEspacio1')->name('editar.upload.espacio.1');

  Route::delete('infogeneral/eliminarfoto/{id}', 'UploadEspacioController@deletePicEspacio')->name('deletepic.upload.espacio');

  Route::post('estadias', 'UploadEspacioController@createEspacioAndShowUploadEspacio2')->name('create.espacio.upload.espacio.2');

  Route::put('estadias/{id}', 'UploadEspacioController@insertAndShowUploadEspacio2')->name('insert.upload.espacio.2');

  Route::get('estadias/{espacio}', 'UploadEspacioController@showUploadEspacio2')->name('upload.espacio.2');

  Route::put('diasyhorarios/{id}', 'UploadEspacioController@insertAndShowUploadEspacio3')->name('insert.upload.espacio.3');

  Route::get('diasyhorarios/{espacio}', 'UploadEspacioController@showUploadEspacio3')->name('upload.espacio.3');

  Route::put('precios/{id}', 'UploadEspacioController@insertAndShowUploadEspacio4')->name('insert.upload.espacio.4');

  Route::get('precios/{espacio}', 'UploadEspacioController@showUploadEspacio4')->name('upload.espacio.4');

  Route::put('resumen/{id}', 'UploadEspacioController@insertAndShowUploadEspacioResumen')->name('insert.upload.espacio.resumen');

  Route::get('resumen/{espacio}', 'UploadEspacioController@showUploadEspacioResumen')->name('upload.espacio.resumen');

});

Route::get('/map', function() {
  return view('leaflet');
});

Route::get('/mapita', function() {
  return view('map');
});

Route::get('/locations','LocationsController@map');
