<style>
table {
  font-family: helvetica;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 5px;
}
</style>

<?php
  $server_name = "localhost";
  $user_name = "root";
  $password = "";
  $dbname = "landscape";


// Connect to database
$conn = new mysqli($server_name, $user_name, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }

//Declare the table body
echo "<table>
      <tr>
        <th>Customer ID</th>
        <th>Customer L Name</th>
        <th>Customer F Name</th>
        <th>Street address</th 
        <th>Service</th>
        <th>Customer Bill</th>
        <th>Amount Paid</th>
        <th>Bill Date</th>
        <th>Bill Status</th>
        <th>Message Sent(Hover to see)</th>
        </tr>";

$sql = "SELECT * FROM customer,billing where customer.customer_ID = billing.customer_ID";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $c_id = $row["customer_ID"];
    $customer_L_Name = $row["customer_L_Name"];
    $customer_F_Name = $row["customer_F_Name"];
    $customer_Title = $row["customer_Title"].", ";
    $customer_Email = $row["customer_Email"];
    $street_Address = $row["street_Address"];
    $service = $row["service"];    
    $customer_bill = $row["customer_bill"];
    $amt_paid = $row["amt_paid"];
    $bill_date = $row["bill_date"];
    $calculate = $customer_bill - $amt_paid;
    $status = "None";

    if ($calculate == 0) {
//if customer_bill - amt_paid = 0 then no dues are present
      $message = "Hey,".$customer_Title."$customer_L_Name Greetings from Lee, </br> You have no dues and I wish for continued business with you.</br> Thank You.";
      $status = "No dues";
      }

      elseif ($calculate > 0) {
        //if customer_bill - amt_paid > 0 then due of $(customer_bill - amt_paid) is present
        $message = "Hey,".$customer_Title."$customer_L_Name Greetings from Lee, </br> You have a due of $".$calculate." against your order of $service on $bill_date </br> Kindly pay your dues. \n Thank you";
        $status = "Due of $calculate";
      }

      else{
        //if customer_bill - amt_paid < 0 then credit of $ abs(customer_bill - amt_paid) is present
        $calculate = abs($calculate);
        $status = "Credit of $calculate";
        $message = "Hey,".$customer_Title."$customer_L_Name Greetings from Lee, </br> You have credit of $ $calculate and I wish for continued business with you.</br> Thank You.";
      }

      //Send the mail using mail function
      mail($customer_Email,"Mail from Lee's",$message);
      ?>
            <tr>
              <td><?php echo $c_id ?></td>
              <td><?php echo $customer_L_Name ?></td>
              <td><?php echo $customer_F_Name ?></td>
              <td><?php echo $street_Address ?></td>
              <td><?php echo $service ?></td>
              <td><?php echo $customer_bill ?></td>
              <td><?php echo $amt_paid ?></td>
              <td><?php echo $bill_date ?></td>
              <td><?php echo $status ?></td>
              <td><a href="" title="<?php echo $message ?>">Message</a></td>
            </tr>

      <?php
    }
    echo "</table>";
  } else {
    echo "0 results";
  }
?>