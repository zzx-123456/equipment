<?php
/*
 * @Author: your name
 * @Date: 2021-04-15 21:44:17
 * @LastEditTime: 2021-04-15 23:05:53
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\database\migrations\2021_04_15_214417_creare_user_table.php
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreareUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //建表
        Schema::create('user',function(Blueprint $table){
            $table -> increments('id');
            $table -> string('user_name',50) -> notNull();
            $table -> string('password',255) -> notNull();
            $table -> string('avatar',255);
            $table -> string('sex',20);
            $table -> string('phone',11);
            $table -> timestamp('reg_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //删除表
        Schema::dropIfExists('user');
    }
}
