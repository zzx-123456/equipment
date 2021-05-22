<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>实时监控</title>
    <style>
        .form{
            display: flex;
            flex-direction: column;
            padding: 50px 50px;
        }

        .item{
            height: 80px;
            width: 400px;
            display: flex;
        }

        .title{
            width: 60px;
            margin: 0 auto;
            text-align: center;
            align-items: center;
            font-size:1.5em;
        }

        .show1{
            width: 200px;
            height: 40px;
            font-size:1.5em;
            text-align: center;
            border: 1px solid black;
        }
        .show2{
            width: 200px;
            height: 40px;
            font-size:1.5em;
            text-align: center;
            border: 1px solid black;
        }
        .show3{
            width: 200px;
            height: 40px;
            font-size:1.5em;
            text-align: center;
            border: 1px solid black;
        }
        .show4{
            width: 200px;
            height: 40px;
            font-size:1.5em;
            text-align: center;
            border: 1px solid black;
        }
        .show5{
            width: 200px;
            height: 40px;
            font-size:1.5em;
            text-align: center;
            border: 1px solid black;
        }
        .show6{
            width: 200px;
            height: 40px;
            font-size:1.5em;
            text-align: center;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div class="form">
        <div class="item">
            <div class="title">电压</div>
            <div class="show1"></div>
            <div class="title">V</div>
        </div>
        <div class="item">
            <div class="title">电流</div>
            <div class="show2"></div>
            <div class="title">A</div>
        </div>
        <div class="item">
            <div class="title">压力</div>
            <div class="show3"></div>
            <div class="title">N</div>
        </div>
        <div class="item">
            <div class="title">频率</div>
            <div class="show4"></div>
            <div class="title">Hz</div>
        </div>
        <div class="item">
            <div class="title">转速</div>
            <div class="show5"></div>
            <div class="title">n/min</div>
        </div>
        <div class="item">
            <div class="title">温度</div>
            <div class="show6"></div>
            <div class="title">℃</div>
        </div>
    </div>

    <script>
        var voltage = document.querySelector("div.show1")
        var current = document.querySelector("div.show2")
        var pressure = document.querySelector("div.show3")
        var frequency = document.querySelector("div.show4")
        var speed = document.querySelector("div.show5")
        var temp = document.querySelector("div.show6")

        // 创建一个新的Websocket连接
        var websocket = new WebSocket('ws://127.0.0.1:2346')
        // 监听Websocket连接
        websocket.addEventListener('open',function() {
            console.log('服务连接成功了') //调试器打印连接成功消息
        })
        // 监听服务端发送的消息
        websocket.addEventListener('message',function(e) {
            // var a = JSON.parse(e.data)
            // console.log(e.data) //调试器打印服务器发来的消息
            var arr = e.data;
            var newArr = arr.slice(1);
            console.log(newArr);
            if (e.data[0]==1) {
                voltage.innerHTML = newArr
            }else if(e.data[0]==2){
                current.innerHTML = newArr
            }else if(e.data[0]==3){
                pressure.innerHTML = newArr
            }else if(e.data[0]==4){
                frequency.innerHTML = newArr
            }else if(e.data[0]==5){
                speed.innerHTML = newArr
            }else if(e.data[0]==6){
                temp.innerHTML = newArr
            }
        })
        // 监听服务器断开事件
        websocket.addEventListener('close',function() {
            console.log('服务断开了')
        })
    </script>
</body>
</html>