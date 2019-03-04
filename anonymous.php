<?php
session_start();

include_once("php/model.php");


if(!isset($_SESSION["urlcode"])){
    header("Location: main.php");
}else{
  $urlcode = $_SESSION["urlcode"];
  $shorturl = $_SESSION["shorturl"];
}



?>

<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>URL SHORTENER</title>

    <!-- BOOTSTRAP CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/surl.css" rel="stylesheet">


  </head>

  <body>


<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color bg-blue">
  <a class="navbar-brand" href="index.php">URL SHORTENER</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="basicExampleNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="main.php">HOME</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">ABOUT</a>
      </li>
    </ul>
    <div class="form-inline">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <?php
          if(isset($_SESSION['email'])){
            echo "<a class='nav-link' href='dashboard.php'>";
            echo($_SESSION['email']);
            echo"</a>";
          }
          else{
           echo"<a class='nav-link' href='login.php'>LOGIN</a>";
          }
        ?>
      </li>
      <li class="nav-item">

      <?php
      if(isset($_SESSION['email']))
      {
        echo"<a class='nav-link' href='logout.php'>LOGOUT</a>";
      }
      else
      {
       echo"<a class='nav-link' href='register.php'>REGISTER</a>";
      }

     ?>
      </li>


    </ul>
    </div>
  </div>
</nav>


  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center f-45 c-white m-top10">
        URL SHORTENER
      </div>
      <hr>

      <div class="col-md-12 text-center m-top10 bg-white">
        <br>
        <?php
                echo "<div class='col-md-12 f-mail'>"
                .$urlcode.
                "</div>
                <div class='col-md-12 f-link'>
                <a id='num' href='http://localhost:8080/short-url/?url=".$shorturl."'>http://localhost:8080/short-url/?url=".$shorturl."</a>";
                echo "</div>";
                echo "<div class='col-md-12 f-mail'>

               <button class='btn bt-url' data-clipboard-action='copy' data-clipboard-target='#num'>Copy</button>


                </div>";

        session_destroy();
        ?>
        <br>

      </div>

    </div>
  </div>



<footer class="text-center">
  <hr class="hr">
  <p class="c-white-footer">URL-SHORTENER © COPYRIGHT BY <a class="no-style" href="www.davidespier.com">DAVID ESPIER</a></p>

</footer>

    <!-- BOOSTRAP JAVASCRIPT -->

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/clipboard.min.js"></script>

    <script>
    var clipboard = new ClipboardJS('.btn');

    clipboard.on('success', function(e) {
        console.log(e);
    });

    clipboard.on('error', function(e) {
        console.log(e);
    });
    </script>
  </body>

</html>
