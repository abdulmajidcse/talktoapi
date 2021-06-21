<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// APP_KEY generate
// $router->get('app_key', function() {
//     return \Illuminate\Support\Str::random(32);
// });

$router->get('/', 'HomeController@index');

$router->get('categories', 'CategoryController@index');
$router->post('categories', 'CategoryController@store');
$router->get('categories/{id}', 'CategoryController@show');
$router->put('categories/{id}', 'CategoryController@update');
$router->delete('categories/{id}', 'CategoryController@destroy');