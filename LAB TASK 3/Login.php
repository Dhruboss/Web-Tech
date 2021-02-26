<!DOCTYPE html>
<html>
<body>

<?php
$unameErr = $passErr = "";
$uname = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $uppercase = preg_match('@[A-Z]@', $pass);
  $lowercase = preg_match('@[a-z]@', $pass);
  $number    = preg_match('@[0-9]@', $pass);
  $specialChars = preg_match('@[^\w]@', $pass);
  if (empty($_POST["uname"])) {
    $unameErr = "User Name is required";
  } else { 
    if (str_word_count($_POST["uname"]) ==1 && strlen($_POST["uname"])>=2) {
      $uname = test_input($_POST["uname"]);
      if (!preg_match("/^[a-z0-9.-_]/i",$uname)) {
        $unameErr = "Only alpha numeric characters, period, dash or
underscore allowed";
      }
      }
    else {
    $unameErr = "Type atleast two characters without ";
  }
  }

  if(!empty($_POST["pass"])) {
      $pass = test_input($_POST["pass"]);
      if(!preg_match("/^(?!.* )(?=.*[^a-zA-Z0-9]).{8,}$/m", $pass)) {
          $passErr="Password should include at least one special character";
        }
      if (strlen($pass) < 8){
          $passErr="Password should be at least 8 characters in length";
      }
}
  else{
  $passErr = "Password is required";   
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>




<h1>Login</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

<fieldset>
  <legend>Login:</legend>
  <label for="uname">Username:</label>
  <input type="text" id="uname" name="uname">
  <span class="error">* <?php echo $unameErr;?></span><br><br>
  <label for="pass">Password:</label>
  <input type="text" id="pass" name="pass">
  <span class="error">* <?php echo $passErr;?></span><br><br>
  <input type="submit" name="submit" value="Submit"> 
</fieldset>
</form>
<?php
echo "<h2>Your Input:</h2>";
echo $uname;
echo "<br>";
echo $pass;
echo "<br>";


?>
</body>
</html>