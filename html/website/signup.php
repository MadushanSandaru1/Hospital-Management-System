<?php
    /* start the session */
	session_start();

    /* database connection page include */
    require_once('../../connection/connection.php');

?>

<?php

    $altScs = 'none';
    $altReq = 'none';
    $altInfo = 'none';

    $cliId = null;
    $email = null;

	if(isset($_POST['saveBtn'])) {

        $queryDocId = "SELECT id FROM `client` ORDER BY `id` DESC LIMIT 1";
        
        $result_set = mysqli_query($con,$queryDocId);

        if (mysqli_num_rows($result_set) == 1) {

            $lastId = mysqli_fetch_assoc($result_set);
            $num = substr($lastId['id'],1,strlen($lastId['id']));
            
        }
        else {
            $num = 0;
        }
        
        $cliId =  "C".sprintf("%05d", ++$num);
        
        $fn = trim($_POST['fName']);
		$fName =  ucfirst($fn);
        
        $ln = trim($_POST['lName']);
		$lName =  ucfirst($ln);
        
		$email = trim($_POST['email']);
        
        $mobile = trim($_POST['mobile']);
        
        $p = trim($_POST['pwd']);
        $pwd = sha1($p);
        
        $qurey = "INSERT INTO `client` VALUES ('{$cliId}','{$fName}','{$lName}','{$email}','{$mobile}',0)";

        $result = mysqli_query($con,$qurey);

        if ($result) {

            $altScs = 'block';
            $altReq = 'none';
            $altInfo = 'block';
            
            $qurey = "INSERT INTO `user`(`id`,`username`, `password`, `role`) VALUES ('{$cliId}','{$email}','{$pwd}','client')";
            mysqli_query($con,$qurey);
            
            //echo "<meta http-equiv='refresh' content='5'>";

        }
        else{
            $altScs = 'none';
            $altReq = 'block';
            $altInfo = 'none';
        }

	}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign Up | Aarogya</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--title icon-->
        <link rel="icon" type="image/ico" href="../../img/logo_only.png" />
        
        <!-- bootstrap jquary -->
        <script src="../../js/bootstrap.min.js"></script>
        
        <!-- bootstrap css -->
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
    
        <!-- font awesome icon -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.css" rel="stylesheet">
        
        <!-- popper for tooltip -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        
        
        <!-- jquary -->        
        <script src="../../js/jquery.min.js"></script>
        <script src="../../js/script.js"></script>
        
        <!-- css -->
        <link href="../../css/index.css" rel="stylesheet">
        
        <script>
            $(document).ready(function(){
                $("#repwd").keyup(function(){
                    if ($("#pwd").val() != $("#repwd").val()) {
                        $("#msg").html("Password do not match").css("color","red");
                        $(".saveBtn").css("display","none");
                    }else{
                        $("#msg").html("Password matched").css("color","green");
                        $(".saveBtn").css("display","");
                    }
                });
            });
        </script>

    </head>
    
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../../index_en.php"><img id="logo" src="../../img/logo_only.png">  Aarogya Private Hospital</a>
                </div>
                <ul class="nav navbar-nav navbar-right lead">
                    <li class="nav-item"><a class="nav-link" href="../../index_en.php">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="department_en.php">DEPARTMENTS</a></li>
                    <li class="nav-item"><a class="nav-link" href="doctor_en.php">DOCTORS</a></li>
                    <li class="nav-item"><a class="nav-link" href="about_en.php">ABOUT</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact_en.php">CONTACT</a></li>
                    <li class="nav-item active"><a class="nav-link" href="../login.php" target="_blank">LOGIN</a></li>
                    <li>
                        <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-outline-primary"  onclick="window.location.href = 'contact_en.php';">En</button>
                            <button type="button" class="btn btn-outline-primary"  onclick="window.location.href = 'contact_si.php';">සිං</button>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        
            <section>        
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center mt-5 mb-5">
                            <h1>Sign up</h1>
                            <h6 class="lead">Sign up to get more services</h6>
                        </div>
                    </div> 
                    
                    <div class="row mb-5 d-flex justify-content-center">
                        
                        <div class="contactForm col-lg-10 col-md-10 col-sm-12 col-12 px-5 py-5">
                            <div class="row alert alert-primary successAlt" style="display: <?php echo $altScs; ?>;">
                                Account created successfully..!
                            </div>
                            <div class="row alert alert-success successAlt" style="display: <?php echo $altInfo; ?>;">
                                Your ID: <strong><?php echo $cliId; ?></strong><br>
                                Your Username: <strong><?php echo $email; ?></strong>
                            </div>
                            <div class="row alert alert-danger requiredAlt" style="display: <?php echo $altReq; ?>;">
                                Save Unsuccessfully..!
                            </div>
                            <form action="signup.php" method="post">
                                <div class="form-group row mt-4">
                                    <label class="col-sm-3 col-form-label"><strong>First Name <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="fName" name="fName" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Last Name <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="lName" name="lName" placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Email Address <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Mobile No <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="tel" class="form-control" name="mobile" placeholder="Mobile No 07********" pattern="0[0-9]{9}">
                                    </div>
                                </div>
                                
                                <hr>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Password <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Re-enter Password <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" id="repwd" name="repwd" placeholder="Re-enter Password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-7">
                                        <div id="msg"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-7">
                                        <button type="reset" class="btn btn-secondary resetBtn">Reset</button>
                                        <button type="submit" class="btn btn-success saveBtn" name="saveBtn">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>                
                </div>
            </section>
        
            <section>        
                <div class="footer position-relative">
                    <div class="container">
                        <div class="row">
                            <div class="footerLogo col-lg-4 col-md-4 col-sm-12 col-12 py-5">
                                <img src="../../img/logo_only.png">
                                <p class="mt-3">Aarogya Private Hospital</p>
                            </div> 
                            <div class="footerLink  col-lg-4 col-md-4 col-sm-12 col-12 py-5">
                                <h6>MAIN MENU</h6>
                                <ul>
                                    <a href="../../index_en.php"><li>Home</li></a>
                                    <a href="department_en.php"><li>Department</li></a>
                                    <a href="doctor_en.php"><li>Doctor</li></a>
                                    <a href="../login.php" target="_blank"><li>Login</li></a>
                                </ul>
                            </div>
                            <div class="footerLink  col-lg-4 col-md-4 col-sm-12 col-12 py-5">
                                <h6>HELP &amp; SUPPORT</h6>
                                <ul>
                                    <a href="contact_en.php"><li>Contact Us</li></a>
                                    <a href="about_en.php"><li>About Us</li></a>
                                </ul>
                            </div>
                        </div>
                        <div class="row border-top">
                            <div class="footerBottom col-lg-6 col-md-6 col-sm-6 col-6 py-3">
                                <p>copyright@aarogya | 2019</p>
                            </div>
                            <div class="sociaMedia col-lg-6 col-md-62 col-sm-6 col-12 py-3 text-right">
                                    <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-square fa-2x ml-3"></i></a>
                                    <a href="https://twitter.com/login?lang=en" target="_blank"><i class="fab fa-twitter-square fa-2x ml-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </body>
    
</html>