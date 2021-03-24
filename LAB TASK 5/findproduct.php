<?php

require_once 'model.php';

if (isset($_POST['findproduct'])) {
	
		echo $_POST['name'];

    try {
    	
    	$searchallproduct = searchproduct($_POST['name']);
    	require_once 'searchallproduct.php';

    } catch (Exception $ex) {
    	echo $ex->getMessage();
    }
}

