<?php
    include 'inc/header.php';
    
     function getEvents() {
            include 'dbConnection2.php';
            $conn = getDatabaseConnection("finalProject");


            $sql = "SELECT *
                    FROM events"; 
                    
                            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $record = $stmt->fetchAll(PDO::FETCH_ASSOC);//expecting only one record
 
            return $record;
        }
?>
  

<?php
 
        echo "<table class='table table-striped'>
                <thead>
                 <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Event</th>
                    <th scope='col'>Date</th>
                    <th scope='col'>Attendance</th>
                </tr>
                </thead>";
      
        echo "<tbody>";
        $events = getEvents();
        foreach ($events as $event){
            
           // echo "Title: ";
            echo "<tr>";
            echo "<th scope='row'>" . $event['eventId'] . "</th>";
            echo "<td><a href='#' class='eventLink' id='".$event['eventId']."'>" . $event['eventName'] . "</a></td>";
            //echo "<a href='#' class='bookLink' id='".$book['id']."' >". $book['title'] . "</a><br>";
            echo "<td>" . $event['date'] . "</td>";
            echo "<td>" . $event['attendance'] . "</td>";
            //echo "<hr><br>";
            
        }
        echo "</tbody>";
        echo "</table>";
       
?>

        
<?php
    include 'inc/footer.php';
?>