<?php
/*
 * @Author: your name
 * @Date: 2021-05-12 19:45:44
 * @LastEditTime: 2021-05-22 16:05:01
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Events\Workerman\Events.php
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
    //连接事件，有客户端连接服务时执行
    public static function onConnect($client_id)
    {
        // 向当前client_id发送数据
        // Gateway::sendToClient($client_id, "Hello $client_id");
    }
    //进程退出事件
    public static function onWebSocketConnect($client_id, $data)
    {
    }
    //消息事件，有客户端向服务器发消息时执行
    public static function onMessage($client_id, $message)
    {
        // 向所有人发送
        // Gateway::sendToAll("$client_id said $message");
        Gateway::sendToAll("$message");
    }
    // 连接断开事件，有客户端断开连接时执行
    public static function onClose($client_id)
    {
    }
}