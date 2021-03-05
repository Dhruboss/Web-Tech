<!DOCTYPE html>
<html lang="en">
<head>
<title>Registration</title>
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
  height: 400px; 
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
  height: 400px; 
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

<?php
$nameErr = $emailErr = $dobErr = $genderErr = $degreeErr = $bloodErr = "";
$name = $email = $dob = $gender = $degree = $blood = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else { 
    if (str_word_count($_POST["name"])>=2){
      $name = test_input($_POST["name"]);
      if (!preg_match("/^[a-zA-Z-' _]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
      }
  }
    else{
    $nameErr = "Type atleast two words";
  }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["dob"])) {
    $dobErr = "Date of birth is required";
  } else {
    $dob = test_input($_POST["dob"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if(!empty($_POST['degree'])) {
    if(count($_POST['degree'])<2){
    $degreeErr = "Select at least two options";
    }
    else{
          foreach($_POST['degree'] as $value){
            $degree .= $value." ";
        } 
  }
}

  if (empty($_POST["blood"])) {
    $bloodErr = "Blood Group is required";
  } else {
    $blood = test_input($_POST["blood"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<header>
  <h2></h2>
  <a href="Welcome.php">HOME</a> |
  <a href="Login.php">LOGIN</a> |
  <a href="Registration.php">REGISTRATION</a> 
</header>

<section>
  
  <article>
    <h1>Registration</h1>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Date of Birth :
  <input type="date" name="dob" placeholder="DD-MM-YYYY" ><span class="error">* <?php echo $dobErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  Degree:
  <input type="checkbox" name="degree[]" value="ssc">SSC</input>
  <input type="checkbox" name="degree[]" value="hsc">HSC</input>
  <input type="checkbox" name="degree[]" value="bsc">BSc</input>
  <input type="checkbox" name="degree[]" value="msc">MSc</input>
  <span class="error">*<?php echo $degreeErr;?></span>
  <br><br>
  Blood Group:
  <select id="blood" name="blood">
    <option value=""></option>
    <option value="ab+">AB+</option>
    <option value="a+">A+</option>
    <option value="b+">B+</option>
    <option value="o+">O+</option>
    <option value="ab-">AB-</option>
    <option value="a-">A-</option>
    <option value="b-">B-</option>
    <option value="o-">O-</option>
  </select>
  <span class="error">*<?php echo $bloodErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">
  </article>
</section>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $dob;
echo "<br>";
echo $gender;
echo "<br>";
echo $degree;
echo "<br>";
echo $blood;
?>
<footer>
  <p>Copyright 2001</p>
</footer>

</body>
</html>