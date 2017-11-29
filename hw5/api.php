<?php


include 'dbConnection1.php';
$conn = getDatabaseConnection();


    $sql = "SELECT * FROM tp_product WHERE 1 AND productName 
    LIKE :productName";
    
    $namedParameters=array();
    $namedParameters[':productName'] = $_GET['productName'];
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    

//print_r($record);

echo json_encode($record);
?>
