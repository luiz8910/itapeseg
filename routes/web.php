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

Route::get('/recuperar_senha', function (){
    return view('auth.passwords.forgot');
})->name('password.forgot');

Route::get("/send_link/{email}", 'Auth\LoginController@send_link_reset_pass');

Route::get('/nova_senha/{token}', 'Auth\LoginController@new_password_view')->name('new.password.view');


Route::post('/nova_senha/{token}', 'Auth\LoginController@new_password')->name('new.password');


Route::get('teste_email', function (){
    return new App\Mail\ForgotPassword();
});


Route::group(['middleware' => 'auth'], function (){

    Route::get('/home', 'HomeController@index')->name('home');

    //Produtos

    Route::get('/produtos', 'ProductController@index')->name('product.index');

    Route::get('/criar_produto', 'ProductController@create')->name('product.create');

    Route::get('/editar_produto/{id}', 'ProductController@edit')->name('product.edit');

    Route::post('/produto', 'ProductController@store')->name('product.store');

    Route::put('/produto/{id}', 'ProductController@update')->name('product.update');

    Route::delete('/produto/{id}', 'ProductController@delete')->name('product.delete');

//----------------------------------------------------------------------------------------------------------------------

    //Categorias de Produtos

    Route::get('/categorias_produtos', 'ProductController@categories')->name('product.index.category');

    Route::get('/criar_categoria', 'ProductController@create_category')->name('product.create.category');

    Route::get('/editar_categoria/{id}', 'ProductController@edit_category')->name('product.edit.category');

    Route::post('/categoria', 'ProductController@store_category')->name('product.store.category');

    Route::put('/categoria/{id}', 'ProductController@update_category')->name('product.update.category');

    Route::delete('/categoria/{id}', 'ProductController@delete_category')->name('product.delete.category');

});
