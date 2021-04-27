<?php


namespace App\Http\Requests;


class LoginRequest extends BaseRequest
{
    
    /**
     * 用户登录
     */
    public function rules()
    {
        return [
            //验证规则
            'user_name' => 'required|min:4|max:16',
            'password' => 'required|min:6|max:16'
        ];
    }
}
