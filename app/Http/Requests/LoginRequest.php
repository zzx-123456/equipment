<?php
/*
 * @Author: your name
 * @Date: 2021-04-26 18:57:41
 * @LastEditTime: 2021-05-11 08:56:22
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Http\Requests\LoginRequest.php
 */


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
            'user_name' => 'required|min:4|max:16|exists:user,user_name',
            'password' => 'required|min:6|max:16'
        ];
    }
}
