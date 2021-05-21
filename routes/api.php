<?php

$api = app('Dingo\Api\Routing\Router');

$params = [
    'middleware' => [
        'serializer:array', // 消除transformer包裹层
        'bindings' // 支持路由模型注入
    ]
];

// 版本为v1
$api->version('v1',$params, function ($api) {

    // 用户登录
    $api->post('login', 'App\Http\Controllers\Api\LoginController@login');

    // 用户注册
    $api->post('register', 'App\Http\Controllers\Api\RegisterController@store');

    // 设备列表展示
    $api->resource('equipment', \App\Http\Controllers\Api\EquipmentController::class, [
        'only' => ['index','show']
    ]);


    // 需要登录的api
    $api->group(['middleware' => 'api.auth'], function($api){
        
        // 获取用户信息
        $api->get('user','App\Http\Controllers\Api\UserController@userInfo');
        
        // 更新用户信息
        $api->put('user','App\Http\Controllers\Api\UserController@updateUserInfo');

        // 退出登录
        $api->post('logout','App\Http\Controllers\Api\LoginController@logout');

        // 刷新token
        $api->post('refresh','App\Http\Controllers\Api\LoginController@refresh');

        // 查询设备的预约记录
        $api->get('order','App\Http\Controllers\Api\OrderController@select');

        // 新增预约
        $api->put('addOrder','App\Http\Controllers\Api\OrderController@addOrder');

        // 预约记录
        $api->get('record','App\Http\Controllers\Api\OrderController@orderRecord');

        // 取消预约
        $api->delete('cancel','App\Http\Controllers\Api\OrderController@cancel');

        // 设备报修
        $api->put('addRepair','App\Http\Controllers\Api\RepairController@repair');

    });
});