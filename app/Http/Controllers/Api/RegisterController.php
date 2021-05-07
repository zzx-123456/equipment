<?php
/*
 * @Author: your name
 * @Date: 2021-04-26 09:37:47
 * @LastEditTime: 2021-05-03 15:08:52
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Http\Controllers\Api\RegisterController.php
 */

namespace App\Http\Controllers\Api;

use App\Home\User;
use App\Http\Controllers\BaseController;
use App\Http\Requests\RegisterRequest;

class RegisterController extends BaseController
{
    
    // 用户注册
    public function store(RegisterRequest $request){
        $user = new User();
        $user -> user_name = $request -> input('user_name');
        $user -> password = bcrypt($request -> input('password'));
        $user -> nickname = $request -> input('nickname');
        $user -> save();
        return $this->response()->created();
    }
}
