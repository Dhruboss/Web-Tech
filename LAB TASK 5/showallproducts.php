<?php  
require_once 'productinfo.php';

$product = fetchAllproducts();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Profit</th>

		</tr>
	</thead>
	<tbody>
		<?php foreach ($product as $i => $product): ?>
			<tr>

				<td><?php echo $product['Name'] ?></td>
				<td><?php echo $product['Sellingprice'] - $product['Buyingprice'] ?></td>
				<td><a href="editproduct.php?id=<?php echo $product['ID'] ?>">Edit</a>&nbsp<a href="deleteproduct.php?id=<?php echo $product['ID'] ?>">Delete</a></td>

			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>