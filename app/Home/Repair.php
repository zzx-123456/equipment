<?php
/*
 * @Author: your name
 * @Date: 2021-04-15 23:12:16
 * @LastEditTime: 2021-05-10 09:33:38
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Home\Repair.php
 */

namespace App\Home;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    //关联数据表
    protected $table = 'repair';

    public $timestamps = FALSE;
}
