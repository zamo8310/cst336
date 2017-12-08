<?php

include 'inc/header.php';
include 'dbConnection2.php';
            $conn = getDatabaseConnection("finalProject");

function displayBooks(){
    global $conn;
    
    $sql = "SELECT * FROM books WHERE 1 ";
    
    
    if (isset($_GET['submit']))
    {
        
        $namedParameters = array();
        
        
       if (!empty($_GET['bookName'])) {
            
            //The following query allows SQL injection due to the single quotes
            //$sql .= " AND deviceName LIKE '%" . $_GET['deviceName'] . "%'";
  
            $sql .= " AND title LIKE :name"; //using named parameters
            $namedParameters[':name'] = "%" . $_GET['bookName'] . "%";

        
         }
         
         $radioBtn= $_GET['orderBy'];
         
         if (isset($_GET['orderBy']) && $radioBtn == 'mostPopular') {
            
        $sql .= " ORDER BY votes DESC ";
        
         }
        
         if(isset($_GET['orderBy']) && $radioBtn == 'alpha'){
            $sql .= " ORDER BY title ";
        }
         
        
}
    else{
         $sql = "SELECT * FROM books ORDER BY id ASC ";
   }//endIf (isset)
    
    //If user types a deviceName
     //   "AND deviceName LIKE '%$_GET['deviceName']%'";
    //if user selects device type
      //  "AND deviceType = '$_GET['deviceType']";
    
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            
    echo "<table class='table table-striped'>
                <thead>
                 <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Title</th>
                    <th scope='col'>Author</th>
                    <th scope='col'>Year</th>
                </tr>
                </thead>";
      
               
     foreach ($records as $record) {
        
         echo "<tbody>";
     
            echo "<tr>";
            echo "<th scope='row'>" . $record['id'] . "</th>";
            echo "<td><a href='#' class='bookLink' id='".$record['id']."'>" . $record['title'] . "</a></td>";
            //echo "<a href='#' class='bookLink' id='".$book['id']."' >". $book['title'] . "</a><br>";
            echo "<td>" . $record['author'] . "</td>";
            echo "<td>" . $record['yop'] . "</td>";
            //echo "<hr><br>";
            
        }
        echo "</tbody>";
        echo "</table>";     
               
    //}
}








   /* include 'inc/header.php';
    
     function getBooks() {
            include 'dbConnection2.php';
            $conn = getDatabaseConnection("finalProject");


            $sql = "SELECT *
                    FROM books"; 
                    
                            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $record = $stmt->fetchAll(PDO::FETCH_ASSOC);//expecting only one record
 
            return $record;
        }
        */
?>




  
<script>

    $(document).ready( function(){
        
        $(".bookLink").click( function(){
            
            //alert($(this).attr('id'));
           
            $('#bookInfoModal').modal("show");
           // $("#petInfo").html("<img src='img/loading.gif'>");
          
            
            $.ajax({

                type: "GET",
                url: "api/getBookInfo.php",
                dataType: "json",
                data: { "id": $(this).attr('id')},
                success: function(data,status) {
                
          
                   $("#bookInfo").html(//" Genres: " + data.title + " " + date.subgenre + "<br>" +
                                      "<img src='img/" + data.pictureURL + "'><br >" + 
                                       data.description);   
                                       
                    
                    $("#bookNameModalLabel").html(data.title);
                
                },
                complete: function(data,status) { //optional, used for debugging purposes
                //alert(status);
                }
                
            });//ajax
            
            
        }); //.getLink click
        
    });//document.ready

    
</script>            

<form>
            Book: <input type="text" name="bookName" placeholder="Book Title"/>
            
        
            <br>
            Order by:
            <input type="radio" name="orderBy" id="orderByPop" value="mostPopular"/> 
             <label for="orderByPop">Most Popular</label>
             
             
            <input type="radio" name="orderBy" id="orderByASC" value="alpha"/> 
             <label for="orderByASC"> ASC </label>
            
            
            
            <input type="submit" value="Search!" name="submit" >
</form>

<hr>
        
        <?=displayBooks()?>

<?php
    
    /*
        echo "<table class='table table-striped'>
                <thead>
                 <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Title</th>
                    <th scope='col'>Author</th>
                    <th scope='col'>Year</th>
                </tr>
                </thead>";
      
        echo "<tbody>";
        $books = getBooks();
        foreach ($books as $book){
            
           // echo "Title: ";
            echo "<tr>";
            echo "<th scope='row'>" . $book['id'] . "</th>";
            echo "<td><a href='#' class='bookLink' id='".$book['id']."'>" . $book['title'] . "</a></td>";
            //echo "<a href='#' class='bookLink' id='".$book['id']."' >". $book['title'] . "</a><br>";
            echo "<td>" . $book['author'] . "</td>";
            echo "<td>" . $book['yop'] . "</td>";
            //echo "<hr><br>";
            
        }
        echo "</tbody>";
        echo "</table>";
        */
       
?>



<!-- Modal -->
<div class="modal fade" id="bookInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bookNameModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <div id="bookInfo"></div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



        
<?php
    include 'inc/footer.php';
?>