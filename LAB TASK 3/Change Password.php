
<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
$passwordErr = $currentPasswordErr = $confirmPasswordErr = "";
$password = $currentPassword = $confirmPassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["confirmPassword"]) && !($_POST["password"] == $_POST["currentPassword"])) {
    
    $password = test_input($_POST["password"]);
    $confirmPassword = test_input($_POST["confirmPassword"]);
    if (strlen($_POST["password"]) < 8) {
        $passwordErr = "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("@[0-9]+@",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("@[A-Z]+@",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("@[a-z]+@",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
    if (!preg_match("/^(?!.* )(?=.*[^a-zA-Z0-9]).{8,}$/m", $password)) {
      $passwordErr="Password should include at least one special character(@,#,$,%)";
    }
}
elseif(!empty($_POST["password"]) && ($_POST["password"] == $_POST["currentPassword"])) {
    $confirmPasswordErr = "Please Check You've Entered a correct Password";
} 
else {
     $passwordErr = "Please enter password   ";
}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Change Pasword</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

Current Password:<br>
<input type="password" name="currentPassword"><span id="currentPassword" class="required">
  <span class="error">* <?php echo $currentPasswordErr;?></span>
<br>
New Password:<br>
<input type="password" name="password"><span id="password" class="required">
  <span class="error">* <?php echo $passwordErr;?></span>
<br>
Retype new Password:<br>
<input type="password" name="confirmPassword"><span id="confirmPassword" class="required">
<span class="error">* <?php echo $confirmPasswordErr;?></span>
<br><br>
<input type="submit" name="submit" value="Submit">
</form>
<?php
echo "<h2>Your Input:</h2>";
echo $currentPassword;
echo "<br>";
echo $password;
?>

</body>
</html>