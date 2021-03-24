<?php 

require_once 'db_connect.php';



function addproduct($data){
	$conn = db_conn();
    $selectQuery = "INSERT INTO addproduct (Name, Buyingprice , Sellingprice ) VALUES (:name, :buyingprice, :sellingprice )";

    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':name' => $data['name'],
        	':buyingprice' => $data['buyingprice'],
        	':sellingprice' => $data['sellingprice']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function showallproducts(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `addproduct` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function updateproduct($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE addproduct set Name = ?, Buyingprice = ?, Sellingprice = ? where ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['name'], $data['buyingprice'], $data['sellingprice'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function showproduct($id){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `addproduct` where ID = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function deleteproduct($id){
    $conn = db_conn();
    $selectQuery = "DELETE FROM `addproduct` WHERE `ID` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}

function searchproduct($name){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `addproduct` WHERE Name LIKE '%$name%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}