<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', 'HomeController@index');

$router->get('todos', 'TodoController@index');
$router->post('todos', 'TodoController@store');
$router->get('todos/{todo}', 'TodoController@show');
$router->post('todos/{todo}', 'TodoController@update');
$router->delete('todos/{todo}', 'TodoController@destroy');


/**
 * Authenticate routes
 */
$router->post('register', 'AuthController@register');
$router->post('login', 'AuthController@login');

$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->get('user', 'AuthController@user');
    $router->post('refresh', 'AuthController@refresh');
    $router->post('logout', 'AuthController@logout');
    // category crud routes
    $router->get('categories', 'CategoryController@index');
    $router->post('categories', 'CategoryController@store');
    $router->get('categories/{id}', 'CategoryController@show');
    $router->put('categories/{id}', 'CategoryController@update');
    $router->delete('categories/{id}', 'CategoryController@destroy');
    // post crud routes
    $router->get('posts', 'PostController@index');
    $router->post('posts', 'PostController@store');
    $router->get('posts/{id}', 'PostController@show');
    $router->put('posts/{id}', 'PostController@update');
    $router->delete('posts/{id}', 'PostController@destroy');
});
