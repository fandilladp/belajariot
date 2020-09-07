<?php
  include("function.php");
   
  $conn = databaseConnect();
   
  // Kirim respon bila ada
  if(isset($_GET["variabel"]))
  {
    $variabel = $_GET["variabel"];
    $sql = "SELECT * FROM browser_data WHERE variabel='".$variabel."'";
 
    if($result = $conn->query($sql))
    {
      $row = $result->fetch_assoc();
      echo $row["variabel"]."=".$row["nilai"];
    }
  }
   
  $conn->close();
