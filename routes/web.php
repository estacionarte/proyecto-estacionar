<?php
Auth::routes();

Route::get('/', function () {
    return view('home');
})->middleware('coming.soon');
// ************************ COMING SOON *********************
Route::get('/lanzamiento', function () {
    return view('coming-soon');
})->name('coming.soon');

// ************************ A N F I T R I O N  *********************
Route::get('/anfitrion', function () {
    return view('anfitrion');
});

// ************************ CONTACTO EMAIL *********************
// Route::post('/lanzamiento', 'ContactController@sendContact')->name('enviar.mail');

Route::post('/lanzamiento', 'ContactController@suscribe')->name('suscribir');

// ************************ HOME LOGIN REGISTER *********************
Route::get('/home', 'HomeController@index')->name('home')->middleware('coming.soon');

Route::get('/signup', 'Auth\RegisterController@showRegistrationForm')->middleware('coming.soon');

Route::get('/signin', 'Auth\LoginController@showLoginForm');

// ************************ LOGIN FACEBOOK *********************
Route::get('login/{provider}', 'Auth\SocialAuthController@redirectToProvider');

Route::get('login/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

// ***************************** P E R F I L *******************

Route::get('perfil-espacio', 'ProfileController@mostrarEspacios')->name('profile-espacio')->middleware('auth');

Route::get('perfil-vehiculo', 'ProfileController@mostrarVehiculos')->name('profile-vehiculo')->middleware('auth');

Route::get('perfil', 'ProfileController@dameFecha')->name('profile')->middleware('auth');

Route::get('/perfil-alquileres', function () {
    return view('profile.profile-alquileres');
});

Route::put('perfil', 'ProfileController@uploadProfileImage');

// *************************** V E H I C U L O S ******************************
Route::group(['prefix' => 'cargar-vehiculo', 'middleware' => ['auth','coming.soon','check.vehiculo.owner']], function(){

  Route::get('datos', 'UploadVehicleController@showUploadVehicle')->name('show.upload.vehicle');

  Route::post('datos', 'UploadVehicleController@UploadVehicle')->name('create.upload.vehicle');

  Route::get('datos/editar/{id?}', 'UploadVehicleController@showEditVehicle')->name('show.edit.vehicle');

  Route::put('datos/editar/{id}', 'UploadVehicleController@editVehicle')->name('edit.vehicle');

  Route::delete('datos/{id}', 'UploadVehicleController@deleteVehicle')->name('delete.vehicle');
});

// ***************************  E S P A C I O S ******************************
Route::group(['prefix' => 'upload-espacio', 'middleware' => ['auth','coming.soon','check.espacio.owner']], function(){

  Route::get('infogeneral/{espacio?}', 'UploadEspacioController@showUploadEspacio1')->name('upload.espacio.1');

  Route::any('infogeneral/editar/{espacio}', 'UploadEspacioController@showEditarUploadEspacio1')->name('editar.upload.espacio.1');

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

  Route::delete('espacio/{id}', 'UploadEspacioController@deleteEspacio')->name('delete.espacio');

});
// ******************************************************************************

// ************************ QUIENES SOMOS  *********************
Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/faqs', function () {
    return view('faqs');
})->middleware('coming.soon');

Route::get('/politica-y-privacidad', function () {
    return view('politica-y-privacidad');
})->middleware('coming.soon');

Route::get('/creditos', function () {
    return view('credits');
})->middleware('coming.soon');

Route::get('/mantenimiento', function () {
    return view('underconstruction');
})->middleware('coming.soon');

Route::get('resultados', 'EspaciosController@search')->name('show.search')->middleware('coming.soon');

Route::get('espacio/{id}', 'EspaciosController@showEspacio')->name('show.espacio')->middleware('coming.soon');

// Alquilar
Route::post('alquilar/{id}', 'AlquileresController@alquilar')->name('alquilar');

// Ajax call detalle alquiler
Route::post('alquilar/detallealquiler/{id}/{horariollegada}/{horariopartida}', 'EspaciosController@detalleAlquiler')->name('alquiler.detalle');

// Ajax call para chequear disponibilidad
Route::post('alquilar/disponible/{id}/{horariollegada}/{horariopartida}', 'EspaciosController@disponible')->name('alquiler.disponible');

// test
Route::get('testfunction', 'MPPayments@test')->name('test')->middleware(['coming.soon']);
