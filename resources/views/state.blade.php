<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>模拟参数</title>
    <style>
        .input_control{
            width:360px;
            margin:20px auto;
            display: flex;
        }
        input[type="text"],#btn1,#btn2{
            box-sizing: border-box;
            text-align:center;
            font-size:1.4em;
            height:2.7em;
            border-radius:4px;
            border:1px solid #c8cccf;
            color:#6a6f77;
            -webkit-appearance:none;
            -moz-appearance: none;
            display:block;
            outline:0;
            padding:0 1em;
            text-decoration:none;
            width:100%;
        }
        input[type="text"]:focus{
            border:1px solid #ff7496;
        }

        .title{
            width: 60px;
            margin: 0 auto;
            text-align: center;
            font-size:1.5em;
        }
    </style>
</head>
<body>
    <form action="" method="get">
        <div class="input_control">
            <div class="title">电压</div>
            <input type="text" class="listen1" placeholder=""/>
            <div class="title">V</div>
        </div>
        <div class="input_control">
            <div class="title">电流</div>
            <input type="text" class="listen2" placeholder=""/>
            <div class="title">A</div>
        </div>
        <div class="input_control">
            <div class="title">压力</div>
            <input type="text" class="listen3" placeholder=""/>
            <div class="title">N</div>
        </div>
        <div class="input_control">
            <div class="title">频率</div>
            <input type="text" class="listen4" placeholder=""/>
            <div class="title">Hz</div>
        </div>
        <div class="input_control">
            <div class="title">转速</div>
            <input type="text" class="listen5" placeholder=""/>
            <div class="title">n/min</div>
        </div>
        <div class="input_control">
            <div class="title">温度</div>
            <input type="text" class="listen6" placeholder=""/>
            <div class="title">℃</div>
        </div>
    </form>
    <script>
        var voltage = document.querySelector("input.listen1")
        var current = document.querySelector("input.listen2")
        var pressure = document.querySelector("input.listen3")
        var frequency = document.querySelector("input.listen4")
        var speed = document.querySelector("input.listen5")
        var temp = document.querySelector("input.listen6")

         // 创建一个新的Websocket连接
        var websocket = new WebSocket('ws://127.0.0.1:2346')

        // 监听Websocket连接
        websocket.addEventListener('open',function() {
            console.log('服务连接成功了') //调试器打印连接成功消息
        })

        // 监听输入框的输入事件，将输入的消息发送给服务器
        voltage.addEventListener('input',function() {
            var value =['1'+voltage.value] 
            websocket.send(value)
        })
        current.addEventListener('input',function() {
            var value =['2'+current.value] 
            websocket.send(value)
        })
        pressure.addEventListener('input',function() {
            var value =['3'+pressure.value] 
            websocket.send(value)
        })
        frequency.addEventListener('input',function() {
            var value =['4'+frequency.value] 
            websocket.send(value)
        })
        speed.addEventListener('input',function() {
            var value =['5'+speed.value] 
            websocket.send(value)
        })
        temp.addEventListener('input',function() {
            var value =['6'+temp.value] 
            websocket.send(value)
        })

        // 监听服务器断开事件
        websocket.addEventListener('close',function() {
            console.log('服务断开了')
        })
    </script>
</body>
</html>