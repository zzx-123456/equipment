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
    <input type="text" placeholder="请输入"/>
    <button>发送请求</button>
    <div></div>

    <script>
        var input = document.querySelector('input')
        var button = document.querySelector('button')
        var div = document.querySelector('div')

        var websocket = new WebSocket('ws://127.0.0.1:2346')

        websocket.addEventListener('open',function() {
            div.innerHTML = '服务连接成功了'
        })

        input.addEventListener('input',function() {
            var value = input.value
            websocket.send(value)
        })

        button.addEventListener('click',function() {
            var value = input.value
            websocket.send(value)
        })

        websocket.addEventListener('message',function(e) {
            
            // var a = JSON.parse(e.data)
            console.log(e.data)
            div.innerHTML = e.data
        })

        websocket.addEventListener('close',function() {
            div.innerHTML = '服务断开了'
        })
    </script>
</body>
</html>