<?php
/*
 * @Author: your name
 * @Date: 2021-04-25 16:22:17
 * @LastEditTime: 2021-04-26 23:22:48
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\routes\api.php
 */

$api = app('Dingo\Api\Routing\Router');

// 版本为v1
$api->version('v1', function ($api) {

    // 用户登录
    $api->post('login', 'App\Http\Controllers\Api\LoginController@login');

    // 用户注册
    $api->post('register', 'App\Http\Controllers\Api\RegisterController@store');


    // 需要登录的api
    $api->group(['middleware' => 'api.auth'], function($api){
        
        // 退出登录
        $api->post('logout','App\Http\Controllers\Api\LoginController@logout');

        // 刷新token
        $api->post('refresh','App\Http\Controllers\Api\LoginController@refresh');

    });
});