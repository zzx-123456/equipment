<?php
/*
 * @Author: your name
 * @Date: 2021-05-03 15:39:50
 * @LastEditTime: 2021-05-05 14:56:00
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Transformers\EquipmentTransformer.php
 */

namespace App\Transformers;

use App\Home\Order;
use League\Fractal\TransformerAbstract;

class OrderTransformer extends TransformerAbstract
{
    public function transform(Order $order)
    {
        return[
            'id' => $order->id,
            'eqm_id' => $order->eqm_id,
            'eqm_name' => $order->eqm_name,
            'date' => $order->date,
            'time' => $order->time,
            'user_id' => $order->user_id,
        ];
    }
}
