<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
        <meta charset="utf-8" />
    </head>
    <body>
        
       <?php
       
            $randomVal1 = rand(0,2);
            displaySymbol($randomVal1);
     
            $randomVal2 = rand(0,2);
            displaySymbol($randomVal2);
     
            $randomVal3 = rand(0,2);
            displaySymbol($randomVal3);
        
        function displaySymbol($randomVal1){
              $randomVal = rand(0,2);
                    
            switch($randomVal){
            
                case 0: $symbol = "seven";
                    break;
                 case 1: $symbol = "grapes";
                    break;
                case 2: $symbol = "orange";
                        break;
            }    //end switch   
        
        echo "<img src='img/$symbol.png' alt='$symbol' title='" . ucfirst($symbol). "' width''70'>"  ;
       }
       
        function displayPoints($randomVal1, $randomVal2, $randomVal3){
        
            echo "<div id= 'output'>";
            if($randomVal1 == $randomVal2 && $randomVal2 == $randomVal3){
                switch($randomVal1){
                    case 0: $totalPoints = 1000;
                            echo "<h1> Jackpot! </h1>";
                            break;
                    case 1: $totalPoints = 500;
                            break;
                    case 2: $totalPoints = 250;
                            break;
            }
            echo "<h2> You won $totalPoints points!</h2>";
        } else{
            echo "<h3> Try Again!  </h3>";
        }
        echo "</div>";
        
    }

      
      
      
      
      
      
      
      
        
       // $symbol= temp;
      /*
        

   
           */
        ?>
     
        

    </body>
</html>