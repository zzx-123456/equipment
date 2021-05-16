<?php
/*
 * @Author: your name
 * @Date: 2021-05-05 14:35:59
 * @LastEditTime: 2021-05-10 14:47:27
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Http\Controllers\Api\OrderController.php
 */

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

    // 查看用户预约记录
    public function orderRecord(Request $request)
    {
        $user_id = $request->input('user_id');

        $records = Order::when($user_id,function($query) use ($user_id){
            $query->where('user_id',"$user_id");
            })
            ->paginate(5);

        return $this->response->paginator($records,new OrderTransformer());
    }

    // 取消预约
    public function cancel(Request $request)
    {
        $id = $request->input('id');

        Order::where('id',"$id")->delete();

        return $this->response->noContent();
    }
}
