<?php
/*
 * @Author: your name
 * @Date: 2021-05-03 15:39:50
 * @LastEditTime: 2021-05-04 15:10:02
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Transformers\EquipmentTransformer.php
 */

namespace App\Transformers;

use App\Home\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return[
            'id' => $user->id,
            'user_name' => $user->user_name,
            'nickname' => $user->nickname,
            'avatar' => $user->avatar,
            'sex' => $user->sex,
            'phone' => $user->phone,
        ];
    }
}
