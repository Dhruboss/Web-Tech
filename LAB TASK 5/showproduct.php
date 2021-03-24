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

<table>
	<tr>
		<th>Name</th>
		<th>Buyingprice</th>
		<th>Sellingprice</th>

	</tr>
	<tr>
		<td><?php echo $product['Name'] ?></td>
		<td><?php echo $product['Buyingprice'] ?></td>
		<td><?php echo $product['Sellingprice'] ?></td>
	</tr>

</table>


</body>
</html>