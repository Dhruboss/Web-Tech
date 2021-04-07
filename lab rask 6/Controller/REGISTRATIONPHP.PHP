<?php
require_once '../Model/model.php';

 $message = '';  
 $error = ''; 
$nameErr = $unameErr = $passErr = $emailErr = $dobErr = $genderErr = $institutionErr = $companyErr = $userErr = $bloodErr = "";
$name = $uname = $pass = $email = $dob = $gender = $institution = $company = $user = $blood = "";

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



    if (empty($_POST["uname"])) {
    $unameErr = "uname is required";
  } else {
    $uname = test_input($_POST["uname"]);
  }


    if (empty($_POST["pass"])) {
    $passErr = "pass is required";
  } else {
    $pass = test_input($_POST["pass"]);
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

  if (empty($_POST["institution"])) {
    $institutionErr = "Institution name is required";
  } else {
    $institution = test_input($_POST["institution"]);
  }


   if (empty($_POST["company"])) {
    $companyErr = "Company name is required";
  } else {
    $company = test_input($_POST["company"]);
  }


    if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

 if (empty($_POST["user"])) {
    $userErr = "user Group is required";
  } else {
    $user = test_input($_POST["user"]);
  }

 if (empty($_POST["blood"])) {
    $bloodErr = "Blood Group is required";
  } else {
    $blood = test_input($_POST["blood"]);
  }




if (isset($_POST['REGISTRATIONPHP'])) {
                     $data['name' ]              =    $_POST['name'];  
                    $data[ 'uname' ]              =    $_POST['uname'];  
                    $data[ 'pass' ]         =    $_POST["pass"];
                   $data[  'email' ]         =    $_POST["email"];
                    $data[ 'dob'   ]  =    $_POST["dob"];  
                    $data[ 'gender']          =   $_POST["gender"];  
                    $data[ 'institution']     =   $_POST["institution"];  
                    $data[  'company' ]              =    $_POST['company'];  
                    $data[ 'user' ]         =   $_POST["user"];  
                     $data['blood' ]    =    $_POST["blood"] ;



  if (adduser($data)) {
    echo "Successfully added!!";
        echo "<a href ='../view/login.php'>Login</a>";
  }}
 else {
  echo 'You are not allowed to access this page.';

     
}}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>