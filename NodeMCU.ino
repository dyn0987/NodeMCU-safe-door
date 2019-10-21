#include <ESP8266WiFi.h>

#include <ESP8266HTTPClient.h>

#include<ArduinoJson.h>

#include <Servo.h>



const char * ssid = "xxxxxxx";
const char * password = "xxxxxx";
const char * host = "maker.ifttt.com";
const int httpsPort = 443;
Servo servo;
int pos = 0;

void setup() {
  pinMode(D0, OUTPUT); //red
  pinMode(D1, OUTPUT); //yellow
  pinMode(D2, OUTPUT); //green
  Serial.begin(115200);

  Serial.print("Connecting to wifi");
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("\r\nWiFi connected.");
  Serial.println("access point:");
  Serial.println(WiFi.SSID());
  Serial.println("ip address:");
  Serial.println(WiFi.localIP());

  servo.attach(D8); //D8

  digitalWrite(D0, HIGH); //red
  digitalWrite(D1, HIGH);
  digitalWrite(D2, HIGH);
  delay(2000);
  digitalWrite(D0, LOW); //red
  digitalWrite(D1, LOW);
  digitalWrite(D2, LOW);

  // wait for WiFi connection

}
void loop() {
  if (WiFi.status() == WL_CONNECTED) {

    HTTPClient http;
    WiFiClientSecure client;

    http.begin("https://fully-grown-apprent.000webhostapp.com/getdata.php", "5B:FB:D1:D4:49:D3:0F:A9:C6:40:03:34:BA:E0:24:05:AA:D2:E2:01");

    int httpCode = http.GET();
    if (httpCode > 0) { //Check for the returning code

      String payload = http.getString();
      Serial.println(httpCode);
      Serial.println(payload);

      // Parse JSON

      StaticJsonBuffer < 500 > jsonBuffer;
      JsonObject & json_parsed = jsonBuffer.parseObject(payload);
      if (!json_parsed.success()) {
        Serial.println("parseObject() failed");
        Serial.println("No data");

        digitalWrite(D0, LOW);
        digitalWrite(D1, HIGH); //yellow
        digitalWrite(D2, LOW);
        servo.write(0);
        //closeDoor(); //for the door to close after open
        return;
      }

      // Fetch values.

      // Most of the time, you can rely on the implicit casts.
      // In other case, you can do root["time"].as<long>();

      int status = json_parsed["status"];

      Serial.print("Status = ");
      Serial.println(status);
      http.end();
      //int value = LOW;
      if (status == 0) {
        Serial.println("No");
        digitalWrite(D0, HIGH); //red
        digitalWrite(D1, LOW);
        digitalWrite(D2, LOW);

        //http request to send Telegram alert to phone
        http.begin("https://maker.ifttt.com/trigger/passwrong/with/key/i1PfqgGnzPAkrGKLeS1ZVubUqgPxe5oQ1WgAbVaNQJ9", "AA 75 CB 41 2E D5 F9 97 FF 5D A0 8B 7D AC 12 21 08 4B 00 8C");
        int httpCode = http.GET();
        http.end();

        //closeDoor();
        //value = HIGH;
        delay(3000);

      } else if (status == 1) {
        Serial.println("Yes");

        digitalWrite(D0, LOW);
        digitalWrite(D1, LOW);
        digitalWrite(D2, HIGH); //green

        servo.write(180);
        //openDoor();
        delay(3000);

      }

    } else {
      Serial.println("Error on HTTP request");
    }
    //http.end();
  } //wifi comm

  delay(10000);
} //end void loop 
void openDoor() {
  for (pos = 0; pos <= 180; pos += 2) { // goes from 0 degrees to 180 degrees
    // in steps of 1 degree
    servo.write(pos); // tell servo to go to position in variable 'pos'
    delay(15); // waits 15ms for the servo to reach the position
  }

}

void closeDoor() {
  for (pos = 180; pos >= 0; pos -= 2) { // goes from 180 degrees to 0 degrees
    servo.write(pos); // tell servo to go to position in variable 'pos'
    delay(15); // waits 15ms for the servo to reach the position
  }

}
