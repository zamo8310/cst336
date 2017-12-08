<?php
session_start();

if (!isset($_SESSION['username'])) { //validates that admin has indeed logged in
    
    header("Location: index.php");
    
}

 include("dbConnection2.php");
 $conn = getDatabaseConnection("finalProject");



function getEventInfo($eventId) {
    global $conn;    
    $sql = "SELECT * 
            FROM events
            WHERE eventId = $eventId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch();
    //print_r($record);
    return $record;
}

if (isset($_GET['updateEventForm'])) { //admin has submitted form to update user
    
    $sql = "UPDATE events
            SET eventName = :eName,
            description = :dScript,
            date = :day,
            attendance = :attend,
			WHERE eventId = :eventId";
	$namedParameters = array();
	$namedParameters[":eName"] = $_GET['eventName'];
	$namedParameters[":dScript"] = $_GET['description'];
	$namedParameters[":day"] = $_GET['day'];
	$namedParameters[":attend"] = $_GET['attend'];
	$namedParameters[":eventId"] = $_GET['eventId'];
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
}



if (isset($_GET['eventId'])) {
    
    $eventInfo = getEventInfo($_GET['eventId']);
    
    
}



?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Updating Events </title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </head>
    <body>

    <h1> Admin Section </h1>
    <h2> Updating Event Info </h2>

    <fieldset>
        
        <legend> Update Event </legend>
        
        <form>
            
            <input type="hidden" name="eventId" value="<?=$eventInfo['eventId']?>" />
            Event Name: <input type="text" name="eventName" required value="<?=$eventInfo['eventName']?>" /> <br>
            Description: <input type="text" name="description" required value="<?=$eventInfo['description']?>"/> <br>
            Date: <input type="date" name="date" required value="<?=$eventInfo['date']?>"/> <br>
            Attendance: <input type="text" name="attendance" required value="<?=$eventInfo['attendance']?>"/> <br>
            
                <input type="submit" name="updateUserForm" value="Update Event!"/>
        </form>
        
    </fieldset>
    
    <br>

<form action="eventList.php">
              <button type="submit" class="btn btn-primary btn-sm">Back to Events</button>
            </form>
<br> 
<form action="admin.php">
              <button type="submit" class="btn btn-primary btn-sm">Back to Admin</button>
            </form>

    </body>
</html>