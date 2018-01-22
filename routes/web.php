<?php
Auth::routes();

Route::get('/', function () {
    return view('home');
});
// ************************ COMING SOON *********************
Route::get('/lanzamiento', function () {
    return view('coming-soon');
});

// ************************ A N F I T R I O N  *********************
Route::get('/anfitrion', function () {
    return view('anfitrion');
});

// ************************ CONTACTO EMAIL *********************
Route::post('/lanzamiento', 'ContactController@sendContact');

// ************************ HOME LOGIN REGISTER *********************
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/signup', 'Auth\RegisterController@showRegistrationForm');

Route::get('/signin', 'Auth\LoginController@showLoginForm');

// ************************ LOGIN FACEBOOK *********************
Route::get('login/{provider}', 'Auth\SocialAuthController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');


// ***************************** P E R F I L *******************
Route::get('/perfil', 'ProfileController@mostrarPerfil')->name('profile')->middleware('auth');

Route::get('/perfil/editar-imagen', 'ProfileController@showUpdateProfileImage')->name('show.update.profile.image');

Route::post('/perfil/editar-imagen', 'ProfileController@updateProfileImage')->name('update_profile_image');


// *************************** V E H I C U L O S ******************************
Route::group(['prefix' => 'cargar-vehiculo', 'middleware' => 'auth'], function(){

  Route::get('datos', 'UploadVehicleController@showUploadVehicle')->name('show.upload.vehicle');

  Route::post('datos', 'UploadVehicleController@UploadVehicle')->name('create.upload.vehicle');

  Route::get('datos/editar/{id?}', 'UploadVehicleController@showEditVehicle')->name('show.edit.vehicle');

  Route::put('datos/editar/{id}', 'UploadVehicleController@editVehicle')->name('edit.vehicle');

  Route::delete('datos/{id}', 'UploadVehicleController@deleteVehicle')->name('delete.vehicle');
});

// ***************************  E S P A C I O S ******************************
Route::group(['prefix' => 'upload-espacio', 'middleware' => 'auth'], function(){

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
Route::get('/quienes-somos', function () {
    return view('quienes-somos');
});

Route::get('/faqs', function () {
    return view('faqs');
});

Route::get('/politica-y-privacidad', function () {
    return view('politica-y-privacidad');
});

Route::get('/creditos', function () {
    return view('credits');
});

Route::get('/map', function() {
  return view('leaflet');
});

Route::get('/mantenimiento', function () {
    return view('underconstruction');
});

Route::get('resultados', 'EspaciosController@search')->name('show.search');

Route::get('espacio/{id}', 'EspaciosController@showEspacio')->name('show.espacio');

// Alquilar
Route::post('alquilar/{id}', 'AlquileresController@alquilar')->name('alquilar');

// Ajax call detalle alquiler
Route::post('alquilar/detallealquiler/{id}/{horariollegada}/{horariopartida}', 'EspaciosController@detalleAlquiler')->name('alquiler.detalle');

// Ajax call para chequear disponibilidad
Route::post('alquilar/disponible/{id}/{horariollegada}/{horariopartida}', 'EspaciosController@disponible')->name('alquiler.disponible');

// test
Route::get('testfunction/{id}', 'EspaciosController@disponible')->name('disponible');
