<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "apps";
$port = "3306";

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->error) {
    echo $conn->error;
}

if ($conn->connect_error) {
    die("Error connecting to server" . $conn->coonect_error);
} else {
   // echo "Connecting to server";
}
