<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
.groove {border-style: groove;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $birthdayErr = $genderErr = $checkArrErr= $bloodgroupErr = "";
$name = $email = $birthday = $gender = $checkArr = $bloodgroup = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["birthday"])) {
    $birthdayErr = "birthday is required";
  } else {
    $birthday = test_input($_POST["birthday"]);
  }



  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

  if (empty($_POST["checkArr"])) {
    $checkArrErr = "Degree is required";
  } else {
     $checkArr = ($_POST["checkArr"]);
    if (count($checkArr) < 2){
 echo "please select at least two fields";
}

 
  }




  if (empty($_POST["bloodgroup"])) {
    $bloodgroupErr = "Degree is required";
  } else {
    $bloodgroup = test_input ($_POST["bloodgroup"]);
  }



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Designing HTML form using PHP with validation of user inputs</h2>
 <div class="container mt-5">
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <p class="groove">
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>

  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>

  Birthday: <input type="date" name="birthday" value="<?php echo $email;?>">
  <span class="error">* <?php echo $birthdayErr;?></span>
  <br><br>


  Degree:   <input type="checkbox" id="degree1" name="checkArr[]" value="SSC"> 
  <label for="checkArr[]"> SSC</label>
  <input type="checkbox" id="degree2" name="checkArr[]" value="HSC">
  <label for="checkArr[]"> HSC</label>
  <input type="checkbox" id="degree3" name="checkArr[]" value="Bsc">
  <label for="checkArr[]"> Bsc</label><br><br> 


  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span><br><br>


 Blood group:
<select id="blood" name="bloodgroup">
  <option value="A+">A+</option>
  <option value="A-">A-</option>
  <option value="b+">b+</option>
  <option value="b-">b-</option>
</select>

  <br><br>
  <br><input type="submit" name="submit" value="Submit">  
  </p>
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $birthday;
echo "<br>";
 if(isset($_POST['submit'])){
          if(!empty($_POST['checkArr'])){
            foreach($_POST['checkArr'] as $checked){
              echo $checked . '<br>';
            }
          } else {
            echo '<div class="error">Checkbox is not selected!</div>';
          }
      }
echo $gender;
echo "<br>";
echo $bloodgroup;

?>

</body>
</html>

