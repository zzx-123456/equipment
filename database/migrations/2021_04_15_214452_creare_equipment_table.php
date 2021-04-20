<?php
/*
 * @Author: your name
 * @Date: 2021-04-15 21:44:52
 * @LastEditTime: 2021-04-15 23:05:34
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\database\migrations\2021_04_15_214452_creare_equipment_table.php
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreareEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 建表
        Schema::create('equipment',function(Blueprint $table){
            $table -> increments('id');
            $table -> string('eqm_name',50) -> notNull();
            $table -> string('eqm_type',50);
            $table -> string('eqm_state',50) -> notNull();
            $table -> integer('eqm_num') -> notNull() -> default('0');
            $table -> string('place',100);
            $table -> string('photo',100);
            $table -> string('describe',100);
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
        Schema::dropIfExists('equipment');
    }
}
