<?php
    /* start the session */
	session_start();

    /* database connection page include */
    require_once('../connection/connection.php');

?>

<?php 

	$flag = '';

	if(isset($_POST['login'])) {

		/* data for login */
		$username =  mysqli_real_escape_string($con,trim($_POST['username']));
		$pwd = mysqli_real_escape_string($con,trim($_POST['password']));
        
        /* password encrypt */
		$h_pwd = sha1($pwd);
        
        /* login query */
		$login_qurey = "SELECT * FROM `user` WHERE `is_deleted` = 0 AND `password` = '$h_pwd ' AND (`username` = '$username' OR `id` = '$username') LIMIT 1";

        /* query execute */
		$result_set = mysqli_query($con,$login_qurey);

        /* query result */
		if (mysqli_num_rows($result_set)==1) {
			$details = mysqli_fetch_assoc($result_set);
            
            /* if user available, user info load to session array */
			$_SESSION = array();
            $_SESSION['id'] = $details['id'];
            $_SESSION['username'] = $details['username'];
			$_SESSION['role'] = $details['role'];
            
            $qurey = "SELECT * FROM `{$_SESSION['role']}` WHERE `id` = '{$_SESSION['id']}' LIMIT 1";
            $result_set = mysqli_query($con,$qurey);
            $user_details = mysqli_fetch_assoc($result_set);
            /* if user available, user info load to session array */
			
			$_SESSION['firstName'] = $user_details['firstName'];
            $_SESSION['lastName'] = $user_details['lastName'];
            $_SESSION['mobile'] = $user_details['mobile'];
            
            /* redirect to dashboard page */
			header("location:dashboard.php");
            
		}
        /* if user not available, displayerror msg */
		else{
			$flag = "Incorrect username or password.";
		}

	}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login | Aarogya</title>
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
        
        <!-- css -->
        <link href="../css/login.css" rel="stylesheet">
        
        <!-- google font -->
        <link href='https://fonts.googleapis.com/css?family=Baloo Chettan' rel='stylesheet'>

    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class=" col-md-6 login-area text-center">
                    <div class="login-header">
                        <img src="../img/logo.png" alt="logo" class="logo">
                        <p class="title">Hospital Management System</p>
                    </div>
                    <div class="login-content">
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <input type="text" class="input-field" name="username" placeholder="User Name" required id>
                            </div>
                            <div class="form-group">
                                <input type="password" class="input-field" name="password" placeholder="Password" required autocomplete="off" id = "password">
                            </div>
                            <button type="submit" class="btn btn-outline-primary" name="login">Login    <i class="fa fa-lock"></i></button>
                        </form>

                        <div class="login-bottom-links">
                            <a href="#" class="link">Forgot Your Password ?</a>
                            <a href="website/signup.php" class="link">Don't have an account !</a>
                        </div>
                        <br/>
                        <p>
                            <?php
                                /* display error msg */
                                if($flag!=''){
                                    echo "<p style='color:#f00; margin-bottom:10px'>{$flag}</P>";		
                                }
                            ?>
                        </p>
                    </div>
                </div>
                <div class="image-area col-md-6">
                </div>
            </div>
        </div>
    </body>
</html>
