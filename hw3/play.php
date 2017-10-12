 <?php
 
  $songs=array("twenty one pilots"=>"migraine","metallica"=>"masterOfPuppets","fun"=>"someNights", "macklemore"=>"thriftShop",
                 "lorde"=>"whiteTeeth", "the neighbourhood"=>"sweaterWeather");

    function assignSong($songs,$songArr){
        for($i=0; $i<3; $i++){
            ${"randomValue".$i} = $songs[array_rand($songs)];
            $songArr[$i] = ${"randomValue".$i}; 
        }
        //checkDuplicates($songArr);
    }
    
    function returnSong()
    {
        return $songs;
    }
   
    function displayAsong($song) {
     
            echo  "<audio controls
            '<source src='../hw2/music/$song.mp3' type='audio/mpeg' >'
                  </audio>";
          
    }
    
       
  /*  function checkDuplicates$($songArr){
        if($songArr[0]==$songArr[1] || $songArr[0]==$songArr[2])
        {
            
        }
    }
    */
      
     
?>
    



<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8" > 
        <title> Music Challenge</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    
      
    </head>

    <body>
        <header>
            <hl> &#9835; Music Challenge &#9835; </hl>
        </header>
        
    <!--    
        <nav class="topNav">
            <hr id="navView"/>
            <a href = "index.php">Home</a>
            <a id="currentView" href = "play.php">Timeline</a>
        </nav>
        
        <br /><br />
      -->
   
          <div class="song">
            <?php
                 $songs=array("twenty one pilots"=>"migraine","metallica"=>"masterOfPuppets","fun"=>"someNights", "macklemore"=>"thriftShop",
                 "lorde"=>"whiteTeeth", "the neighbourhood"=>"sweaterWeather");
                // $songs = array("migraine", "masterOfPuppets", "someNights", "thriftShop", "whiteTeeth", "sweaterWeather");  
                // $artists=array("twenty one pilots", "metallica", "fun", "macklemore", "lorde", "the neigbourhood");
                 $songArr=array();
                 $question=array("What song is this?", "Who is the artist?", "Name another song by this artist: ");
                 $count=1;
         
              shuffle($songs);
              for($i=0; $i<3; $i++){
                  
                 // $bool=false;
                 //${"randomValue".$i} = $songs[array_rand($songs)];
                 //echo ${"randomValue".$i}; 
                 /* 
                  if (in_array(${"randomValue".$i}, $songArr)){
                    echo "Match Found";
                  }
                 else
                 {
                    echo "Match not found";
                 }
                 */
            
                  $songArr[$i]= $songs[$i];
    
              }
              
              //print_r($songArr);
              //print_r(array_unique($songArr));
            
              
              for($j=0; $j<count($songArr); $j++){
                  echo "Round: " . $count;
                  displayAsong($songArr[$j]);
                  $count++;
              }
             /* 
              $songArrNames=array();
              for($i=0; $i<count($songArr); $i++)
              {
                 for($j=0; $j<count($songs); $j++){
                     if($songArr[$i]== $songs[j]){
                         
                     }
                 }
              }
              */
                //$songArr.forEach(displayASong($songArr));

               // displaySong($songs);
                // print_r($songArr);
        
        
        
            ?>
        </div>
        
   
        
        <div class="questions">
            <?php
            
          $ask=" ";
        
          for($i=0; $i<3; $i++){
             $ask=$question[$i];
              echo  $ask;
              echo "<br></br>";
              echo "<br>";
          }
            
 ?>
    </div>
    
        <div class="quiz">
    
          <p>
            <select name="q1">
                <option value="Master of Puppets">Master of Puppets</option>
                <option value="Migraine">Migraine</option>
                <option value="Some Nights">Some Nights</option>
                <option value="Sweater Weather">Sweater Weather</option>
                <option value="Thrift Shop">Thrift Shop</option>
                <option value="White Teeth">White Teeth</option>
            </select>
          </p>
          <br></br>
          <br></br>
          <br></br>
          
          <p>
              <textarea name="q2" rows="2" cols="20">
                  
                  
              </textarea>    
              
          </p>
          <br></br>
          <br></br>
          <br></br>
          <p>
            <form name="q">
              <input type="radio" id="one" name="q3" value="female robbery">
               <label for="one"> Female Robbery </label> <br>
               
              <input type="radio" id="two" name="q3" value="wherever I may roam"> 
               <label for="two">  Wherever I May Roam </label><br>
               
              <input type="radio" id="three" name="q3" value="green light"> 
               <label for="three"> Green Light </label><br>
               
              <input type="radio" id="four" name="q3" value="glorious">  
               <label for="four"> Glorious </label><br>
               
              <input type="radio" id="five" name="q3" value="ode to sleep">  
               <label for="five"> Ode to Sleep </label><br>
               
              <input type="radio" id="six" name="q3" value="all the pretty girls">  
               <label for="six"> All The Pretty Girls </label><br>
            </form>
          </p>
          
          <p>
              <form action="returnData.php">
                  <input type="submit" value="Submit">
              </form>
          </p>

            
        </div>


    </body>
    <!-- closing body -->

</html>