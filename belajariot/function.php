  <?php

    function databaseConnect()
    {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "belajariot";


        // Create connection
        $conn = new mysqli($servername, $username, $password);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echoDebug("Connected successfully<br>");

        // Create database
        $sql = "CREATE DATABASE IF NOT EXISTS " . $database;
        if ($conn->query($sql) === TRUE) {
            echoDebug("Database created successfully<br>");
        } else {
            echoDebug("Error creating database: " . $conn->error);
        }

        // Connect to database
        $conn = new mysqli($servername, $username, $password, $database);
        // Check connection
        if ($conn->connect_error) {
            die("Database connection failed: " . $conn->connect_error);
        }
        echoDebug("Database connected successfully<br>");

        // sql to create table
        $sql = "CREATE TABLE IF NOT EXISTS arduino_data (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    variabel VARCHAR(30) NOT NULL,
    nilai VARCHAR(30) NOT NULL
    )";

        if ($conn->query($sql) === TRUE) {
            echoDebug("Table arduino_data created successfully</br>");
        } else {
            echoDebug("Error creating table: " . $conn->error);
        }
        // sql to create table
        $sql = "CREATE TABLE IF NOT EXISTS browser_data (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    variabel VARCHAR(30) NOT NULL,
    nilai VARCHAR(30) NOT NULL
    )";

        if ($conn->query($sql) === TRUE) {
            echoDebug("Table arduino_data created successfully</br>");
        } else {
            echoDebug("Error creating table: " . $conn->error);
        }
        return $conn;
    }
    function echoDebug($message)
    {
        // hapus komen '//' jika ingin men-debug pesan
        //echo $message;
    }
    ?> 