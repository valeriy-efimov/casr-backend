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

$router->get('/v1/account', [
    'as'   => 'api.v1.account.index',
    'uses' => 'App\Api\v1\Account\Controller\AccountController@index'
]);
