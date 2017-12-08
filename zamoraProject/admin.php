<?php
session_start();

if (!isset($_SESSION['username'])) { //checks whether admin has logged in
    
    header("Location: index.php");
    exit();
    
}

include 'dbConnection2.php';
$conn = getDatabaseConnection("finalProject");


function displayBooks() {
    global $conn;
    $sql = "SELECT * 
            FROM books
            ORDER BY title";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $books = $statement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($users);
    return $books;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page </title>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link  href="css/styles.css" rel="stylesheet" type="text/css" />
        
        <script>
            
            function confirmDelete(firstName) {
                
                
                return confirm("Are you sure you want to delete " + firstName + "?");
                
            }
            
            
        </script>
       
    </head>
    <body>

<div id="loginStyle">
        <h1> Marina Library Admin Page</h1>
        <h2> Welcome <?=$_SESSION['adminFullName']?>! </h2>
        
        <hr>
        
      
  


  
            <form action="eventList.php">
               <button type="submit" class="btn btn-success btn-lg">Update Event</button>
            </form>
        
 

            <form action="addBook.php">
                <button type="submit" class="btn btn-success btn-lg">Add Book</button>
            </form>
            
            <form action="reports.php">
                <button type="submit" class="btn btn-success btn-lg">Reports</button>
            </form>

  
            <form action="logout.php">
              <button type="submit" class="btn btn-primary btn-lg">Logout</button>
            </form>
   
        
    </div>
       
        
      
        
    </body>     
</html>