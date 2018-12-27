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
Route::resource('registro', 'RegistroController');
Route::get('/',function () {
    return view('welcome_boot');
});
Route::get('/menu', function () {
    return 'Hola mundo';
});
Route::get('/saludo/{name}/{nickname?}', function ($name, $nickname = null) {

    $name =ucfirst($name);

    if ($nickname) {
        return "Bienvenido {$name}, tu apodo es {$nickname}";
    } else {
        return "Bienvenido {$name}, no tienes apodo";
    }
});
Route::get('/usuarios',function() {
    return 'Usuarios';
});

Route::get('/usuarios/{id}',function($id) {
    return 'Usuario: {$id}';
})->where('id', '[0-9]+');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/registroConvenioColab', 'PruebaController@registroConvenio')->name('registroConvenio');

Route::get('/registrarConvenioColab', [ 'uses' => 'PruebaController@registrarConvenio'])->name('registrarConvenio');

