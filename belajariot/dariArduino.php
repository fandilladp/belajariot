<?php
  include("function.php");
   
  $conn = databaseConnect();
   
  if(isset($_GET["variabel"]) && isset($_GET["nilai"]))
  {
    // Simpan data yang diterima ke database
    $variabel = $_GET["variabel"];
    $nilai = $_GET["nilai"];
 
    $sql = "INSERT INTO arduino_data (variabel, nilai) VALUES ('".$variabel."', '".$nilai."')";
 
    if ($conn->query($sql) === TRUE) {
      echoDebug("New record created successfully</br>");
    } else {
      echoDebug("Error: " . $sql . "<br>" . $conn->error);
    }
  }
  $conn->close();
