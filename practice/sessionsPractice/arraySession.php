<?php
session_start(); //Begin Session
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Storing an Array with a Session </title>
    </head>
    <body>
        <h1> Product Choice </h1>
    <?php //Tests for presence of form_products array
        if(isset($_POST['form_products'])){
            //Tests for array called session products
            if(!empty($_SESSION['products'])){
            //if it exists then data is from previous visit to script
            //so the code will merge with the form_products array
            //extract the unique elements and assign the results back
            //to the $products array 
                $products=array_unique(
                    array_merge(unserialize($_SESSION['products']),
                    $_POST['form_products']));
                    //then this $products array is added to SESSION
                    $_SESSION['products'] = serialize($products);
            } else{
                $_SESSION['products']=serialize($_POST['form_products']);
            }
            echo "<p> Your products have been registered!</p>";
        }
 ?>
     <!-- Creates a SELECT element named form_products[], which
     contians OPTIION elements for a number of products -->
     
     <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"
     <p><label for = "form_products">Select some products: </label><br/>
     <select id="form_products" name="form_products[]" multiple="multiple"
     size="3">
     <option value="Sonic Screwdriver">Sonic Screwdriver</option>
      <option value="HAL 2000">Hal 2000</option>
       <option value="Tardis">Tardis</option>
        <option value="ORAC">ORAC</option>
         <option value="Transporter Bracelet">Transporter Bracelet</option>
     </select></p>
     <button type="submit" name="submit" value="choose">Submit Form</button>
     </form>
     
     <p><a href=session1.php> go to content page </a></p>
    </body>
</html>







