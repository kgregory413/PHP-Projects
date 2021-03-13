<!-- Written by Kylie Gregory for CSC306 Week 3: 11/15/2020  -->

cookiesOne.php

<!DOCTYPE html>   
<html lang="en">    <!-- open html tag -->
<head>       <!-- open head tag -->
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title> <!-- title tag -->
</head>       <!-- close head tag -->
<body>       <!-- open body tag -->

   <table>       <!-- open table tag -->

       <!-- create form -->

       <form action="cookiesOne.php" method="POST">   <!-- open form tag -->
           <tr>
               <td>User’s Name</td>
               <td><input type="text" name="username" required></td><!-- create text box for user’s name -->
           </tr>
           <tr>
               <td>User’s Age</td>
               <td><input type="text" name="age" required></td>   <!-- create text box for user’s age -->
           </tr>
              
           <tr>
               <td>User’s Gender</td>
               <td>
                   <input type="radio" name="gender" value="Male" required>Male
                   <input type="radio" name="gender" value="Female" required>Female
               </td>
           </tr>      
           <tr>
               <!-- create a Submit button to submit the form-->

               <td colspan="2" style="text-align: center;"><input type="submit" name="submit"></td>
           </tr>
       </form>       <!-- close form tag -->
   </table>       <!-- close table tag -->
</body>    <!-- close body tag -->
</html>       <!-- close html tag -->

<?php

$username = '';       // initialize the username with empty string

if(isset($_POST['submit']))       // if submit parameter exist
{
   // collect form data

$username = $_POST['username'];
$age = $_POST['age'];
$gender = $_POST['gender'];

   $cookie_value = $age.','. $gender;

$cookie_expire = time() + (60*60*24*7);

// Set a cookie that expire in a week

setcookie($username,$cookie_value,$cookie_expire);

$myfile = fopen("cookie_info.txt", "w");   // Open a file for write only

// pattern of data which will write to a file

   $mydata = $username.",".$cookie_value.",".$cookie_expire."\r\n";

   fwrite($myfile, $mydata);   // write to a file

   fclose($myfile);   // close the file

}

// display the success message if cookie is set

   if(isset($_COOKIE[$username]))
   {
   echo "Cookie is set";
   }

?>