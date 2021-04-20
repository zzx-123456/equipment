<?php
/*
 * @Author: your name
 * @Date: 2021-04-15 23:12:16
 * @LastEditTime: 2021-04-15 23:15:53
 * @LastEditors: your name
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Home\Repair.php
 */

namespace App\Home;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    //关联数据表
    protected $table = 'repair';
    // 禁用时间字段
    public $timestamps = 'false';
}
