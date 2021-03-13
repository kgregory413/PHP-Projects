<?php
include "db.php";

$name = $_POST["name"];
$address = $_POST["address"];
$age = $_POST["age"];
$gender = $_POST["gender"];
$marital_status = $_POST["marital_status"];

// sql query
$sql = "INSERT INTO patients (name, address, age, gender, marital_status)
VALUES ('$name', '$address', '$age', '$gender', '$marital_status')";

if ($conn->query($sql) === TRUE) {
  echo "Patient added successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// close connection
$conn->close();
?>