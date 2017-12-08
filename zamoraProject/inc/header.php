<!DOCTYPE html>
<html>
    <head>
        <title> Library Catalog </title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        
        <link  href="css/styles.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
       
       
   
    </head>
    <style>
      body{
        background-color: white;
      }
    </style>
    
    <body>
        
    <div id="head">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #510584;">
          <a class="navbar-brand" href="https://www.co.monterey.ca.us/library/">MCFL</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
              <a class="nav-item nav-link" href="books.php">Books</a>
              <a class="nav-item nav-link" href="movies.php">Movies</a>
              <a class="nav-item nav-link" href="events.php">Events</a>
                <form method="POST" action="loginProcess.php">
                  <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="col">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                  </div>
                </form>
            </div>
          </div>
        </nav>
        
        
        <div class="jumbotron">
          
            <img src="img/bookWorm.png" alt="bookworm">
          
          <div id="welcome">
           <h1> Welcome to the Marina Library!</h1>
           </div>
           
          
          <h2> The "Official" website for the Marina branch of the Monterey County Free Libraries</h2>
          
          
        </div>
    </div>
    
    </body>
</html>