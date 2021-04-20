<?php
/*
 * @Author: your name
 * @Date: 2021-04-15 21:45:15
 * @LastEditTime: 2021-04-15 23:05:42
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\database\migrations\2021_04_15_214515_creare_order_table.php
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreareOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //建表
        Schema::create('order',function(Blueprint $table){
            $table -> increments('id');
            $table -> integer('eqm_id') -> notNull();
            $table -> integer('order_num') -> notNull();
            $table -> timestamp('begin_time') -> notNull();
            $table -> timestamp('end_time') -> notNull();
            $table -> integer('user_id') -> notNull();
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
        Schema::dropIfExists('order');
    }
}
