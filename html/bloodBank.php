<?php
    /* start the session */
	session_start();

    /* database connection page include */
    require_once('../connection/connection.php');

    /* if session is not set, redirect to login page */
    if(!isset($_SESSION['username'])) {
	    header("location:login.php");
	}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Blood Bank | Aarogya</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--title icon-->
        <link rel="icon" type="image/ico" href="../img/logo_only.png"/>
        
        <!-- bootstrap jquary -->
        <script src="../js/bootstrap.min.js"></script>
        
        <!-- bootstrap css -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
    
        <!-- font awesome icon -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.css" rel="stylesheet">
        
        <!-- popper for tooltip -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        
        
        <!-- jquary -->        
        <script src="../js/jquery.min.js"></script>
        <script src="../js/script.js"></script>
        
        <!-- css -->
        <link href="../css/main.css" rel="stylesheet">

    </head>

    <body>
        <div class="page-wrapper chiller-theme toggled">
            
            <?php
                require_once('sidebar.php');
            ?><!-- sidebar-wrapper  -->
    
            <main class="page-content">
                <div class="container">
                    
                    <?php
                        require_once('logoutbar.php');
                    ?><!-- logout bar  -->  
                    
                    
                    <div class="row topic">
                        <div class="col-md-1 topic-logo">
                            <i class="fas fa-tint fa-2x"></i>
                        </div>
                        <div class="col-md-11">
                            <?php
                                if($_SESSION['role'] == 'admin'){
                                    echo "<span class='font-weight-bold'><big>Blood Bank</big><br><small>Monitor Hospital</small></span>";
                                } else {
                                    echo "<span class='font-weight-bold'><big>Store Status</big><br><small>Blood Bank</small></span>";
                                }
                            ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 form">
                            <div class="row">
                                <div class="col-md-8">
                                    
                                </div>
                                <div class="col-md-4">
                                    <form action="bloodBank.php" method="get">
                                        <div class="input-group">
                                            <input type="search" name="searchTxt" class="form-control" placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" type="submit" name="search"><i class="fas fa-search"></i> Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <br>
                            <!-- Table -->
                            <table class="table">
                              <thead>
                                  <tr>
                                      <th scope="col">Blood Group</th>
                                      <th scope="col">Status</th>
                                      <?php
                                          if($_SESSION['role'] != 'client'){
                                            echo "<th scope='col'>Action</th>";
                                          }
                                      ?>
                                      </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  
                                    if(isset($_GET['search'])){
                                        $search =  mysqli_real_escape_string($con,$_GET['searchTxt']);
                                        
                                        $query = "SELECT * FROM `bloodbank` WHERE `bloodGroup` LIKE '{$search}%'";
                                    } else {
                                        $query = "SELECT * FROM `bloodbank`";
                                    }
                                  
                                    $result_set = mysqli_query($con,$query);

                                    if (mysqli_num_rows($result_set) >= 1) {

                                        while($bld = mysqli_fetch_assoc($result_set)){
                                            
                                            echo "<tr>";
                                            echo "<td>".$bld['bloodGroup']."</td>";
                                            echo "<td>".$bld['noOfBag']." <small>bags</small></td>";
                                            if($_SESSION['role'] != 'client'){
                                                echo "<td><a href=\"#\"><i class='fas fa-edit mr-3' data-toggle='tooltip' title='Edit'></i></a>";
                                            }
                                            echo "</td></tr>";
                                        }

                                    } else {
                                        echo "<tr><td><h4 class='text-danger'>No records</h4></td></tr>";
                                    }
                                  ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <!-- page-content" -->
        </div>
        <!-- page-wrapper -->
        
    </body>

</html>

<?php 

	require_once('../connection/close_con.php');

?>