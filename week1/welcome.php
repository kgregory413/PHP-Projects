<?php>

// Verifies that the user has submitted a correct username and password. If they have,
they are logged in and a session is started. If not, they are redirected to the login
page with instructions to try again or make an account.
if($_POST["username"]=="php" && $_POST["password"]=="php)
[
session_start();
$_SESSION["Login"]="YES";
echo"<h1>You are logged in correctly!</h1>";
echo"<p><a red="week2.html">Click Next</a><p/>
]
else [
echo"<h1>You may have entered the wrong information, or you are a new customer.</h1>";
echo"<p><a href="welcome.php">Click on New Customer</a><p/>;
]
?>
</body>