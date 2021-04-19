<?php 

require_once 'dbconnect.php';



function adduser($data){
	$conn = db_conn();
    $selectQuery = "INSERT INTO userinfo (Name, Username ,Password, Email, DateOfBirth , Gender, Institution , Company, UserType, BloodGroup ) VALUES (:name, :username, :password,  :email, :dob, :gender, :institution, :company, :user, :blood  )";

    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
                     ':name'               =>     $data['name'],   
                     ':username'               =>     $data['username'],  
                     ':password'          =>     $data["password"], 
                     ':email'          =>     $data["email"],
                     ':dob'     =>     $data["dob"],  
                     ':gender'          =>     $data["gender"],  
                     ':institution'     =>     $data["institution"],  
                      ':company'               =>     $data['company'],  
                     ':user'          =>     $data["user"],  
                     ':blood'     =>     $data["blood"] 

        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function searchUser($user_name){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `userinfo` WHERE username = ?";

    
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$user_name]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}


function showData($id){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `userinfo` where ID = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    return $data;
}

function updateData($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE userinfo set Name = ?, Username = ? , Password = ? where ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['name'], $data['Username'], $data['Password'] , $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}






?>