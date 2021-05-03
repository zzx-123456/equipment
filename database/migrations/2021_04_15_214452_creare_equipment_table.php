<?php
/*
 * @Author: your name
 * @Date: 2021-04-15 21:44:52
 * @LastEditTime: 2021-05-03 11:01:53
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
            $table -> string('eqm_name',50) -> notNull() -> comment('设备名称');
            $table -> string('eqm_type',50) -> comment('设备型号');
            $table -> tinyInteger('eqm_state',10) -> default('0') -> notNull() -> comment('设备状态 正常：0 不可使用：1');
            $table -> string('eqm_num',20) -> notNull() -> comment('设备编号');
            $table -> string('place',100) -> comment('设备存放位置');
            $table -> string('photo') -> comment('设备照片');
            $table -> string('describe',100) -> comment('设备描述');
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
        Schema::dropIfExists('equipment');
    }
}
