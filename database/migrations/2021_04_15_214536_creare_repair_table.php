<?php
/*
 * @Author: your name
 * @Date: 2021-04-15 21:45:36
 * @LastEditTime: 2021-04-15 23:07:11
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
            $table -> integer('eqm_id') -> notNull();
            $table -> string('fault',50);
            $table -> timestamp('submit_time');
            $table -> enum('repair_state',[0,1]) -> notNull() -> default('0');
            $table -> string('repair_man',20);
            $table -> timestamp('repair_time');
            $table -> integer('user_id');
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
