<?php
  $localhost = "localhost";
  $username = "root";
  $password = "developer";
  $dbname = "simsat";
  
  $conn =  mysqli_connect($localhost,$username,$password,$dbname);

  if (!$conn) {
    // echo mysqli_error($conn);
  };
  
?>