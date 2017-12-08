<?php
session_start();
if (!isset($_SESSION['username'])) { //checks whether admin has logged in
    
    header("Location: index.php");
    exit();
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <title>
         </title>
    </head>
    <body>
        
    </body>
</html>

<?php

include 'dbConnection2.php';
$conn = getDatabaseConnection();

    echo "<table class='table'>
  <thead>
    <tr>
      <th scope='col'>Average Attendance for Month:</th>
      <th scope='col'>Most Popular Book:</th>
      <th scope='col'>Shortest Movie:</th>
    </tr>
    </thead>
    <tbody>
    <tr>";
    $sql="SELECT AVG(attendance) avg
            FROM events";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetch();

    echo "<td>".$records['avg']."</td>";
    
    echo "<br>";
    $sql="SELECT MAX(votes) popular
            FROM books";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetch();
    
     echo "<td>".$records['popular']."</td>";
     echo "<br>";
     
    $sql="SELECT MIN(duration) run
            FROM movies";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetch();
    
    echo "<td>" .$records['run']."</td>";
     
     echo "</tr>
      </tbody>
</table>";

echo "<br>";
echo "<form action='admin.php'>
              <button type='submit' class='btn btn-primary btn-lg'>Back to Admin</button>
            </form>"

?>