<?php
/*
 * @Author: your name
 * @Date: 2021-05-12 19:45:44
 * @LastEditTime: 2021-05-15 19:27:11
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Events\Workerman\WorkermanEvent.php
 */
namespace App\Events\Workerman;

use App\Home\Equipment;
use \GatewayWorker\Lib\Gateway;
use SebastianBergmann\Environment\Console;

class Events
{
    // businessWorker进程启动事件
    public static function onWorkerStart($businessWorker)
    {
    }
    //连接事件
    public static function onConnect($client_id)
    {
        // 向当前client_id发送数据
        // Gateway::sendToClient($client_id, "Hello $client_id");
    }
    //进程退出事件
    public static function onWebSocketConnect($client_id, $data)
    {
    }
    //消息事件
    public static function onMessage($client_id, $message)
    {
        // $equipment = Equipment::all();
        // Gateway::sendToAll("$equipment");
        
         // 向所有人发送
        Gateway::sendToAll("$client_id said $message");
    }
    // 连接断开事件
    public static function onClose($client_id)
    {
    }
}