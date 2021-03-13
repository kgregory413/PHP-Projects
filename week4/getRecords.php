<!DOCTYPE html>

<?php

$servername = "localhost";

$username = "helper";

$password = "feelBetter";

$dbname = "doctorWho";

// Create connection

$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection

if ($conn->connect_error) {

die("Connection failed: " . $conn->connect_error);

}

?>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

table {

font-family: arial, sans-serif;

border-collapse: collapse;

width: 100%;

}

td, th {

border: 1px solid #dddddd;

text-align: left;

padding: 8px;

}

tr{

background-color: #dddddd;

}

</style>

<title>Display Records</title>

</head>

<body>

<h1>Display Records</h1>

<table>

<tr style='background-color: #fefefe;'>

<th>Amount Billed</th>

<th>Amount Paid</th>

<th>Date Paid</th>

<th>Insurance</th>

</tr>

<?php

$sql = "SELECT * FROM billing ;";

$result = $conn->query($sql);

if($result->num_rows>0){

$i=0;

while($row = $result->fetch_assoc()){

if($i%2==0){

echo "<tr> <td>".$row['billing']."</td>

<td>".$row['amount_billed']."</td>

<td>".$row['amount_paid']."</td>

<td>".$row['date_paid']."</td>

<td>".$row['insurance']."</td>

<td>".$row['dob']."</td></tr>";

}else{

echo "<tr style='background-color: #fefefe;'> <td>".$row['billing']."</td>

<td>".$row['amount_billed']."</td>

<td>".$row['amount_paid']."</td>

<td>".$row['date_paid']."</td>

<td>".$row['insurance']."</td><tr>";

}

$i++;

}

}else{

echo "Not found";

}

?>

</table>

<table>

<tr style='background-color: #fefefe;'>

<th>Date Prescribed</th>

<th>Medication Name</th>

<th>Quantity</th>

<th>Description</th>

</tr>

<?php

$sql = "SELECT * FROM medications ;";

$result = $conn->query($sql);

if($result->num_rows>0){

$i=0;

while($row = $result->fetch_assoc()){

if($i%2==0){

echo "<tr> <td>".$row['medications']."</td>

<td>".$row['date_prescribed']."</td>

<td>".$row['med_name']."</td>

<td>".$row['quantity']."</td>

<td>".$row['description']."</td></tr>";

}else{

echo "<tr style='background-color: #fefefe;'> <td>".$row['medications']."</td>

<td>".$row['date_prescribed']."</td>

<td>".$row['med_name']."</td>

<td>".$row['quantity']."</td>

<td>".$row['description']."</td></tr>";

}

$i++;

}

}else{

echo "Not found";

}

?>

</table>

<table>

<tr style='background-color: #fefefe;'>

<th>Name</th>

<th>Address</th>

<th>Age</th>

<th>Gender</th>

<th>Marital Status</th>

</tr>

<?php

$sql = "SELECT * FROM patients ;";

$result = $conn->query($sql);

if($result->num_rows>0){

$i=0;

while($row = $result->fetch_assoc()){

if($i%2==0){

echo "<tr> <td>".$row['patients']."</td>

<td>".$row['name']."</td>

<td>".$row['address']."</td>

<td>".$row['age']."</td>

<td>".$row['gender']."</td>

<td>".$row['marital_status']."</td></tr>";

}else{

echo "<tr style='background-color: #fefefe;'> <td>".$row['patients']."</td>

<td>".$row['name']."</td>

<td>".$row['address']."</td>

<td>".$row['age']."</td>

<td>".$row['gender']."</td>

<td>".$row['marital_status']."</td></tr>";

}

$i++;

}

}else{

echo "Not found";

}

?>

</table>

</body>

</html>
