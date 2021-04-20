<?php
/*
 * @Author: your name
 * @Date: 2021-04-12 10:27:05
 * @LastEditTime: 2021-04-16 09:24:26
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Admin\routes.php
 */

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('user', UserController::class);
    $router->resource('equipment', EquipmentController::class);
    $router->resource('order', OrderController::class);
    $router->resource('repair', RepairController::class);
});
