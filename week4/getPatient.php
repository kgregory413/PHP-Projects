<?php
include "db.php";

// sql query
$sql = "SELECT * FROM patients";

// execute
$result = $conn->query($sql);

// if any result
if ($result->num_rows > 0) {

        echo "<table><th>Id</th><th>Name</th><th>Address</th><th>Age</th><th>Gender</th><th>Marital Status</th>";

        while($row = $result->fetch_assoc()) {
                echo "</td><td>".$row['name']."</td><td>".$row['address']."</td><td>".$row['age']."</td><td>".$row['gender']."</td><td>".$row['marital_status']."</td></tr>";
  }
} else {
  echo "0 results";
}

// close connection
$conn->close();
?>