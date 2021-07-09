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