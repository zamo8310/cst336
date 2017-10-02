<?php


function yearList($start,$end){
    $count=0;
     $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
   
    $sum=0;
    for($i=$start; $i<=$end; $i++){
        
        $sum+=$i;
        echo "<li> Year $i </li?>";
         if($i == 1776){
        echo "USA INDEPENDENCE";
         }
         if($i % 100 == 0){
            echo "Happy New Century";
        }
        if($i>=1900)
        {
            for($j=$i; $j<end; $j+=4)
            {
               echo " 'array($count)%0'.png" ;
            }
        }
    
    }
    
    $sum+=i;
    echo "The sum is: " . " $sum";
    }
    
/*
function displaySymbol($start,$end){
    
    $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");

    for($i=$start; $i<=end; $i++){
        echo " 'array($i).png' ";
    }
    
}
*/



?>


<!DOCTYPE html>
<html>
<body>

<h1>Chinese Zodiac List</h1>
<div></div>

<ul>
    <?=yearList(1500,2000)?>
    <?=displaySymbol(1900,2000)?>
</ul>




</body>
</html>