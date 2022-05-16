<?php

  $serverName = "localhost";
  $dBUsername = "root";
  $dBPassword = "";
  $dBName = "total_orders";

  $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli ="DELETE FROM pending WHERE id=$id";
    $result = mysqli_query($conn,$mysqli) or die ( mysqli_error($conn));

    header("Location: pending_orders.php");
  }

  if (isset($_GET['confirm'])){
    $id = $_GET['confirm'];
    
    $mysqli1 = "INSERT INTO total SELECT * FROM  pending WHERE id =$id" ;// copy one the particular row from table to another table
    $mysqli2 = "DELETE FROM pending WHERE id=$id";

    $result1 = mysqli_query($conn,$mysqli1) or die ( mysqli_error($conn));
    $result2 = mysqli_query($conn,$mysqli2) or die ( mysqli_error($conn));

    header("Location: total_orders.php");
  }

?>