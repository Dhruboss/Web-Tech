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


<form action="propic upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
  </article>
</section>

<footer>
  <p>Copyright 2001</p>
</footer>

</body>
</html>