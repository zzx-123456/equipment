<?php
/*
 * @Author: your name
 * @Date: 2021-04-15 21:45:15
 * @LastEditTime: 2021-05-03 11:28:44
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
            $table -> integer('eqm_id') -> notNull() -> comment('设备ID');
            $table -> string('eqm_name',50) -> notNull() -> comment('设备名称');
            $table -> date('date') -> notNull() -> comment('预约日期');
            $table -> tinyInteger('time') -> notNull() -> comment('预约时刻 上午：0 下午：1');
            $table -> integer('user_id') -> notNull() -> comment('使用者ID');
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
        Schema::dropIfExists('order');
    }
}
