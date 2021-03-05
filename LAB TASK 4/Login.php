
<!DOCTYPE html>
<html lang="en">
<head>
<title>Welcome</title>
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
  <h2></h2>
  <a href="Welcome.php">HOME</a> |
  <a href="Login.php">LOGIN</a> |
  <a href="Registration.php">REGISTRATION</a> 
</header>




 <?php 

session_start();

$username="salman";
$password="123";

if (isset($_POST['uname'])) {
  if ($_POST['uname']==$username && $_POST['pass']==$password) {
    $_SESSION['uname'] = $username;
    header("location:Dashboard.php");
  }
  else{
    $msg="username or password invalid";
    echo "<script>alert('uname or pass incorrect!')</script>";
  }

}

 ?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <table align="center">
    
    <tr>
      <th colspan="2"><h2>Login</h2></th>
    </tr>
    <?php if(isset($msg)){?>
        <tr>
          <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
        </tr>
      <?php } ?>
    <tr>
      <td>Username :</td>
      <td><input type="text" name="uname"></td>
    </tr>
    <tr>
      <td>Password :</td>
      <td><input type="password" name="pass"></td>
    </tr>
    <tr>
      <td align="right" colspan="2"><input type="submit" name="login" value="login"></td>
    </tr>
  </table>
  
</form>


<footer>
  <p>Copyright 2001</p>
</footer>

</body>
</html>