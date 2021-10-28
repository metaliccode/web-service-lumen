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

// $router->get('/', function () use ($router) {
//     return 'Halo dunia!!';
// });

$router->get('/course', 'CourseController@index');
$router->post('/course', 'CourseController@create');
$router->get('/course/{id}', 'CourseController@show');
$router->put('/course/{id}', 'CourseController@update');
$router->delete('/course/{id}', 'CourseController@destroy');

// user
$router->post('/register', 'UserController@register');
$router->post('/login', 'UserController@login');
