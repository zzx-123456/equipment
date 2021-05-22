<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div {
            width: 200px;
            height: 200px;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <input type="text" class="example1" placeholder="请输入"/>
    <input type="text" class="example2" placeholder="请输入"/>
    <button>发送请求</button>
    <div class="example1"></div>
    <div class="example2"></div>

    <script>
        var input = document.querySelector("input.example1")
        var i = document.querySelector("input.example2")
        var button = document.querySelector('button')
        var div = document.querySelector('div.example1')
        var d = document.querySelector('div.example2')

        // 创建一个新的Websocket连接
        var websocket = new WebSocket('ws://127.0.0.1:2346')
        // 监听Websocket连接
        websocket.addEventListener('open',function() {
            div.innerHTML = '服务连接成功了' //在div方框里提示连接成功
            console.log('服务连接成功了') //调试器打印连接成功消息
        })
        // 监听按钮点击事件
        button.addEventListener('click',function() {
            var value = input.value
            websocket.send(value) //将输入框的内容发送给服务器
        })
        // 监听服务端发送的消息
        websocket.addEventListener('message',function(e) {
            // var a = JSON.parse(e.data)
            console.log(e) //调试器打印服务器发来的消息
            var arr = e.data;
            var newArr = arr.slice(1);
            console.log(newArr);
            // console.log(e.data) //调试器打印服务器发来的消息
            if (e.data[0]==1) {
                div.innerHTML = newArr //在div方框里展示服务器发来的消息
            }else if(e.data[0]==2){
                d.innerHTML = newArr //在div方框里展示服务器发来的消息
            }
            
        })
        // 监听服务器断开事件
        websocket.addEventListener('close',function() {
            div.innerHTML = '服务断开了' //在div方框里提示断开服务
        })

        input.addEventListener('input',function() {
            var value =['1'+input.value] 
            websocket.send(value)
        })
        i.addEventListener('input',function() {
            var value = ['2'+i.value] 
            websocket.send(value)
        })
    </script>
</body>
</html>