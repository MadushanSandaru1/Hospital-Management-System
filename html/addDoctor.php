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

<?php

    $altScs = 'none';
    $altReq = 'none';

	if(isset($_POST['saveBtn'])) {

        $queryDocId = "SELECT id FROM `doctor` ORDER BY `id` DESC LIMIT 1";
        
        $result_set = mysqli_query($con,$queryDocId);

        if (mysqli_num_rows($result_set) == 1) {

            $lastId = mysqli_fetch_assoc($result_set);
            $num = substr($lastId['id'],3,strlen($lastId['id']));
            
        }
        else {
            $num = 0;
        }
        
        $docId =  "DOC".sprintf("%03d", ++$num);
        
        $fn = trim($_POST['fName']);
		$fName =  ucfirst($fn);
        
        $ln = trim($_POST['lName']);
		$lName =  ucfirst($ln);
        
		$email = trim($_POST['email']);
        
        $mobile = trim($_POST['mobile']);
        
		$dept = trim($_POST['dept']);
        
        $p = trim($_POST['pwd']);
        $pwd = sha1($p);
        
        $qurey = "INSERT INTO `doctor` VALUES ('{$docId}','{$fName}','{$lName}','{$email}','{$mobile}','{$dept}',0)";

        $result = mysqli_query($con,$qurey);

        if ($result) {

            $altScs = 'block';
            $altReq = 'none';
            
            $qurey = "INSERT INTO `user`(`id`,`username`, `password`, `role`) VALUES ('{$docId}','{$email}','{$pwd}','doctor')";
            mysqli_query($con,$qurey);

        }
        else{
            $altScs = 'none';
            $altReq = 'block';
        }

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
        
        <script>
            $(document).ready(function(){
                $("#repwd").keyup(function(){
                    if ($("#pwd").val() != $("#repwd").val()) {
                        $("#msg").html("Password do not match").css("color","red");
                    }else{
                        $("#msg").html("Password matched").css("color","green");
                    }
                });
            });
        </script>

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
                            <i class="fas fa-user-md fa-2x"></i>
                        </div>
                        <div class="col-md-11">
                            <span class="font-weight-bold"><big>Add Doctor</big><br><small>Doctor</small></span>
                        </div>
                    </div>
                    <div class="row alert alert-primary successAlt" style="display: <?php echo $altScs; ?>;">
                        Save Successfully..!
                    </div>
                    <div class="row alert alert-danger requiredAlt" style="display: <?php echo $altReq; ?>;">
                        Save Unsuccessfully..!
                    </div>
                    <div class="row">
                        <div class="col-md-12 form">
                            <a href="doctorList.php" ><button type="button" class="btn btn-outline-primary"><i class="fas fa-list"></i>  Doctor List</button></a>
                            <br><hr><br>
                            <!-- Form -->
                            <form action="addDoctor.php" method="post">
                                <div class="form-group row">
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
                                
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Department <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="dept">
                                            <?php
                                            
                                                $query = "SELECT * FROM `department` WHERE `is_deleted` = 0 ORDER BY `name`";

                                                $result_set = mysqli_query($con,$query);

                                                if (mysqli_num_rows($result_set) >= 1) {
                                                    
                                                    while($dept = mysqli_fetch_assoc($result_set)){
                                                        echo "<option value='".$dept['id']."'>".$dept['name']."</option>";
                                                    }

                                                } else {
                                                    echo "<option value='".null."'>empty</option>";
                                                }

                                            ?>
                                        </select>
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
            </main>
            <!-- page-content" -->
        </div>
        <!-- page-wrapper -->
        
    </body>

    </html>