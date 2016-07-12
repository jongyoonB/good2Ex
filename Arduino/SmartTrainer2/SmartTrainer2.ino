#include <SoftwareSerial.h>  

int bluetoothTx = 6;  // TX-O pin of bluetooth mate, Arduino D2
int bluetoothRx = 7;  // RX-I pin of bluetooth mate, Arduino D3

SoftwareSerial bluetooth(bluetoothTx, bluetoothRx);

#define BUFFER_SIZE 10

unsigned long queue1[BUFFER_SIZE + 1] = {0};
unsigned long queue2[BUFFER_SIZE + 1] = {0};

void setup()
{
   Serial.begin(9600);  // Begin the serial monitor at 9600bps
   delay(100);  // Short delay, wait for the Mate to send back CMD
   bluetooth.begin(9600);  // Start bluetooth serial at 9600
}

int counter = 1;
unsigned long sum_1 = 0;
unsigned long sum_2 = 0;

void loop()
{
  queue1[counter] = analogRead(A0);
  queue2[counter] = analogRead(A1);
   ++counter;


 if(counter > BUFFER_SIZE)
  {
    sum_1 = 0;
    sum_2 = 0;
   
    for(int iCount = 1 ; iCount < BUFFER_SIZE ; iCount++) {
      sum_1 += queue1[iCount];
      sum_2 += queue2[iCount]; 
    }

    unsigned int mesasured_value1 = (unsigned int)(sum_1/(float)(counter-1));
    unsigned int mesasured_value2 = (unsigned int)(sum_2/(float)(counter-1));
/*    
    Serial.print("Sensor_1:");
    Serial.println(mesasured_value1);
    Serial.print("Sensor_2:");
    Serial.println(mesasured_value2);
*/

  //  수정 값
     mesasured_value1 = 950;
     mesasured_value2 = 600;
    Serial.print("Sensor_1:");
    Serial.println(mesasured_value1);
    Serial.print("Sensor_2:");
    Serial.println(mesasured_value2);
    
    mesasured_value1 |= 0x1000;
    mesasured_value2 |= 0x2000;

    bluetooth.println(mesasured_value1);
    bluetooth.println(mesasured_value2);

/*
    Serial.print("Sensor_1:");
    Serial.println(mesasured_value1);
    Serial.print("Sensor_2:");
    Serial.println(mesasured_value2);
*/

    counter = 0;
    memset(queue1, 0, BUFFER_SIZE);
    memset(queue2, 0, BUFFER_SIZE);
  }
  
  delay(10);
}
