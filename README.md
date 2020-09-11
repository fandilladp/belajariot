# belajariot
projek open source 

projek ini memberikan contoh paling sederhana bagaimana anda bisa berinteraksi dengan mikrokontroler melalui internet

# software yang digunakan
  1. install xampp sebagai server dan database
  2. arduino ide 
  3. text editor

kamu tidak perlu membuat database dalam projek kali ini, karna program akan membuat database secara otomatis, kamu bisa merubah nama database sesuai kebutuhan di dalam function.php

untuk penyesuaian penggunaan mikrokontroler, jika kamu menggunakan arduino + esp silahkan gunakan file arduino, dan 
jika kamu menggunakan node mcu silahkan gunakan sourcecode di folder nodemcu

saran gunakan node mcu karna penggunaannya lebih mudah  :)
semoga berhasil .....

jika kamu sudah bisa memahami projek ini kamu bisa melanjutkannya menggunakan framework dan menggunakan RestFull API pertukaran datanya

# mengenal Rest
REST (REpresentational State Transfer) merupakan standar arsitektur komunikasi berbasis web yang sering diterapkan dalam pengembangan layanan berbasis web. Umumnya menggunakan HTTP (Hypertext Transfer Protocol) sebagai protocol untuk komunikasi data. REST pertama kali diperkenalkan oleh Roy Fielding pada tahun 2000.

Pada arsitektur REST, REST server menyediakan resources (sumber daya/data) dan REST client mengakses dan menampilkan resource tersebut untuk penggunaan selanjutnya. Setiap resource diidentifikasi oleh URIs (Universal Resource Identifiers) atau global ID. Resource tersebut direpresentasikan dalam bentuk format teks, JSON atau XML. Pada umumnya formatnya menggunakan JSON dan XML.

Keuntungan REST

    bahasa dan platform agnostic
    lebih sederhana/simpel untuk dikembangkan ketimbang SOAP
    mudah dipelajari, tidak bergantung pada tools
    ringkas, tidak membutuhkan layer pertukaran pesan (messaging) tambahan
    secara desain dan filosofi lebih dekat dengan web

Kelemahan REST

    Mengasumsi model point-to-point komunikasi - tidak dapat digunakan untuk lingkungan komputasi terdistribusi di mana pesan akan melalui satu atau lebih perantara
    Kurangnya dukungan standar untuk keamanan, kebijakan, keandalan pesan, dll, sehingga layanan yang mempunyai persyaratan lebih canggih lebih sulit untuk dikembangkan ("dipecahkan sendiri")
    Berkaitan dengan model transport HTTP

Berikut metode HTTP yang umum digunakan dalam arsitektur berbasis REST.

    GET, menyediakan hanya akses baca pada resource
    PUT, digunakan untuk menciptakan resource baru
    DELETE, digunakan untuk menghapus resource
    POST, digunakan untuk memperbarui resource yang ada atau membuat resource baru
    OPTIONS, digunakan untuk mendapatkan operasi yang disupport pada resource

Web service adalah standar yang digunakan untuk melakukan pertukaran data antar aplikasi atau sistem, karena aplikasi yang melakukan pertukaran data bisa ditulis dengan bahasa pemrograman yang berbeda atau berjalan pada platform yang berbeda. Contoh implementasi dari web service antara lain adalah SOAP dan REST.

Web service yang berbasis arsitektur REST kemudian dikenal sebagai RESTful web services. Layanan web ini menggunakan metode HTTP untuk menerapkan konsep arsitektur REST.

Cara Kerja RESTful web services
komunikasi client server bahasan RESTful Web Services by feridi (codepolitan)

Sebuah client mengirimkan sebuah data atau request melalui HTTP Request dan kemudian server merespon melalui HTTP Response. Komponen dari http request :

    Verb, HTTP method yang digunakan misalnya GET, POST, DELETE, PUT dll.
    Uniform Resource Identifier  (URI) untuk mengidentifikasikan lokasi resource pada server.
    HTTP Version, menunjukkan versi dari HTTP yang digunakan, contoh HTTP v1.1.
    Request Header, berisi metadata untuk HTTP Request. Contoh, type client/browser, format yang didukung oleh client, format dari body pesan, seting cache dll.
    Request Body, konten dari data.

Sedangkan komponen dari http response :

    Status/Response Code, mengindikasikan status server terhadap resource yang direquest. misal : 404, artinya resource tidak ditemukan dan 200 response OK.
    HTTP Version, menunjukkan versi dari HTTP yang digunakan, contoh HTTP v1.1.
    Response Header, berisi metadata untuk HTTP Response. Contoh, type server, panjang content, tipe content, waktu response, dll
    Response Body, konten dari data yang diberikan.

Referensi

    Gambar 1 bbci.co.uk
    RESTful Web Services - Introduction
    hafidmukhlasin.com


 

