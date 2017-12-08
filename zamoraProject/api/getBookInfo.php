<?php

   include '../dbConnection2.php';
    $dbConn = getDatabaseConnection("finalProject");    
    $sql = "SELECT * 
            FROM books 
            WHERE id = :id";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute(array("id"=>$_GET['id']));
    $resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($resultSet);
        
?>