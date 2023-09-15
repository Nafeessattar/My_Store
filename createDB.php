<?php
$DB_SERVER = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "";

$conn = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE Store";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();
?>