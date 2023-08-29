<?php

/*******w******** 
    
    Name: Yali Carvajal
    Date: August 8,2023
    Description: Web Development 2 Final Project Full Spec

****************/

require('connect.php');

// Build and prepare SQL String with :id placeholder parameter.
$query = "SELECT m.*, r.* FROM movie m LEFT JOIN review r ON m.movieId = r.movieId WHERE m.movieId = :movieId ";
$statement = $db->prepare($query);

// Sanitize $_GET['movieId'] to ensure it's a number.
$movieId = filter_input(INPUT_GET, 'movieId', FILTER_SANITIZE_NUMBER_INT);
$statement->bindValue('movieId', $movieId, PDO::PARAM_INT);

$statement->execute();

// Fetch the rows selected by the movie ID.
$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

// Check if rows are found.
if (is_array($rows) && count($rows) > 0) {
    // Get the title from the first row.
    $title = $rows[0]['title'];
    $reviewId = $rows[0]['reviewId'];

    // Handle form submission.
    if ($_POST && !empty($_POST['review'])) {
      // Sanitize user inputs
      $fullName = !empty($_POST['fullName']) ? filter_input(INPUT_POST, 'fullName', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : "anonymous";
      $review = filter_input(INPUT_POST, 'review', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $movieId = filter_input(INPUT_POST, 'movieId', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $query = "INSERT INTO review (fullName, review, movieId) VALUES (:fullName, :review, :movieId)";

      // Insert comment into review table
      $statement = $db->prepare($query);
      $statement->bindValue(':fullName', $fullName);
      $statement->bindValue(':review', $review);
      $statement->bindValue(':movieId', $movieId);

    if($statement->execute()){
      header("Location: select.php?movieId=$movieId");
      exit();
    }

    $review_query = "SELECT * FROM review WHERE movieId = :movieId";
    $review_statement = $db->prepare($review_query);
    $review_statement->bindValue(':movieId', $row['movieId']);

    $review_statement->execute();

    exit;
  }

  


}

?>

<!-- bootstrap -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">

    <title>Welcome to FilmFrontierMB</title>
  </head>
  <body>
    
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

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="moviesearch.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Admin
              </a>
           

              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="moviepost.php">Create Movies</a>          

                <a class="dropdown-item" href="categorypost.php">Create Categories</a>
                <div class="dropdown-divider"></div>
                
                <a class="dropdown-item" href="moviesearch.php">Main Search</a>
                <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            </li>

          </ul>

          <form class="form-inline my-2 my-lg-0" method="GET" action="searchindex.php">
            <input class="form-control mr-sm-2" type="search" name="q" placeholder="Search" aria-label="Search">
            <button class="btn btn-dark" type="submit">Search</button>
          </form>

        </div>
      </nav>
    </header>

  
    <div class="searchusr">
    <div class="w-75 p-3">

        <div class="container1">
        <!-- Movie Details -->
        <?php $num_reviews = 0; ?>
            <?php if (count($rows) > 0) { ?>
                
                <?php echo "<h3 class=title>" . $rows[0]['title'] . " (" . $rows[0]['releaseYear'] . ")</h3>" ; ?>
                <?php echo "<p><a class=edit href='" . "editmovie.php?movieId" . "=" . $movieId . "'" . ">" . "Edit" . "</a>" ; ?>
                
                <?php echo "<p><a class=edit href='" . "comments.php?movieId" . "=" . $movieId . "'" . ">" . "Admin Comments" . "</a>" . "</p>"; ?>      
                <?php echo "<p>" . $rows[0]['description'] . "</p>"; ?>                

            <?php if(!empty($rows[0]['movieImage'])){ ?>
              <?php echo "<img class=\"indeximg\" src=\"images/" . $rows[0]['movieImage'] . "\" alt=\"" . $rows[0]['title'] . "\">";
                } ?> 

                <!-- User comments -->
                <div>
                    <h3>Comments</h3>

                                <!-- Count comments -->
            <div class="comments">
  	          <p class="small text-muted">Comments ( 
            <?php
            $pdo = new PDO("mysql:host=localhost;dbname=serverside;charset=utf8", 'serveruser', 'gorgonzola7!');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->prepare("SELECT COUNT(*) as cant FROM review WHERE movieId = :movieId");
            $stmt->bindParam(':movieId', $movieId);
            $stmt->execute();
            $result = $stmt->fetch();
            $cant_comments = $result['cant'];
            echo $cant_comments . " )";
            ?> 
</p> 
</div> 

                </div>
            <?php 
            foreach ($rows as $row) {
              if(!empty($row['review'])){
                echo '<p><b>' . $row['fullName'] . ' on ' . date('F j, Y', strtotime($row['dateReview'])) . '</b></p>';
                echo "<p>" . $row['review'] . "</p>"; 
                              
              }

            }
        }
            ?>    
    </div>


    </div>



</div>

<footer class="bg-dark text-light py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-3">
          <h5><a href="aboutus.php"> About us</a></h5>
          <h5><a href="moviesearch_user.php"> Search</a></h5>
          <!-- <p>We are a movie database website that provides information on various movies and TV shows. Our goal is to help you discover new movies and TV shows to watch.</p> -->
        </div>
        <div class="col-md-4 mb-3">
          <h5>Contact</h5>
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

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
    </html>

    

