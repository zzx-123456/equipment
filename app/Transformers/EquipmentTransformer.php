<?php
/*
 * @Author: your name
 * @Date: 2021-05-03 15:39:50
 * @LastEditTime: 2021-05-03 15:48:45
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Transformers\EquipmentTransformer.php
 */

namespace App\Transformers;

use App\Home\Equipment;
use League\Fractal\TransformerAbstract;

class EquipmentTransformer extends TransformerAbstract
{
    public function transform(Equipment $equipment)
    {
        return[
            'id' => $equipment->id,
            'eqm_name' => $equipment->eqm_name,
            'eqm_type' => $equipment->eqm_type,
            'eqm_num' => $equipment->eqm_num,
            'place' => $equipment->place,
            'photo' => $equipment->photo,
            'describe' => $equipment->describe,
        ];
    }
}
