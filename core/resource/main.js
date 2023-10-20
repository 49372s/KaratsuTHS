//インターバル
let intervals;
let intervals_clock;

//document.getElementById().innerHTML
function dgEBI(id,string){
    document.getElementById(id).innerHTML = string;
}

//ベルの音量を最大にする
document.getElementById('bell').volume = 1;
//ベルの鳴響ボタンが押された際
document.getElementById('playBell').onclick = ()=>{
    bellPlay();
}

document.getElementById('stopBell').onclick = ()=>{
    bellStop()
}

document.getElementById('power-button').onclick = ()=>{
    document.getElementById('power').classList.replace("alert-danger","alert-success");
    $.post("/api/control/get/",(data)=>{
        if(data.result=="success"){
            document.getElementById('lamp').classList.replace("alert-success","alert-danger");
            bellPlay();
        }else{
            bellPlay()
            
        }
    })
}

window.onload = ()=>{
    intervals_clock = setInterval(()=>{
        clock()
    },500);
}

function bellPlay(){
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

function bellStop(){
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

function clock(){
    let date = new Date();
    let h = date.getHours();
    let m = date.getMinutes();
    let s = date.getSeconds();
    //数字を文字列に変換して0を頭につけるかどうかを判断する
    if(h<10){
        h = "0" + h;
    }
    if(m<10){
        m = "0" + m;
    }
    if(s<10){
        s = "0" + s;
    }
    //時計を表示する
    dgEBI("h",h);
    dgEBI("m",m);
    dgEBI("s",s);
    
}
