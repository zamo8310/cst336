<?php

  print_r($_FILES);
  echo "File size " . $_FILES['myFile']['size'];
  move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES['myFile']['name'] );

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 10: Photo Gallery </title>
    </head>
    <body>

    <h2> Photo Gallery </h2>
    <form method="POST" enctype="multipart/form-data"> 


        <input type="file" name="myFile" /> 
        
        <input type="submit" value="Upload File!" />

    </form>


    </body>
</html>