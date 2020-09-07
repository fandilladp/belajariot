//jika kamu menggunakan nodemcu rubah cara koneksinya sesuai dengan node mcu 
//untuk logika pengiriman dan query data tetap sama
//untuk coding arduino ini saya mendapatkan di website semesin.com

#include "WiFiEsp.h"
 
char ssid[] = "ssid wifi kamu";        // Isi dengan nama profil Wifi
char pass[] = "passwordnya";            // password wifi
//char server[] = "192.168.123.1";     // alamat access point yang telah terinstall XAMPP local host
char server[] = "http://localhost/belajariot/index.php"; //buka website kamu lalu copy url nya
 
char namaVariabel[] = "Variabel";
String text = "";
String Respon = "";
bool responDariServer = false;
 
bool statusKomunikasiWifi = false;
long waktuMulai;
long waktuMintaData = 5000; //minta data setiap 5000ms
 
WiFiEspClient client;
int status = WL_IDLE_STATUS;
 
void setup()
{
  Serial.begin(9600);

  Serial1.begin(115200);
  WiFi.init(&Serial1);
 
  // check for the presence of the shield
  if (WiFi.status() == WL_NO_SHIELD) {
    Serial.println("WiFi shield not present");
    // don't continue
    while (true);
  }
 
  // attempt to connect to WiFi network
  while ( status != WL_CONNECTED) {
    Serial.print("Attempting to connect to WPA SSID: ");
    Serial.println(ssid);
    // Connect to WPA/WPA2 network
    status = WiFi.begin(ssid, pass);
  }
 
  // you're connected now, so print out the data
  Serial.println("You're connected to the network");
   
  printWifiStatus();
  waktuMulai = millis();
}
 
void loop()
{
  //tunggu imputan nilai dari untuk dikirim ke server
  while(Serial.available())
  {
    char c = Serial.read();
    if((c != '\r') && (c != '\n'))
    {
      text += c;
    }
    if(c == '\n')
    {
      statusKomunikasiWifi = kirimKeDatabase("dataDariSerial",text);
      text = "";
      waktuMulai = millis();
    }
  }
 
  if(waktuMintaData < millis() - waktuMulai)
  {
    statusKomunikasiWifi = ambilDatabase("perintah");
    waktuMulai = millis();
  }
   
  // periksa respon dari server
  if(statusKomunikasiWifi)
  {
    // if there are incoming bytes available
    // from the server, read them and print them
    while (client.available()) 
    {
      char c = client.read();
      Respon += c;
    }
   
    // if the server's disconnected, stop the client
    if (!client.connected()) {
      Serial.println("Disconnecting from server...");
      client.stop();
      statusKomunikasiWifi = false;
      responDariServer = true;
    }
  }
 
  // penanganan data yang diretima dari server
  if(responDariServer)
  {
    responDariServer = false;
    //Serial.println(Respon);
    int posisiData = Respon.indexOf("\r\n\r\n");
    String Data = Respon.substring(posisiData+4);
    Data.trim();
 
    String variabel;
    String nilai;
 
    Serial.println("Data dari server");
    posisiData = Data.indexOf('=');
    if(posisiData > 0)
    {
      variabel = Data.substring(0,posisiData);
      nilai = Data.substring(posisiData+1);
   
      //===========Penanganan respon disini
      Serial.print(variabel);
      Serial.print(" = ");
      Serial.println(nilai);
    }
    Respon = "";
  }
}
bool ambilDatabase(String variabel)
{
  Serial.println();
  Serial.println("Starting connection to server...");
  // if you get a connection, report back via serial
  if (client.connect(server, 80)) {
    Serial.println("Connected to server");
    // Make a HTTP request
    client.print("GET /arduino_mysql/keArduino.php?variabel=");
    client.print(variabel);
    client.println(" HTTP/1.1");
    client.print("Host: ");
    client.println(server);
    client.println("Connection: close");
    client.println();
 
    long _startMillis = millis();
    while (!client.available() and (millis() - _startMillis < 2000));
 
    return true;
  }
  return false;
}
 
bool kirimKeDatabase(String namaVariabel, String nilai)
{
  Serial.println();
  Serial.println("Starting connection to server...");
  // if you get a connection, report back via serial
  if (client.connect(server, 80)) {
    Serial.println("Connected to server");
    // Make a HTTP request
 
    // parameter 1
    client.print("GET /arduino_mysql/dariArduino.php?");
    client.print("variabel=");
    client.print(namaVariabel);
     
    // parameter 2 dan selanjutnya
    client.print("&");
    client.print("nilai=");
    client.print(nilai);
     
    client.println(" HTTP/1.1");
    client.print("Host: ");
    client.println(server);
    client.println("Connection: close");
    client.println();
 
    return true;
  }
  return false;
}
 
void printWifiStatus()
{
  // print the SSID of the network you're attached to
  Serial.print("SSID: ");
  Serial.println(WiFi.SSID());
 
  // print your WiFi shield's IP address
  IPAddress ip = WiFi.localIP();
  Serial.print("IP Address: ");
  Serial.println(ip);
 
  // print the received signal strength
  long rssi = WiFi.RSSI();
  Serial.print("Signal strength (RSSI):");
  Serial.print(rssi);
  Serial.println(" dBm");
 
  IPAddress gateway = WiFi.gatewayIP();
  Serial.print("gateway:");
  Serial.print(gateway);
  Serial.println(" ");
}