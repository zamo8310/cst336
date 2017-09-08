<?php
    function play(){
        
              
        for($i=1; $i<4; $i++){
            ${"randomVal" . $i} = rand(0,2);
            displaySymbol(${"randomVal" . $i} );
        }
        displayPoints($randomVal1, $randomVal2, $randomVal3);
      
    }



?>