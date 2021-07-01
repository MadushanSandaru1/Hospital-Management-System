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
        <title>Dashboard | FVS</title>
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
                    
                    
                    <div class="row topic mb-4">
                        <div class="col-md-1 topic-logo">
                            <i class="fas fa-tachometer-alt fa-2x"></i>
                        </div>
                        <div class="col-md-11">
                            <span class="font-weight-bold"><big>Dashboard</big><br><small>Home</small></span>
                        </div>
                    </div>                    
                    
                    <a href="departmetList.php" class="btn" id="deptCount">
                        <div class="card img-fluid border-secondary mb-3" style="width: 18rem;height: 10rem;box-shadow: 4px 4px 4px rgba(130,138,145, 0.5);">
                            <i  <?php
                                    echo "class='fas fa-building fa-7x'";
                                ?>
                               
                               style="color:gainsboro;position:absolute; bottom:0; right:0;"></i>
                            <div class="card-body card-img-overlay text-secondary">
                                <?php
                                    echo "<h4 class='card-title'>Departments</h4>";
                                ?>
                                
                                <h1>
                                    <?php
                                        echo "100";
                                    ?>
                                </h1>
                            </div>
                        </div>
                    </a>
                    
                    <!-- -------------------------- -->
                    
                    
                </div>
            </main>
            <!-- page-content" -->
        </div>
        <!-- page-wrapper -->
        
    </body>

    </html>