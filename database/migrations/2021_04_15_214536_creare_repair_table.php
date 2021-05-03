<?php
/*
 * @Author: your name
 * @Date: 2021-04-15 21:45:36
 * @LastEditTime: 2021-05-03 11:10:27
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\database\migrations\2021_04_15_214536_creare_repair_table.php
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreareRepairTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //建表
        Schema::create('repair',function(Blueprint $table){
            $table -> increments('id');
            $table -> integer('eqm_id',10) -> notNull() -> comment('故障设备ID');
            $table -> string('eqm_name',50) -> notNull() -> comment('故障设备名称');
            $table -> string('fault',50) -> comment('故障问题');
            $table -> timestamp('submit_time') -> comment('报修时间');
            $table -> tinyInteger('repair_state',10) -> notNull() -> default('0') -> comment('维修状态：0未维修 1已维修 2报废');
            $table -> string('repair_man',20) -> comment('维修人');
            $table -> dateTime('repair_time') -> comment('维修时间');
            $table -> integer('user_id',10) -> comment('报修人ID');
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
        Schema::dropIfExists('repair');
    }
}
