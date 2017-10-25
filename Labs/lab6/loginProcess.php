<?php

//print_r($_POST);

include '../../dbConnection.php';
$conn = getDatabaseConnection();

print_r($conn);

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT * 
        FROM tc_admin
        WHERE username = :username
        AND   password = :password ";
  
$namedParamaters = array();
$namedParamaters[':username'] = $username;
$namedParamaters[':password'] = $password;

$stmt = $conn->prepare($sql);
$stmt->execute($namedParamaters);
$record= $stmt->fetch(PDO::FETCH_ASSOC);

print_r($record);

if(empty($record)){
    
    echo "wrong username or password!";
} else{
    echo "right credentials!";
    $_SESSION['username'] = $record['username'];
    $_SESSION['adminFullName'] = $record['firstName'] . " " . $record['lastName'];
   
    header("Location: admin.php"); 
}

//echo $password;

?>