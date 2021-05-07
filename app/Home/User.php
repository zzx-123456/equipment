<?php
/*
 * @Author: your name
 * @Date: 2021-04-15 23:11:42
 * @LastEditTime: 2021-05-03 15:09:39
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Home\User.php
 */

namespace App\Home;


use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    //关联数据表
    protected $table = 'user';


    // 关联预约模型，一对多
    public function order(){
        return $this -> hasMany('App\Home\Order','user_id','id');
    }

    // 关联报修模型，一对多
    public function repair(){
        return $this -> hasMany('App\Home\Repair','user_id','id');
    }


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}


