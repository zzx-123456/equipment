<?php
/*
 * @Author: your name
 * @Date: 2021-05-03 14:48:31
 * @LastEditTime: 2021-05-22 14:32:17
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Http\Controllers\Api\EquipmentController.php
 */

namespace App\Http\Controllers\Api;

use App\Home\Equipment;
use App\Http\Controllers\BaseController;
use App\Transformers\EquipmentTransformer;
use Illuminate\Http\Request;

class EquipmentController extends BaseController
{
    /**
     * 设备列表
     */
    public function index(Request $request)
    {
        $eqm_name = $request->input('eqm_name');

        // 查找状态正常的设备
        $usable = Equipment::where('eqm_state','0');

        $equipments = $usable->when($eqm_name,function($query) use ($eqm_name){
            $query->where('eqm_name','like',"%$eqm_name%");
            })
            ->paginate(5);
        return $this->response->paginator($equipments, new EquipmentTransformer());
    }

    /**
     * 设备详情
     */
    public function show(Equipment $equipment)
    {
        return $this->response->item($equipment, new EquipmentTransformer());
    }
}