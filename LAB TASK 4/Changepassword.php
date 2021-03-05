<!DOCTYPE html>
<html lang="en">
<head>
<title>Dashboard</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

header {
  background-color: #666;
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: white;
}

nav {
  float: left;
  width: 30%;
  height: 300px; 
  background: #ccc;
  padding: 20px;
}


nav ul {
  list-style-type: none;
  padding: 0;
}

article {
  float: left;
  padding: 20px;
  width: 70%;
  background-color: #f1f1f1;
  height: 300px; 
}


section::after {
  content: "";
  display: table;
  clear: both;
}

footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}

@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
}
</style>
</head>
<body>


<header>
<?php 


session_start();

if (isset($_SESSION['uname'])) {
  echo "<a> logged in as ".$_SESSION['uname']."</a>";


}
else{
    $msg="error";
    header("location:login.php");
    // echo "<script>location.href='login.php'</script>";
  }

 ?>

  <a href="login.php">logout</a> 


</header>

<section>
    <nav>
       <h2>Account</h2>
    <ul>
      <li><a href="Dashboard.php">Dashboard</a></li>
      <li><a href="Viewprofile.php">View Profile</a></li>
      <li><a href="Editprofile.php">Edit Profile</a></li>
      <li><a href="Changepropic.php">Change Profile Picture</a></li>
      <li><a href="Changepassword.php">Change Password</a></li>
      <li><a href="Login.php">Logout</a></li>
    </ul>
  </nav>
  <article>

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

  </article>
</section>

<footer>
  <p>Copyright 2001</p>
</footer>

</body>
</html>