<?php
  include("function.php");
   
  $conn = databaseConnect();
   
  if(isset($_GET["variabel"]) && isset($_GET["nilai"]))
  {
    // Simpan data yang diterima ke database
    $variabel = $_GET["variabel"];
    $nilai = $_GET["nilai"];
     
    $sql = "SELECT * FROM browser_data WHERE variabel='".$variabel."'";
    $result = $conn->query($sql);
 
    if ($result->num_rows > 0)
    {
      $sql = "UPDATE browser_data SET nilai='".$nilai."' WHERE variabel='".$variabel."'";
      if ($conn->query($sql) === TRUE) {
        echoDebug("Record updated successfully</br>");
      } else {
        echoDebug("Error updating record: " . $sql . "<br>" . $conn->error);
      }
    }
    else
    {
      $sql = "INSERT INTO browser_data (variabel, nilai) VALUES ('".$variabel."', '".$nilai."')";
      if ($conn->query($sql) === TRUE) {
        echoDebug("New record created successfully</br>");
      } else {
        echoDebug("Error: " . $sql . "<br>" . $conn->error);
      }
    }
      echo "<script type='text/javascript'> document.location = 'index.php?message=Entri data berhasil'; </script>";
    exit();
  }
  else if(isset($_GET['aksi']))
  {
    if($_GET['aksi'] == "hapus")
    {
      // sql to delete a record
      $sql = "TRUNCATE arduino_data";
 
      if ($conn->query($sql) === TRUE) {
        echoDebug("Record deleted successfully");
      } else {
        echoDebug("Error deleting record: " . $conn->error);
      }
      echo "<script type='text/javascript'> document.location = 'index.php?message=database telah dikosongkan'; </script>";
      exit();
    }
  }
  $conn->close();
