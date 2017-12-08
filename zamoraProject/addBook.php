<?php
session_start();

if (!isset($_SESSION['username'])) { //validates that admin has indeed logged in
    
    header("Location: index.php");
    
}

 include("dbConnection2.php");
 $conn = getDatabaseConnection("finalProject");



if (isset($_GET['addBookForm'])){
    //the administrator clicked on the "Add User" button
    $title = $_GET['title'];
    $author = $_GET['author'];
    $genre    = $_GET['genre'];
    $subgenre = $_GET['subgenre'];
    $yop    = $_GET['yop'];
    $pictureUrl   = $_GET['pictureURL'];
    $description   = $_GET['description'];
    $votes   = $_GET['votes'];
 
    
    //"INSERT INTO `tc_user` (`userId`, `firstName`, `lastName`, `email`, `universityId`, `gender`, `phone`, `role`, `deptId`) VALUES (NULL, 'a', 'a', 'a', '1', 'm', '1', '1', '1');
    
    $sql = "INSERT INTO books
            (title, author, genre, subgenre, yop, pictureURL, description, votes)
            VALUES
            (:name, :fName, :gen, :sub, :year, :pic, :dScript, :vote)";
    $namedParameters = array();
    $namedParameters[':name'] =  $title;
    $namedParameters[':fName'] =  $author;
    $namedParameters[':gen'] =  $genre;
    $namedParameters[':sub'] =  $subgenre;
    $namedParameters[':year'] = $yop;
    $namedParameters[':pic']  = $pictureUrl;
    $namedParameters[':dScript']   = $description;
    $namedParameters[':vote'] = $votes;
   
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
    echo "Book has been added successfully!";
            
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Adding New Book</title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </head>
    <body>

    <h1> Admin Section </h1>
    <h2> Adding New Book </h2>

    <fieldset>
        
        <legend> Add New Book </legend>
        
        <form>
            
            Title: <input type="text" name="title" required /> <br>
            Author: <input type="text" name="author" required/> <br>
            Genre: <input type="text" name="genre" required/> <br>
            Subgenre: <input type="text" name="subgenre" required/> <br>
            Year: <input type="text" name="yop" required/> <br>
            Picture: <input type="text" name="pictureURL" required/> <br>
            Description: <input type="text" name="description" required/> <br>
            Votes: <input type="text" name="votes" required/> <br>
            
            <br />
           
                <input type="submit" name="addBookForm" value="Add Book!"/>
        </form>
        
    </fieldset>

    <form action="admin.php">
              <button type="submit" class="btn btn-primary btn-lg">Back to Admin</button>
            </form>

    </body>
</html>