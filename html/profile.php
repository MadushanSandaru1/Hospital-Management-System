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
        <title>Add Doctor | Aarogya</title>
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
                            <i class="fas fa-user-edit fa-2x"></i>
                        </div>
                        <div class="col-md-11">
                            <span class="font-weight-bold"><big>About You</big><br><small>Profile</small></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form">
                            <!-- Form -->
                            <form action="editProfile.php" method="post">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Id </strong></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" value="<?php echo $_SESSION['id'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>First Name </strong></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="fName" name="fName" value="<?php echo $_SESSION['firstName'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Last Name </strong></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="lName" name="lName" value="<?php echo $_SESSION['lastName'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Email Address </strong></label>
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['username'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Mobile No </strong></label>
                                    <div class="col-sm-7">
                                        <input type="tel" class="form-control" name="mobile" value="<?php echo $_SESSION['mobile'] ?>" pattern="0[0-9]{9}" readonly>
                                    </div>
                                </div>
                            </form>                            
                        </div>
                    </div>
                </div>
            </main>
            <!-- page-content" -->
        </div>
        <!-- page-wrapper -->
        
    </body>

    </html>