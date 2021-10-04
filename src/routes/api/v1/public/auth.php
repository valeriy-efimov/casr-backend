<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * @var \Illuminate\Routing\Router $router
 */

$router->post('/v1/register', [
    'as'   => 'api.v1.auth.register',
    'uses' => 'App\Api\v1\Auth\Controller\AuthController@register'
]);
