<?php
/*
 * @Author: your name
 * @Date: 2021-05-04 14:54:08
 * @LastEditTime: 2021-05-04 15:43:10
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Http\Controllers\Api\UserController.php
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    //获取用户信息
    public function userInfo(){
        return $this->response->item(auth('api')->user(), new UserTransformer());
    }

    // 更新用户信息
    public function updateUserInfo(Request $request){
        $request->validate([
            'nickname' => 'required|max:16',
            // 'avatar' => 'image',
            // 'sex' => '',
            // 'phone' => '',
        ]);

        $user = auth('api')->user();
        $user->nickname = $request->input('nickname');
        // $user->avatar = $request->input('avatar');
        // $user->sex = $request->input('sex');
        // $user->phone = $request->input('phone');
        $user->save();
        return $this->response->noContent();
    }
}
