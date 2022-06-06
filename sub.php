<?php
$q = $_REQUEST["q"];

$servername = "localhost";
$username = "root";
$password = "mysql";
$db = "voyage";

  $conn = new mysqli($servername, $username, $password, $db);

  $query = "SELECT email FROM subscribers WHERE email = '$q';";
    $result = $conn -> query($query);
    while($row = $result->fetch_assoc()) {
        if($row['email'] == $q){
          echo "Email is already subscribed.";
          break;
        }
    }
?>