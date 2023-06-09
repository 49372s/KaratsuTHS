//インターバル
let intervals;


//ベルの音量を最大にする
document.getElementById('bell').volume = 1;
//ベルの鳴響ボタンが押された際
document.getElementById('playBell').onclick = ()=>{
    //ベルを流す
    $('#bell')[0].play();
    //ストップボタンを有効
    document.getElementById('stopBell').disabled = false;
    //再生ボタンを無効
    document.getElementById('playBell').disabled = true;

    //ループ制御のためにインターバルを設定する
    intervals = setInterval(()=>{
        //10秒でもとにもどす
        if(document.getElementById('bell').currentTime > 10){
            document.getElementById('bell').currentTime = 0.5;
        }
    })
}

document.getElementById('stopBell').onclick = ()=>{
    //停止ボタンが押された際にベルの再生時間を0にする
    $("#bell")[0].currentTime = 0;
    //そうすることで、この行で停止した際に、再鳴響の時バグらない
    $("#bell")[0].pause();
    //ストップボタンを無効
    document.getElementById('stopBell').disabled = true;
    //再生ボタンを有効
    document.getElementById('playBell').disabled = false;
    //メモリを解放するためにインターバルを解除する
    clearInterval(intervals);
}