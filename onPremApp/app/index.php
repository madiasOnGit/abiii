<?php
session_start();
if (isset($_SESSION['user'])) {
    header("location:welcome.php");
}
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
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">


                        <p style="font-family:verdana;font-size:130%;color:black">
                            <?php
                            echo "<br/>This instance is: ";
                            echo gethostname();
                            ?>
                        </p>

                        <!--Get instance metadata-->
                        <?php
                        $EC2_AZ = `curl -s http://169.254.169.254/latest/meta-data/placement/availability-zone`;
                        $COLOR = "green";
                        if ($EC2_AZ == 'us-east-1a') $COLOR = "blue";
                        if ($EC2_AZ == 'us-east-1b') $COLOR = "green";
                        echo '<p style="font-family:verdana;font-size:180%;color:' . $COLOR . '">' . $EC2_AZ;
                      
                         
                 
                         //import db connection info
                            
                            include('db.php');
                            $u = "user1";
                            $p = "Passw0rd";
                            $dbname = "OctankDB";
                            // Create connection

                            try{
                            $conn = mysqli_connect($dbserver, $u, $p, $dbname);
                            $sql = "SELECT name, age, birth_day FROM person";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            echo "Name: " . $row["name"]. " - Age: " . $row["age"]. " - Birth" . $row["birth_day"]. "<br>";
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
                   
                </div>
            </div>
        </div>
    </div>
</body>

</html>