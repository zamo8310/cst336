<?php
   
    
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
            echo "<td>". $event['eventName'] . "</td>";
            //echo "<a href='#' class='bookLink' id='".$book['id']."' >". $book['title'] . "</a><br>";
            echo "<td>" . $event['date'] . "</td>";
            echo "<td>" . $event['attendance'] . "</td>";
            echo "<td>[<a href='updateEvent.php?eventId=".$event['eventId']."'> Update </a> ]</td>";
            echo "<td><form action='deleteEvent.php' style='display:inline' onsubmit='return confirmDelete(\"".$event['eventName']."\")'>
                     <input type='hidden' name='eventId' value='".$event['eventId']."' />
                     <input type='submit' value='Delete'>
                  </form>
               </td>";
            //echo "<hr><br>";
            
        }
        echo "</tbody>";
        echo "</table>";
        
        
        echo "<br>";
        echo"<form action='admin.php'>
              <button type='submit' class='btn btn-primary btn-lg'>Back to Admin</button>
            </form>";
       
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
