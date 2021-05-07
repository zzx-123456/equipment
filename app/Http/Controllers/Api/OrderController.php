<?php

namespace App\Http\Controllers\Api;

use App\Home\Order;
use App\Http\Controllers\BaseController;
use App\Transformers\OrderTransformer;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
    // 查找某个设备被预约的时间段
    public function select(Request $request){
        $eqm_id = $request->input('eqm_id');
        $date = $request->input('date');
        $time = $request->input('time');

        $orders = Order::when([$date,$time,$eqm_id],function($query) use ($date,$time,$eqm_id){
            $query->where('eqm_id',"$eqm_id")->where('date',"$date")->where('time',"$time");
            })
            ->paginate();
        return $this->response->paginator($orders,new OrderTransformer());
    }

    // 预约选定的时间段使用
    public function addOrder(Request $request)
    {
        $order = new Order();
        $order -> eqm_id = $request -> input('eqm_id');
        $order -> eqm_name = $request -> input('eqm_name');
        $order -> date = $request -> input('date');
        $order -> time = $request -> input('time');
        $order -> user_id = $request -> input('user_id');
        $order -> save();
        return $this->response()->created();
    }
}
