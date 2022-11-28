

//Configuracion del servidor y Wifi
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include <string>
const char *ssid = "Diego"; //Nombre de la red
const char *password = "12345098"; //Contraseña de la red
const char *server = "https://amorcito.mx"; //Nombre del servidor
const int port = 3306; //Puerto del servidor
const int interval = 5000; //Intervalo de envio de datos
String phpDir = "/Data.php"; //Direccion del archivo php para enviar datos
String setupDir = "/Setup.php"; //Direccion del archivo php de configuracion
unsigned long milisegundosActuales = millis(); //Milisegundos actuales
bool status = false; //Establecemos status del humidificador
WiFiClient client; //Cliente
HTTPClient http; //Cliente http




//Configuracion del sensor
#include "DHT.h"
#define dht_pin D5 //Seleccionamos el pin
#define dht_type DHT11 //Seleccionamos el tipo de sensor
DHT dht(dht_pin, dht_type);


void setup() {
  Serial.begin(9600); //Iniciamos la comunicación serial

  //Conectamos a la red WiFi
  WiFi.begin(ssid, password);
  while(WiFi.status() != WL_CONNECTED){
    delay(500);
    Serial.print(".");
  }

  Serial.println("Conectando a la red WiFi");
  Serial.println(ssid);
  Serial.print("Direccion Ip:");
  Serial.println(WiFi.localIP());

  dht.begin(); //Iniciamos el sensor


  //Configuramos pin de salida
  pinMode(D1,OUTPUT);
  delay(1000);

}

void loop(){
  float hum = dht.readHumidity(); //Leemos la humedad
  float temp = dht.readTemperature(); //Leemos la temperatura

  unsigned long milisegundos = millis();

  // if (milisegundos - milisegundosActuales > interval){
  //   milisegundosActuales = milisegundos;
  //   String path;

  //   path = "http://amorcito.mx/Data.php?temperatura=" + String(temp) +  "&humedad=" + String(hum);
  //   Serial.print(path);
  //   enviarDatos(path);
  // }
  Serial.println(hum);
  

  if(hum < 65 && status == false){
    digitalWrite(D1, HIGH);   
    delay(100);              //pulso
    digitalWrite(D1, LOW);  
    status = true; 
    Serial.print("prendido");
  }
  if(hum > 75 && status == true){
    digitalWrite(D1,HIGH);
    delay(3000);
    digitalWrite(D1, LOW);
    status = false;
    Serial.print("apagado");
  }
  delay(5000);

}



/**
 * @brief Envia la informacion al servidor
 * 
 * @param informacion a enviar
 */

void enviarDatos(String path){

  http.begin(client, path);

  int httpResponseCode = http.GET();
      
      if (httpResponseCode>0) {
        Serial.print("HTTP Response code: ");
        Serial.println(httpResponseCode);
      }
      else {
        Serial.print("Error code: ");
        Serial.println(httpResponseCode);
      }

  unsigned long timeout = millis();

  // Wait for response
  while (client.available() == 0)
  {
    if (millis() - timeout > 5000)
    {
      Serial.println(">>> Client Timeout !");
      client.stop();
      return;
    }
  }


  }