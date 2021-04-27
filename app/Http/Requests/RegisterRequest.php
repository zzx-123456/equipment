<?php
/*
 * @Author: your name
 * @Date: 2021-04-26 10:11:29
 * @LastEditTime: 2021-04-26 18:59:15
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Http\Requests\RegisterRequest.php
 */

namespace App\Http\Requests;


class RegisterRequest extends BaseRequest
{
    /**
     * 用户注册
     */
    public function rules()
    {
        return [
            //验证规则
            'user_name' => 'required|unique:user|min:4|max:16',
            'name' => 'required|max:16',
            'password' => 'required|min:6|max:16|confirmed'
        ];
    }
}
