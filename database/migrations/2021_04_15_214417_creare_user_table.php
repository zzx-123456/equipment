<?php
/*
 * @Author: your name
 * @Date: 2021-04-15 21:44:17
 * @LastEditTime: 2021-05-03 11:01:25
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
            $table -> string('user_name',50) -> notNull() -> comment('用户名');
            $table -> string('nickname',255) -> notNull() -> comment('昵称');
            $table -> string('password',255) -> notNull() -> comment('密码');
            $table -> string('avatar',255) -> comment('头像');
            $table -> tinyInteger('sex',10) -> comment('性别 男：0 女：1');
            $table -> string('phone',11) -> comment('手机');
            $table -> timestamps();
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
