<?php

/** @var \Laravel\Lumen\Routing\Router $router */

// APP_KEY generate
// $router->get('app_key', function() {
//     return \Illuminate\Support\Str::random(32);
// });

$router->get('/', 'HomeController@index');

$router->get('todos', 'TodoController@index');
$router->post('todos', 'TodoController@store');
$router->get('todos/{id}', 'TodoController@show');
$router->put('todos/{id}', 'TodoController@update');
$router->delete('todos/{id}', 'TodoController@destroy');


/**
 * Authenticate routes
 */
$router->post('register', 'AuthController@register');
$router->post('login', 'AuthController@login');

$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->get('user', 'AuthController@user');
    $router->post('refresh', 'AuthController@refresh');
    $router->post('logout', 'AuthController@logout');
});