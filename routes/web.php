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
    return view('front.index');
});

Route::post('/admin_login', 'AdminController@admin_login_page');
Route::get('/secure-panel', 'AdminController@dashboard_page');
Route::get('/contact-list', 'AdminController@admin_contact_page');
Route::get('/fixed-sidebar', 'AdminController@admin_fixed_sidebar_page');
Route::get('/admin_logout', 'AdminController@admin_logout_page');

Route::get('/product-category', 'AdminController@admin_prod_category_page');
Route::post('/insert_category_data', 'AdminController@add_category_page');
Route::get('/category-list', 'AdminController@category_list_page');
Route::get('/edit/{id}', 'AdminController@edit_category_page');
Route::post('/edit_category_data', 'AdminController@update_category_page');
Route::get('/delete/{id}', 'AdminController@delete_category_page');

Route::get('/product-list', 'AdminController@product_list_page');
Route::get('/add-product', 'AdminController@add_product_page');
Route::post('/insert_product', 'AdminController@insert_product_page');
Route::get('/edit_prod/{id}', 'AdminController@edit_product_page');
Route::post('/update_product', 'AdminController@update_product_page');
Route::get('/delete_prod/{id}', 'AdminController@delete_product_page');