#include <ESP8266WiFi.h>
#include <ArduinoJson.h>
 #include <Servo.h>
 #include <HttpClient.h>

 
//const char* ssid     = "TP-Link_DB6F";
//const char* password = "akupunya";
const char* ssid     = "maidiee1234@unifi";
const char* password = "napsiah1";


const char* host = "fully-grown-apprent.000webhostapp.com"; //replace it with your webhost url
String url;
  Servo servo;
 int pos = 0;
 
void setup() {
  Serial.begin(115200);
  //delay(100);
  //pinMode(BUILTIN_LED, OUTPUT);  
   //servo.write(0);
  


  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
  
  WiFi.begin(ssid, password); 
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
 
  Serial.println("");
  Serial.println("WiFi connected");  
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
  Serial.print("Netmask: ");
  Serial.println(WiFi.subnetMask());
  Serial.print("Gateway: ");
  Serial.println(WiFi.gatewayIP());

  servo.attach(D8);  //D8
   
}

void loop() {
 
  Serial.print("connecting to ");
  Serial.println(host);

  WiFiClient client;
  const int httpPort = 80;
  if (!client.connect(host, httpPort)) {
    Serial.println("connection failed");
    return;
  }

  //url = "/read_all.php?id=1";
  url = "/getdata.php";
  
  Serial.println("URl Set..");
  
 Serial.print("Requesting URL: ");
 Serial.println(url);
  
  client.print(String("GET ") + url + " HTTP/1.0\r\n" +    //changed fron http1.1 to http1.0
             "Host: " + host + "\r\n" + 
              "Connection: close\r\n\r\n");
 delay(500);
 String section="header";
  while(client.available()){

  
  
   String line = client.readStringUntil('\r');
   //Serial.print(line);
   
    // we’ll parse the HTML body here
    if (section=="header") { // headers..
 //   Serial.println("header");
     if (line=="\n") { // skips the empty space at the beginning 
     section="json";
      }
   }
   else if (section=="json") {  // print the good stuff
    //Serial.println("json");
    section="ignore";
     String result = line.substring(1);
     Serial.print(result);

     int value=HIGH;
 if(result=="{\"status\":\"1\"}")
    {
    //openDoor();
    for (pos = 0; pos <= 180; pos += 1) { // goes from 0 degrees to 180 degrees
//    // in steps of 1 degree
    servo.write(pos);              // tell servo to go to position in variable 'pos'
  delay(15);        }
     
    delay(3000);
    Serial.println("done moving");
    
     }
    
     else
     {
    // closeDoor();
    for (pos = 180; pos >= 0; pos -= 1) { // goes from 180 degrees to 0 degrees
    servo.write(pos);              // tell servo to go to position in variable 'pos'
   delay(15); }
     value=HIGH;
    delay(3000);
   
   Serial.println("done move after fail");
     }
      
     // Parse JSON
      int size = result.length() + 1;
      char json[size];
      result.toCharArray(json, size);

      StaticJsonBuffer<500> jsonBuffer;
      JsonObject& json_parsed = jsonBuffer.parseObject(json);
      if (!json_parsed.success())
      {
        Serial.println("parseObject() failed");
        return;
      }
      

       // Fetch values.
  //
  // Most of the time, you can rely on the implicit casts.
  // In other case, you can do root["time"].as<long>();
  
//  int status = json_parsed["status"];
//  
// 
//  Serial.print("Status = ");
//  Serial.println(status);
//

 
//  int value = LOW;
//  // if you press open from  the screen
//  if(status="1")  {
// openDoor();
//delay(3000);
//Serial.println("done moving");
//  }
// else{
//  closeDoor();
//    value = HIGH;
//   delay(3000);
//   Serial.println("done move after fail");
//  }
//
   //}
// //delay(3000);
//
   }   }  }   
  
 

   
  


     //function to initialize the lcd and display waiting for initialization and command
//void openDoor() {
// for (pos = 0; pos <= 180; pos += 1) { // goes from 0 degrees to 180 degrees
////    // in steps of 1 degree
//    servo.write(pos);              // tell servo to go to position in variable 'pos'
//  delay(15);                       // waits 15ms for the servo to reach the position
//}
//
//}
//
//void closeDoor() {
//   for (pos = 180; pos >= 0; pos -= 1) { // goes from 180 degrees to 0 degrees
//    servo.write(pos);              // tell servo to go to position in variable 'pos'
//   delay(15);                       // waits 15ms for the servo to reach the position
//}
//
//}
