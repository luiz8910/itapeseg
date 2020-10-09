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



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/recuperar_senha', function (){
    return view('auth.passwords.forgot');
})->name('password.forgot');

Route::get("/send_link/{email}", 'Auth\LoginController@send_link_reset_pass');

Route::get('/nova_senha/{token}', 'Auth\LoginController@new_password_view')->name('new.password.view');


Route::post('/nova_senha/{token}', 'Auth\LoginController@new_password')->name('new.password');




Route::get('teste_email', function (){
    return new App\Mail\ForgotPassword();
});
