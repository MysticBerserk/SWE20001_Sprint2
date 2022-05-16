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
    $mysqli ="DELETE FROM history WHERE id=$id";
    $result = mysqli_query($conn,$mysqli) or die ( mysqli_error($conn));

    header("Location: orders_history.php");
  }

  if (isset($_POST['submit'])){
    $id = $_POST['id'];
    $option = $_POST['option'];
    
    $mysqli = "UPDATE history SET delivery='$option' WHERE id = '$id'";
    $result = mysqli_query($conn,$mysqli) or die ( mysqli_error($conn));
    
    header("Location: orders_history.php");
  }



  if (isset($_GET['save']) && isset($_GET['option'])){
    $id = $_GET['save'];
    $option = $_GET['option'];

    $mysqli = "UPDATE history SET delivery='$option' WHERE id = '$id'";
    $result = mysqli_query($conn,$mysqli) or die ( mysqli_error($conn));

    header("Location: orders_history.php");
  }

?>