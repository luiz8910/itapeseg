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



Route::get('/', 'SiteController@home')->name('home');

Auth::routes();

Route::get('/recuperar_senha', function (){
    return view('auth.passwords.forgot');
})->name('password.forgot');

Route::get("/send_link/{email}", 'Auth\LoginController@send_link_reset_pass');

Route::get('/nova_senha/{token}', 'Auth\LoginController@new_password_view')->name('new.password.view');


Route::post('/nova_senha/{token}', 'Auth\LoginController@new_password')->name('new.password');

Route::get('teste_email', function (){
    return new App\Mail\Contact();
});

//Catálogo

Route::get('catalogo', 'ProductController@catalogo')->name('category.catalogo');

Route::get('catalogo_produtos/{category_id}', 'ProductController@catalogo_products')->name('product.catalogo');


Route::group(['middleware' => 'auth'], function (){

    Route::get('/home', 'HomeController@index')->name('home');

    //Produtos

    Route::get('/produtos/{category_id?}', 'ProductController@index')->name('product.index');

    Route::get('/criar_produto', 'ProductController@create')->name('product.create');

    Route::get('/editar_produto/{id}', 'ProductController@edit')->name('product.edit');

    Route::post('/produto', 'ProductController@store')->name('product.store');

    Route::put('/produto/{id}', 'ProductController@update')->name('product.update');

    Route::delete('/produto/{id}', 'ProductController@delete')->name('product.delete');

    Route::get('/produtos_excluidos', 'ProductController@deleted')->name('product.deleted');

    Route::get('/activate/{id}', 'ProductController@activate');

//----------------------------------------------------------------------------------------------------------------------

    //Categorias de Produtos

    Route::get('/categorias_produtos', 'ProductController@categories')->name('product.index.category');

    Route::get('/criar_categoria', 'ProductController@create_category')->name('product.create.category');

    Route::get('/editar_categoria/{id}', 'ProductController@edit_category')->name('product.edit.category');

    Route::post('/categoria', 'ProductController@store_category')->name('product.store.category');

    Route::put('/categoria/{id}', 'ProductController@update_category')->name('product.update.category');

    Route::delete('/categoria/{id}', 'ProductController@delete_category')->name('product.delete.category');

    Route::get('/categorias_excluidas', 'ProductController@deleted_categories')->name('product.deleted.category');

    Route::get('/activate_category/{id}', 'ProductController@activate_category');

//----------------------------------------------------------------------------------------------------------------------

    //Subcategoria de Produtos

    Route::get('/subcategorias_produtos/{category_id?}', 'ProductController@categories_sub')->name('product.index.category.sub');

    Route::get('/criar_subcategoria', 'ProductController@create_category_sub')->name('product.create.category.sub');

    Route::get('/editar_subcategoria/{id}', 'ProductController@edit_category_sub')->name('product.edit.category.sub');

    Route::post('/subcategoria', 'ProductController@store_category_sub')->name('product.store.category.sub');

    Route::put('/subcategoria/{id}', 'ProductController@update_category_sub')->name('product.update.category.sub');

    Route::delete('/subcategoria/{id}', 'ProductController@delete_category_sub')->name('product.delete.category.sub');

    Route::get('/subcategorias_excluidas', 'ProductController@deleted_categories_sub')->name('product.deleted.category.sub');

    Route::get('/activate_subcategory/{id}', 'ProductController@activate_category_sub');

//----------------------------------------------------------------------------------------------------------------------

    //Usuários

    Route::get('/usuario/', 'PersonController@index')->name('person.index');

    Route::get('/criar_usuario', 'PersonController@create')->name('person.create');

    Route::get('/editar_usuario/{id}', 'PersonController@edit')->name('person.edit');

    Route::post('/usuario', 'PersonController@store')->name('person.store');

    Route::put('/usuario/{id}', 'PersonController@update')->name('person.update');

    Route::delete('/usuario/{id}', 'PersonController@delete');

    Route::get('/usuarios_excluidos', "PersonController@deleted")->name('person.deleted');

    Route::get('/activate_user/{id}', 'PersonController@activate');

//----------------------------------------------------------------------------------------------------------------------

    //Reordenar Menu

    //View
    Route::get('/menu', 'SiteController@reorder_menu')->name('reorder.menu');

    //BD Persistence
    Route::post('/menu', 'SiteController@reorder')->name('reorder.menu.post');

//----------------------------------------------------------------------------------------------------------------------

    //Brands - Marcas exibidas no site

    Route::get('/marcas/{orderBy?}/{status?}', 'BrandController@index')->name('brand.index');

    Route::get('/criar_marca', 'BrandController@create')->name('brand.create');

    Route::get('/editar_marca/{id}', 'BrandController@edit')->name('brand.edit');

    Route::post('/brand', 'BrandController@store')->name('brand.store');

    Route::put('/brand/{id}', 'BrandController@update')->name('brand.update');

    Route::delete('/brand/{id}', 'BrandController@delete')->name('brand.delete');

    // Brand Segments - Segmentos das marcas (Ex: CFTV, Alarmes e etc)

    Route::get('/segmentos', 'BrandController@index_segment')->name('brand.index.segment');

    Route::get('/criar_segmento', 'BrandController@create_segment')->name('brand.create.segment');

    Route::get('/editar_segmento/{id}', 'BrandController@edit_segment')->name('brand.edit.segment');

    Route::post('/segment', 'BrandController@store_segment')->name('brand.store.segment');

    Route::put('/segment/{id}', 'BrandController@update_segment')->name('brand.update.segment');

    Route::delete('/segment/{id}', 'BrandController@delete_segment')->name('brand.delete.segment');

//----------------------------------------------------------------------------------------------------------------------

    //About - Quem Somos

    Route::get('/quem_somos', 'AboutController@edit')->name('about.edit');

    Route::post('/quem_somos/', 'AboutController@update')->name('about.update');

//----------------------------------------------------------------------------------------------------------------------

    //FAQ

    Route::get('/faq', 'FAQController@index')->name('faq.index');

    Route::get('/criar_faq', 'FAQController@create')->name('faq.create');

    Route::get('/faq/{id}', 'FAQController@edit')->name('faq.edit');

    Route::post('/faq/{redirect?}', 'FAQController@store')->name('faq.store');

    Route::put('/faq/{id}', 'FAQController@update')->name('faq.update');

    Route::delete('/faq/{id}', 'FAQController@delete');

//----------------------------------------------------------------------------------------------------------------------

    //Contact Form

    Route::get('/contatos', 'ContactController@index')->name('contact.index');

    Route::post('/contact', 'ContactController@store')->name('contact.store');

//----------------------------------------------------------------------------------------------------------------------

    //Dados da Empresa

    Route::get("/informacoes", 'ContactController@company_data')->name('company.data');

    Route::post("/informacoes", 'ContactController@company_data_update')->name('company.data.update');
});










