<?php
/*
 * @Author: your name
 * @Date: 2021-04-15 23:11:56
 * @LastEditTime: 2021-04-26 10:06:36
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Home\Equipment.php
 */

namespace App\Home;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    //关联数据表
    protected $table = 'equipment';
    // 禁用时间字段
    public $timestamps = false;

    // 关联预约模型，一对多
    public function order(){
        return $this -> hasMany('App\Home\Order','eqm_id','id');
    }

    // 关联报修模型，一对多
    public function repair(){
        return $this -> hasMany('App\Home\Repair','eqm_id','id');
    }
}
