
<?php include '../controller/REGISTRATIONPHP.php';?>



<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<title>Registration</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include '../Controller/CSS.php';?>
</head>
<body>


<?php include '../Controller/header.php';?>
<section>
  
  <article>
    <h1>Registration</h1>
<p><span class="error" style="color:Tomato;" >* required field</span></p>
<form method="post" action="../Controller/REGISTRATIONPHP.php">  
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Username: <input type="text" name="username">
  <span class="error">* <?php echo $unameErr;?></span>
  <br><br>
    Password: <input type="text" name="password">
  <span class="error">* <?php echo $passErr;?></span>
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

  Institution: <input type="text" name="institution">
  <span class="error">* <?php echo $institutionErr;?></span>
  <br><br>

  Company: <input type="text" name="company">
  <span class="error">* <?php echo $companyErr;?></span>
  <br><br>

  Choose User:
  <input type="checkbox" name="user" value="student">Student</input>
  <input type="checkbox" name="user" value="faculty">Faculty</input>
  <input type="checkbox" name="user" value="alumni">Alumni</input>
  <span class="error">*<?php echo $userErr;?></span>
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
  <input type="submit" name = "REGISTRATIONPHP" value="Create">
  <input type="reset"> 
  </article>
</section>



<?php include '../controller/FOOTER.php';?>

</body>
</html>