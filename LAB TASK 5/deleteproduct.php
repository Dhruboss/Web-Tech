<?php 

require_once 'model.php';

if (deleteproduct($_GET['id'])) {
    header('Location: showallproduct.php');
}

 ?>