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

Route::get('/', 'PageController@home');
Route::get('/about', 'PageController@about');
Route::get('/contact', 'PageController@contact');

/*
 * GET /recipes (index)
 * GET /recipes/create (create)
 * GET /recipes/1 (show)
 * POST /recipes (store)
 * GET /recipes/1/edit (edit)
 * PATCH /recipes/1 (update)
 * DELETE /recipes/1 (destroy)
 */
Route::resource('recipes', 'RecipeController');
