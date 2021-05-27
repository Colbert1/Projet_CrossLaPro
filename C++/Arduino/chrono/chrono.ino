#include <Wire.h>
#include <stdio.h>
#include "rgb_lcd.h"

rgb_lcd lcd;

const int colorR = 255;
const int colorG = 0;
const int colorB = 0;
int secondes = 0, minutes = 0, heures = 0, total = 0;
char chrono[50]; 

void setup() {
    // set up the LCD's number of columns and rows:
    lcd.begin(16, 2);

    lcd.setRGB(colorR, colorG, colorB);

    // Print a message to the LCD.
    lcd.print("Chrono(hh:mm:ss)");

    pinMode(2, OUTPUT);  //On défini Trig comme une sortie
    pinMode(3, INPUT);   //On défini Echo comme une entrée

    delay(1000);
}

void loop() {
    // set the cursor to column 0, line 1
    // (note: line 1 is the second row, since counting begins with 0):
    // print the number of seconds since reset:
    secondes = (millis() / 1000) - (60 * minutes) - (3600 * heures);
    total = millis() / 1000;
    if(total%60 == 0 && secondes != 0){
      minutes++;
      secondes = 0;
    }
    if(minutes%60 == 0 && minutes != 0){
      heures++;
      minutes = 0;
    }
    lcd.setCursor(2,1);
    lcd.print(":");
    lcd.setCursor(5,1);
    lcd.print(":");
    if(heures < 10){
      lcd.setCursor(0,1);
      lcd.print("0");
      lcd.setCursor(1,1);
      lcd.print(heures);
    }else{
      lcd.setCursor(0,1);
      lcd.print(heures);
    }
    if(minutes < 10){
      lcd.setCursor(3,1);
      lcd.print("0");
      lcd.setCursor(4,1);
      lcd.print(minutes);
    }else{
      lcd.setCursor(3,1);
      lcd.print(minutes);
    }
    if(secondes < 10){
      lcd.setCursor(6,1);
      lcd.print("0");
      lcd.setCursor(7,1);
      lcd.print(secondes);
    }else{
      lcd.setCursor(6,1);
      lcd.print(secondes);
    }
}
