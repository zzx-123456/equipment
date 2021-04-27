<?php

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
        $user -> name = $request -> input('name');
        $user -> save();
        return $this->response()->created();
    }
}
