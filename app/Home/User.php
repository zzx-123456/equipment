<?php
/*
 * @Author: your name
 * @Date: 2021-04-15 23:11:42
 * @LastEditTime: 2021-04-15 23:26:22
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Home\User.php
 */

namespace App\Home;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //关联数据表
    protected $table = 'user';
    // 禁用时间字段
    public $timestamps = 'false';


    // 关联预约模型，一对多
    public function order(){
        return $this -> hasMany('App\Home\Order','user_id','id');
    }

    // 关联报修模型，一对多
    public function repair(){
        return $this -> hasMany('App\Home\Repair','user_id','id');
    }

}


