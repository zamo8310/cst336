<!DOCTYPE html>
<html>
    <head>
        <title>Sorting Numbers </title>
    </head>
    <body>
        <h1>Sorting Numbers</h1>
        <p>Enter 3 numbers from 1 to 50:</p>
         
            Number 1:
            <input type="text" id="num1"><br/>
            Number 2:
            <input type="text"id="num2"><br/>
            Number 3:
            <input type="text"id="num3"><br/>
            <button type="button" onclick="check()">Sort!</button>
            <br/><br/><br/><br/><br/>
            <p id="error"></p>
            <h2 id="largest"></h2>
            <p id="demo"></p>
            <p id="equal"></p>
            
<script>
function check(){
    var n1 = document.getElementById("num1").value;
    var n2 = document.getElementById("num2").value;
    var n3 = document.getElementById("num3").value;
    
    var error = false;
    var nums = [n1, n2, n3];
    var sorted = nums.sort(function(a,b){return a-b});
    
    for (var i =0;i<sorted.length;i++){
        if(sorted[i] > 50 || sorted[i] < 0) {
            document.getElementById("error").innerHTML="Entered a number that is not from 1 - 50."
            document.getElementById("error").style.color="red";
            error=true;
           
        }
        if(error == true){
            break;
        }
    }
    
    if (error == false) {
        
        if (n1 == n2 && n1 == n3) {
            document.getElementById("equal").innerHTML="All numbers are equal";
        }
        else {
            document.getElementById("largest").innerHTML="The biggest number is " + sorted[2];
            document.getElementById("demo").innerHTML="The numbers in ascending order are: " + sorted[0] + ", " +sorted[1]+", "+sorted[2];
        }
    }
}
           
            // function myFunction() {
              //   nums.sort(function(a, b){return a - b});
                // document.getElementById("demo").innerHTML = nums;
                //}
        
            
                 
             
             // submit.addEventListener('click', sort);
           //  document.getElementById("demo").write = nums[0];
             
            
    
</script>
 
    </body>
</html>