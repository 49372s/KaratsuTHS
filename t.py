#Import gpio library
from gpiozero import Button
from gpiozero import LED
#apiリクエスト用モジュール
import requests
# sleep用モジュール
import time

# 変数を宣言する
button = Button(13)   #gpio 13を使用
led = LED(19)         #gpio 19を使用

#Mainroutine
while True:
  if ( loop == 10 ): #loop変数が10、つまり1秒経過したら状態をサーバーから取得する。本来はAsyncを用いて非同期処理をするべき
    res = requests.get("https://kths.tkngh.jp/api/get/")
    output = json.loads(res.text) #debug
    if ( output['data'] == "no" ): # もし、状態がＯＦＦの場合、LEDを消灯して火災発生前の状態に戻す
      led.off()
    loop = 0 #loopは毎0にして、秒計測をする
  if button.is_pressed: #ボタンが押されたら、LEDを点灯して、制御盤にリクエストを送信する
    led.on()
    requests.get("https://kths.tkngh.jp/api/control/?token=xxxxxxxx&mode=link")
  time.sleep(.1)
  loop = loop + 1
