<?php 

require_once 'productinfo.php';
$product = fetchproduct($_GET['id']);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 <form action="updateproduct.php" method="POST" enctype="multipart/form-data">
  <label for="name">Name:</label><br>
  <input value="<?php echo $product['Name'] ?>" type="text" id="name" name="name"><br>
  <label for="surname">Buyingprice:</label><br>
  <input value="<?php echo $product['Buyingprice'] ?>" type="text" id="buyingprice" name="buyingprice"><br>
  <label for="username">Sellingprice:</label><br>
  <input value="<?php echo $product['Sellingprice'] ?>" type="text" id="sellingprice" name="sellingprice"><br>
  <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
  <input type="submit" name = "updateproduct" value="Update">
  <input type="reset"> 
</form> 

</body>
</html>