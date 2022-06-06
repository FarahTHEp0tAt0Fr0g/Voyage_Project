<?php
$q = $_REQUEST["q"];

$servername = "localhost";
$username = "root";
$password = "mysql";
$db = "voyage";

  $conn = new mysqli($servername, $username, $password, $db);

  $query = "SELECT email FROM customers WHERE email = '$q';";
    $result = $conn -> query($query);
    while($row = $result->fetch_assoc()) {
        if($row['email'] == $q){
          echo "There is an active booking with this email.";
          break;
        }
    }
?>