<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .input_control{
        width:360px;
        margin:20px auto;
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
    </style>
</head>
<body>
    <form action="" method="get">
        <div class="input_control">
            <input type="text" class="form_input" placeholder="Enter vendor key here"/>
        </div>
        <div class="input_control">
            <input type="text" class="form_input" placeholder="Enter room name here"/>
        </div>
        <div class="input_control">
            <input type="text" class="form_input" placeholder="Input key here if use encryption"/>
        </div>
        <div class="input_control">
            <a id="btn1"><b></b>Join</a>
        </div>
        <div class="input_control">
            <a id="btn2"><b></b>Video Options</a>
        </div>
    </form>
</body>
</html>