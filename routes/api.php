<?php

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

$router->post('login', 'Auth\LoginController@login');

// USERS
$router->get('profile', 'Auth\UserController@profile');
$router->get('users/{id}', 'Auth\UserController@singleUser');
$router->get('users', 'Auth\UserController@allUsers');