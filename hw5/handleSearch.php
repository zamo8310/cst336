<?php


include 'dbConnection1.php';
$conn = getDatabaseConnection("inventory");


    $product = $_GET['product'];
    //$views = $_POST['views'];
    //$history = $_POST['time'];
    
    $sql = "INSERT INTO products(product) VALUES(:product)";
        
    //print_r($namedParameters);    
    $namedParamaters = array();
    $namedParamaters[":product"]=$product;
        
    $stmt = $conn -> prepare($sql);
    $stmt ->execute($namedParamaters);
    
    
    
    $sql="SELECT product, history FROM products WHERE product LIKE :prod";
    
    $namedParamaters=array();
    $namedParamaters[":prod"] = "%" . $_GET['product'] . "%";
    
    $stmt = $conn->prepare($sql);
    $stmt -> execute($namedParamaters);
    
    $record = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    
    

    
    echo json_encode($record)
  ?>
    

