
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<title>Welcome</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php include '../Controller/CSS.php';?>

</head>
<body>


<?php include '../Controller/header.php';?>

<section>
  
  <article>

<?php include '../controller/LOGINPHP.php';?>

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
			<td>Username</td>
			<td><input type="text" name="Username"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="Password"></td>
		</tr>
		<tr>
			<td align="right" colspan="2"><input type="submit" class="btn btn-success" name="login" value="login"></td>
		</tr>
	</table>
	
</form>

  </article>
</section>

<?php include '../controller/FOOTER.php';?>

</body>
</html>