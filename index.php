<?php

/*******w******** 
    
    Name: Yali Carvajal
    Date: August 8,2023
    Description: Web Development 2 Final Project Full Spec

****************/

require('connect.php');

// Query Database
$query = "SELECT * FROM movie ORDER BY movie.releaseYear DESC LIMIT 20";

$statement = $db->prepare($query);

$statement->execute();

// Asigning variables
$movieid = filter_input(INPUT_GET, 'movieId', FILTER_SANITIZE_NUMBER_INT);
$description = filter_input(INPUT_GET, 'description', FILTER_SANITIZE_STRING);
$image = filter_input(INPUT_GET, 'movieImage', FILTER_SANITIZE_STRING);

?>

<!-- bootstrap -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">

    <title>Welcome to FilmFrontierMB</title>
  </head>
  <body>

  <div class="w-75_p-3-new">
    
    <header>
      <div id="container1">
          <!-- <h1>FilmFrontierMB</h1> -->
          <img src="images/logo/pandaFilm.jpg" alt="My Logo">
      </div>

        <!-- Navigation menu -->
        
      <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#000000;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="aboutus.php">About</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="moviesearch_user.php">Movies</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="login.php">Admin</a>
            </li>   
          </ul>

        </div>
      </nav>
    </header>    

    <!-- Carousel -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
      <div class="carousel-item active">
      <img src="images/carousel/11.png" class="d-block w-100" alt="Vintage cinema, panda director, 4k resolution, black and white aesthetic, art nouveau backdrop, cinematic lighting, focused expression">
    </div>
    <div class="carousel-item">
      <img src="images/carousel/12.png" class="d-block w-100" alt="Epic panda, movie projection, futuristic theater, neon lights, 4k ultra, realistic, intense colors, dynamic angles">
    </div>
    <div class="carousel-item">
      <img src="images/carousel/13.png" class="d-block w-100" alt="Realistic panda, 3D glasses, popcorn, vibrant colors, 4k resolution, retro 80s cinema, minimalistic but detailed background">
    </div>
    <div class="carousel-item">
      <img src="images/carousel/14.png" class="d-block w-100" alt="Panda film crew, vintage film camera, art deco theater, sepia tones, 4k resolution, balanced composition, rich textures">
    </div>
  </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


  <div id="container2">
      <p><b>Welcome to FilmFrontierMB!</b></p>
      <p>We are your gateway to the world of cinema, offering detailed insights into movies from various cultures and perspectives. At FilmFrontierMB, we believe that movies are more than mere entertainment; they are windows into diverse worlds and reflections of our society.</p>
      <p>Our platform serves as a comprehensive guide for movie enthusiasts. Whether you're seeking information about the latest releases, exploring classic films, or looking to engage with fellow movie lovers, we've got you covered. With user ratings, comments, and a vast database of films, FilmFrontierMB is your one-stop destination for all things cinema.</p>
      <p>We invite you to join our vibrant community, where passion for movies thrives. Explore, rate, discuss, and celebrate the art of cinema with us. Your next cinematic adventure awaits at FilmFrontierMB!</p>
      <p>Feel free to explore and reach out if you have any questions. Happy movie exploring!</p>
  </div>


  <div id="lastmovies">
    <h2>Lastest Movies</h2>
  </div>

    <!-- Showing Content -->
  <div id=shortpost> 

    <section class="row">
        <!-- <div class="row"> -->
        <?php $count = 0;
          while ($row = $statement->fetch() and $count < 4) : 
          $count++;
          ?>
          <div class="col-md-3 mb-3">
            <div class="card">
            <?php if(!empty($row['movieImage'])){ ?>
              <img src="<?= "images/" . $row['movieImage']  ?>" class="card-img-top" alt="<?= $row['title'] ?>">
               <?PHP  } ?>  

              <div class="card-body">              
                <h5 class="card-title"><a href="select.php?movieId=<?= $row['movieId']?>" ><?= $row['title'] ?> </a> </h5>
                <p class="card-text"><?= $row['description'] ?></p>
              
              </div>
            </div>
          </div>
        <?php endwhile; ?>     
          
  </section>
  </div>
  
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 

  <footer class="bg-dark text-light py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-3">
          <h5><a href="aboutus.php"> About us</a></h5>
          <h5><a href="moviesearch_user.php"> Search</a></h5>
          <!-- <p>We are a movie database website that provides information on various movies and TV shows. Our goal is to help you discover new movies and TV shows to watch.</p> -->
        </div>
        <div class="col-md-4 mb-3">
          <h5>Contact Information</h5>
          <ul class="list-unstyled">
            <li>Email: info@FilmFrontierMB.ca</li>
            <li>Phone: 431-555-5555</li>
          </ul>
        </div>
        <div class="col-md-4 mb-3">
          <h5>Follow us</h5>
          <ul class="list-unstyled">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Instagram</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  </body>
</html>






