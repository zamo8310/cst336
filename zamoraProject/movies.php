<?php
    include 'inc/header.php';
    
     function getMovies() {
            include 'dbConnection2.php';
            $conn = getDatabaseConnection("finalProject");


            $sql = "SELECT *
                    FROM movies"; 
                    
                            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $record = $stmt->fetchAll(PDO::FETCH_ASSOC);//expecting only one record
 
            return $record;
        }
?>
  
<?php
 
       echo "<div id='moviePage'>";
        $movies = getMovies();
       foreach ($movies as $movie){
            
            
            //echo "<tr>";
            //echo "<th scope='row'>" . $book['id'] . "</th>";
            //echo "<td><a href='#' class='bookLink' id='".$movie['id']."'>" . $movie['title'] . "</a></td>";
            //echo "<a href='#' class='bookLink' id='".$book['id']."' >". $book['title'] . "</a><br>";
            echo "<div> Title: " . $movie['Title'] . "</div>";
            echo "<img src='img/".$movie['pictureURL']."'>";
            //echo "<td>" . $book['title'] . "</td>";
            //echo "<td>" . $book['yop'] . "</td>";
            echo "<hr><br>";
            
        }
        echo "</div>"
       
       
?>




        
<?php
    include 'inc/footer.php';
?>