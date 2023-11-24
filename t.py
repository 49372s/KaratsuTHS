#Import gpio library
from gpiozero import Button
from gpiozero import LED
#sleep
import time

#define variables
button = Button(13)
led = LED(19)
on = False

#Mainroutine
while True:
  if button.is_pressed:
    if on==False:
      led.on()
      on = True
    else:
      led.off()
      on = False
  time.sleep(1)
