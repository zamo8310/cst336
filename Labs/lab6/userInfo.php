<!DOCTYPE html>
<html>
    <head>
        <title> User History </title>
    </head>
    <body>
        
        <h2> User History </h2>


      

    </body>
</html>




<?php


function displayUserHistory($userId) {
    
 
    include '../../dbConnection.php';
    $conn = getDatabaseConnection();
    
    $sql = "SELECT *
            FROM tc_user 
            WHERE userId = $userId";
    
   
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    

  //  return $record;
        
         echo  $record['userId'] . " " . $record['firstName'] . " " . $record['lastName']
         . " " . $record['email'] . " " . $record['universityId'] . " " . $record['gender'] . " " . $record['phone'] 
         . " " . $record['role'] . " " . $record['deptId'] . "<br />";
        
    
}

if (isset($_GET['userId'])) {
    
    $userInfo = displayUserHistory($_GET['userId']);
    
    
}


?>

