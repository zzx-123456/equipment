<?php
/*
 * @Author: your name
 * @Date: 2021-05-12 19:41:59
 * @LastEditTime: 2021-05-15 15:36:49
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Console\Commands\WorkermanCommand.php
 */
namespace App\Console\Commands;
use GatewayWorker\BusinessWorker;
use GatewayWorker\Gateway;
use GatewayWorker\Register;
use Illuminate\Console\Command;
use Workerman\Worker;
use App\Events\Workerman\Events;
class WorkermanCommand extends Command
{
    // protected $signature = 'workman {action} {--d}';
    // protected $description = 'Start a Workerman server.';
    // public function handle()
    // {
    //     global $argv;
    //     $action = $this->argument('action');
    //     $argv[0] = 'wk';
    //     $argv[1] = $action;
    //     $argv[2] = $this->option('d') ? '-d' : '';
    //     $this->start();
    // }

    protected $signature = 'workerman
                            {action : action}
                            {--start=all : start}
                            {--d : daemon mode}';

    public function handle() {
        global $argv;
        $action = $this->argument('action');
        /**
         * 针对 Windows 一次执行，无法注册多个协议的特殊处理
         */
        if ($action === 'single') {
            $start = $this->option('start');
            if ($start === 'register') {
                $this->startRegister();
            } elseif ($start === 'gateway') {
                $this->startGateWay();
            } elseif ($start === 'worker') {
                $this->startBusinessWorker();
            }
            Worker::runAll();

            return;
        }

        /**
         * argv[0] 默认是，当前文件，可以不修改
         */
        //$argv[0] = 'wk';
        $argv[1] = $action;
        // 控制是否进入 daemon 模式
        $argv[2] = $this->option('d') ? '-d' : '';

        $this->start();
    }
    
    private function start()
    {
        $this->startGateWay();
        $this->startBusinessWorker();
        $this->startRegister();
        Worker::runAll();
    }
    private function startBusinessWorker()
    {
        $worker                  = new BusinessWorker();
        //work名称
        $worker->name            = 'BusinessWorker';
        //businessWork进程数
        $worker->count           = 2;
        //服务注册地址
        $worker->registerAddress = '127.0.0.1:1236';
        //设置\App\Events\Workerman\Events类来处理业务
        $worker->eventHandler    = Events::class;
    }
    private function startGateWay()
    {  
        // $context = array(
        //     // 更多ssl选项请参考手册 http://php.net/manual/zh/context.ssl.php
        //     'ssl' => array(
        //         // 请使用绝对路径
        //         'local_cert'                 => 'D:phpstudy_pro/WWW/equipment/server-cert.pem', // 也可以是crt文件
        //         'local_pk'                   => 'D:phpstudy_pro/WWW/equipment/server-key.pem',
        //         'verify_peer'               => false,
        //         // 'allow_self_signed' => true, //如果是自签名证书需要开启此选项
        //     )
        // );
        //gateway进程
        // $gateway = new Gateway("websocket://0.0.0.0:2346", $context);
        $gateway = new Gateway("websocket://0.0.0.0:2346");
        //gateway名称 status方便查看
        $gateway->name                 = 'Gateway';
        //gateway进程
        $gateway->count                = 2;
        //本机ip
        $gateway->lanIp                = '127.0.0.1';
        //内部通讯起始端口，如果$gateway->count = 4 起始端口为2300
        //则一般会使用 2300，2301 2个端口作为内部通讯端口
        $gateway->startPort            = 2300;
        //心跳间隔
        $gateway->pingInterval         = 30;
        //客户端连续$pingNotResponseLimit次$pingInterval时间内不发送任何数据则断开链接，并触发onClose。
        //我们这里使用的是服务端主动发送心跳所以设置为0 
        $gateway->pingNotResponseLimit = 0;
        //心跳数据
        $gateway->pingData             = '{"type":"@heart@"}';
        //服务注册地址
        $gateway->registerAddress      = '127.0.0.1:1236';
        // // 开启SSL，websocket+SSL 即wss
        // $gateway->transport = 'ssl';
    }
    private function startRegister()
    {
        new Register('text://0.0.0.0:1236');
    }
}