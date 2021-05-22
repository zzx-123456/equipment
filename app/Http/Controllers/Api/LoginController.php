<?php
/*
 * @Author: your name
 * @Date: 2021-04-25 16:22:17
 * @LastEditTime: 2021-05-22 14:32:04
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Http\Controllers\Api\LoginController.php
 */


namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\LoginRequest;

class LoginController extends BaseController
{
    /**
     * 用户登录
     */
    public function login(LoginRequest $request)
    {
        // 获取用户输入的账号密码
        $credentials = request(['user_name', 'password']);
        // 验证账号密码，若认证未通过返回错误信息，认证通过返回token令牌
        if (!$token = auth('api')->attempt($credentials)) {
            return $this->response->errorUnauthorized();
        }
        return $this->respondWithToken($token);
    }
    
    /**
     * 退出登录
     */
    public function logout()
    {
        auth('api')->logout();

        return $this->response->noContent();
    }

    /**
     * 刷新token
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * 格式化返回
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}