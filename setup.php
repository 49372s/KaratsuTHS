<html lang="ja-jp">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>唐津工業高校課題研究システム初期化 | MSNIC</title>
        <link rel="stylesheet" href="/core/resource/main.css?<?php echo(time());?>">
    </head>
    <body>
        <header><h1>KTHS</h1></header>
        <div class="wrap">
            <h1>全コントロール</h1>
            <button id="allControl">初期化する</button>
            <h1>個別コントロール</h1>
            <button id="dbreset">データベースリセット</button><button id="system">システムリセット</button>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
        <script>
            const initialize = document.getElementById('allControl');
            const database = document.getElementById('dbreset');
            const system = document.getElementById('system');

            initialize.onclick = ()=>{
                $.post('/api/reset/all.php',(data)=>{
                    if(data.result == "success"){
                        window.alert("成功しました");
                    }else{
                        console.log(data);
                        window.alert("失敗しました\n"+data.result);
                    }
                })
            }
        </script>
    </body>
</html>