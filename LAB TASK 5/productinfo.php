<?php 

require_once ('model.php');

function fetchAllproducts(){
	return showallproducts();
}
function fetchproduct($id){
	return showproduct($id);

}