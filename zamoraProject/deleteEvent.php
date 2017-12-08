<?php

    include 'dbConnection2.php';
    $conn = getDatabaseConnection("finalProject");
    $sql = "DELETE FROM events
            WHERE eventId = " . $_GET['eventId'];

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("Location: eventList.php");
    
?>