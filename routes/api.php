<?php

/*
|--------------------------------------------------------------------------
| API REST URLS
|--------------------------------------------------------------------------
|
*/

/**
 * AUTH Module.
 * 
 */
$router->post('login', 'Auth\LoginController@login');

$router->get('profile', 'Auth\UserController@profile');
$router->get('users/{id}', 'Auth\UserController@singleUser');
$router->get('users', 'Auth\UserController@allUsers');