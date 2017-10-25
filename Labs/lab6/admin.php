<?php
 
 session_start();
 include '../../dbConnection.php';
 
 if(isset($_SESSION['username'])){
     
     header("Location: index.php");
     exit();
 }
 
 $conn = getDatabaseConnection();
 
 function displayUsers(){
     
     global $conn;
     
     $sql = "SELECT firstName, lastName, email, userID FROM `tc_user` ";
     
     $stmt = $conn->prepare($sql);
     $stmt->execute();
     $record= $stmt->fetch(PDO::FETCH_ASSOC);
     
     foreach ($records as $record){
         echo $record['firstName'] . " " . $record['lastName'] . " " .  $record['email'] . " " . $record['userID'] . "<br>";
     }
 }



?>



<!DOCTYPE html>
<html>
    <head>
        <title> TCP ADMIN PAGE </title>
    </head>
    <body>

     <h1> TCP Admin Page </h1>
     <h2> Welcome <?=$_SESSION['adminFullName']?>! </h2>


    <hr>
    
    <?=displayUsers()?>
    
    
    </body>
</html>