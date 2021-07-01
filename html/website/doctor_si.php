<?php

    /* database connection page include */
    require_once('../../connection/connection.php');

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>වෛද්‍යවරු | ආරෝග්‍යා</title>
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

    </head>
    
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../../index_si.php"><img id="logo" src="../../img/logo_only.png">  ආරෝග්‍යා පෞද්ගලික රෝහල</a>
                </div>
                <ul class="nav navbar-nav navbar-right lead">
                    <li class="nav-item"><a class="nav-link" href="index_si.php">මුල් පිටුව</a></li>
                    <li class="nav-item"><a class="nav-link" href="department_si.php">දෙපාර්තමේන්තු</a></li>
                    <li class="nav-item active"><a class="nav-link" href="doctor_si.php">වෛද්‍යවරු</a></li>
                    <li class="nav-item"><a class="nav-link" href="about_si.php">අපි ගැන</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact_si.php">ඇමතුම්</a></li>
                    <li class="nav-item"><a class="nav-link" href="../login.php" target="_blank">ඇතුල් වන්න</a></li>
                    <li>
                        <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-outline-primary"  onclick="window.location.href = 'doctor_en.php';">En</button>
                            <button type="button" class="btn btn-outline-primary"  onclick="window.location.href = 'doctor_si.php';">සිං</button>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

            <section class="col-12 doctorImg container-fluid">
                
            </section>
        
            <section>        
                <div class="container">
                    <div class="row">
                        <div class="depList col-lg-3 col-md-3 col-sm-12 col-12 mt-5 mb-5">
                            <div class="py-5 px-2">
                                <h5 class="mb-4">දෙපාර්තමේන්තු</h5>
                                    <?php

                                    $query = "SELECT * FROM `department` ORDER BY `name`";

                                    $result_set = mysqli_query($con,$query);

                                    if (mysqli_num_rows($result_set) >= 1) {
                                        
                                        echo "<p><a href='doctor_si.php?id=12345}'><hr><i class='fas fa-angle-double-right'></i> සියලුම දෙපාර්තමේන්තු<hr></a></p>";

                                        while($deptName = mysqli_fetch_assoc($result_set)){
                                            echo "<p><a href='doctor_si.php?id={$deptName['id']}'><hr><i class='fas fa-angle-double-right'></i> ".$deptName['name']."<hr></a></p>";
                                        }

                                    } else {
                                        echo "<p><hr><i class='fas fa-angle-double-right'></i> List Empty<hr></p>";
                                    }

                                ?>
                            </div>
                        </div>
                        
                        <div class="deptList col-lg-9 col-md-9 col-sm-12 col-12">
                            <div class="deptDesc py-5 ml-3" name="deptDesc" id="deptDesc">
                                <div class="row d-flex justify-content">
                                    <?php

                                        if(isset($_GET['id'])){
                                            if($_GET['id']==12345){
                                                $query = "SELECT do.firstName AS fName, do.lastName AS lName, mobile, email FROM `doctor` do,`department` de WHERE de.id = do.department";
                                            } else {
                                                $deId = $_GET['id'];
                                                
                                                $query = "SELECT do.firstName AS fName, do.lastName AS lName, mobile, email FROM `doctor` do,`department` de WHERE de.id = do.department AND de.id = '{$deId}'";
                                            }

                                            $result_set = mysqli_query($con,$query);

                                            if (mysqli_num_rows($result_set) >= 1) {
                                                
                                                    while($doct = mysqli_fetch_assoc($result_set)){
                                                        echo "<div class='card img-fluid border-primary mb-3 ml-3' style='width: 250px;height: 10rem;box-shadow: 4px 4px 4px rgba(38,143,255, 0.5);'>
                                                            <i class='far fa-address-card fa-7x' style='color:gainsboro;position:absolute; bottom:0; right:0;'></i>
                                                            <div class='card-body card-img-overlay'>
                                                                <h5 class='text-primary'>Dr. ".$doct['fName']." ".$doct['lName']."</h5>
                                                                <h5 class='text-warning'>".$doct['mobile']."</h5>
                                                                <h6 class='text-danger'>".$doct['email']."</h6>
                                                            </div>
                                                        </div>";
                                                    }

                                            } else {
                                                echo "<h3 class='text-danger'>There are currently no doctors in this department</h3>";
                                            }
                                        } else {
                                            
                                            $query = "SELECT do.firstName AS fName, do.lastName AS lName, mobile, email FROM `doctor` do,`department` de WHERE de.id = do.department";
                                            
                                            $result_set = mysqli_query($con,$query);

                                            if (mysqli_num_rows($result_set) >= 1) {
                                                
                                                    while($doct = mysqli_fetch_assoc($result_set)){
                                                        echo "<div class='card img-fluid border-primary mb-3 ml-3' style='width: 250px;height: 10rem;box-shadow: 4px 4px 4px rgba(38,143,255, 0.5);'>
                                                            <i class='far fa-address-card fa-7x' style='color:gainsboro;position:absolute; bottom:0; right:0;'></i>
                                                            <div class='card-body card-img-overlay'>
                                                                <h4 class='text-primary'>Dr. ".$doct['fName']." ".$doct['lName']."</h4>
                                                                <h5 class='text-warning'>".$doct['mobile']."</h5>
                                                                <h6 class='text-danger'>".$doct['email']."</h6>
                                                            </div>
                                                        </div>";
                                                    }

                                            } else {
                                                echo "<h3 class='text-danger'>There are currently no doctors in this department</h3>";
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
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
                                <p class="mt-3">ආරෝග්‍යා පෞද්ගලික රෝහල</p>
                            </div> 
                            <div class="footerLink  col-lg-4 col-md-4 col-sm-12 col-12 py-5">
                                <h6><b>ප්‍රධාන මෙනු</b></h6>
                                <ul>
                                    <a href="index_si.php"><li>මුල් පිටුව</li></a>
                                    <a href="department_si.php"><li>දෙපාර්තමේන්තු</li></a>
                                    <a href="doctor_si.php"><li>වෛද්‍යවරු</li></a>
                                    <a href="../login.php" target="_blank"><li>ඇතුල් වන්න</li></a>
                                </ul>
                            </div>
                            <div class="footerLink  col-lg-4 col-md-4 col-sm-12 col-12 py-5">
                                <h6><b>උදව් සහ සහාය</b></h6>
                                <ul>
                                    <a href="contact_si.php"><li>ඇමතුම්</li></a>
                                    <a href="about_si.php"><li>අපි ගැන</li></a>
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