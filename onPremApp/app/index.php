<?php


$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!--TITLE-->
    <meta charset="utf-8" />
    <title>
        Octank Online Store
    </title>
    <!--STYLE-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!--SCRIPT-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Octank Store</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

 <!-- Page Content -->
<div class="container" style="margin-top:50px">

    <div class="row">

        <div class="col-lg-9 mx-auto">

            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
                </div>
                <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
                </div>
                <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>

            <div class="row">


            <?php
                        
               //import db connection info
                           
                include('db.php');
                          

                 try{
                    $conn = mysqli_connect($dbserver, $u, $p, $database);
                    $sql = "SELECT name, price, desc FROM product";
                     $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                                       // output data of each row
                                       while($row = $result->fetch_assoc()) {

                                        echo '<div class="col-lg-4 col-md-6 mb-4">';
                                        echo '<div class="card h-100">';
                                        echo '<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>';
                                        echo '<div class="card-body">';
                                        echo     '<h4 class="card-title">';
                                        echo     '<a href="#">'. $row["name"].'</a>';
                                        echo     '</h4>';
                                        echo     '<h5>'. $row["price"]. '</h5>';
                                        echo     '<p class="card-text">'. $row["desc"].'</p>';
                                        echo '</div>';
                                        echo '<div class="card-footer">';
                                        echo     '<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';

                                          

                                       }
                                       } else {
                                       echo "0 results";
                                       }
                                       $conn->close();
                           }
                           catch(Exception $e) {
                               echo "Error Connecting to db" .  $e->getMessage();

                           }


                ?>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
<!-- /.row -->

</div>
<!-- /.container -->

    <div class="container">
        <div class="row">
            <div class="col-lc-1 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">

                            <?php
                            echo "<br/>instance: " . gethostname();
                            $EC2_AZ = `curl -s http://169.254.169.254/latest/meta-data/placement/availability-zone`;
                            echo  "<br/>running from: " . $EC2_AZ;

                            $time = microtime();
                            $time = explode(' ', $time);
                            $time = $time[1] + $time[0];
                            $finish = $time;
                            $total_time = round(($finish - $start), 4);
                            echo '<p style="font-family:verdana;font-size:90%;color:black">';
                            echo 'Page generated in ' . $total_time . ' seconds.';
                            echo '</p>';

                            ?>
                    
                    </div>
            
                </div>
            </div>
        </div>
    </div>

      <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Octank 2020</p>
    </div>
    <!-- /.container -->
  </footer>

</body>

</html>