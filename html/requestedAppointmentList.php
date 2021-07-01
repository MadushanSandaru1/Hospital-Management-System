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


    if(isset($_GET['id1'])) {
	    
        $id =  mysqli_real_escape_string($con,$_GET['id1']);
        
        if($_SESSION['username'] == $id){
            //should not be delete current user
            header("location:requestedAppointmentList.php");
        } else {
            //copy record
            $query = "INSERT INTO `appointment`(`doctorId`, `clientId`, `date`, `time`) select `doctorId`, `clientId`, `date`, `time` from `requestedappointment` WHERE `id` = {$id}";

            $result = mysqli_query($con,$query);
            
            if($result) {
                $query = "UPDATE `requestedappointment` SET is_deleted = 1 WHERE id = '{$id}' LIMIT 1";

                $result = mysqli_query($con,$query);
                header("location:requestedAppointmentList.php");
            }

        }
        
	} 

    if(isset($_GET['id'])) {
	    
        $id =  mysqli_real_escape_string($con,$_GET['id']);
        
        if($_SESSION['username'] == $id){
            //should not be delete current user
            header("location:requestedAppointmentList.php");
        } else {
            //deleting record
            $query = "UPDATE `requestedappointment` SET is_deleted = 1 WHERE id = '{$id}' LIMIT 1";

            $result = mysqli_query($con,$query);
            
            if($result) {
                header("location:requestedAppointmentList.php");
            }

        }
        
	} 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Requested Appointment List | Aarogya</title>
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
                            <i class="far fa-calendar-check fa-2x"></i>
                        </div>
                        <div class="col-md-11">
                            <span class="font-weight-bold"><big><?php if($_SESSION['role'] != 'client') echo "Requested"; else echo "Pending"; ?> Appointment List</big><br><small>Appointment</small></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 form">
                            <div class="row">
                                <div class='col-md-8'>
                                    
                                </div>
                                <div class="col-md-4">
                                    <form action="requestedAppointmentList.php" method="get">
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
                                    <th scope="col">Date</th>
                                    <th scope="col">Doctor</th>
                                    <th scope="col">Client/Patient</th>
                                    <?php
                                        if($_SESSION['role'] != ''){
                                            echo "<th scope='col'>Action</th>";
                                        }
                                    ?>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  
                                    if(isset($_GET['search'])){
                                        $search =  mysqli_real_escape_string($con,$_GET['searchTxt']);
                                        
                                        $query = "SELECT a.*,d.firstName as fn, d.lastName as ln FROM `requestedappointment` a, `doctor` d WHERE a.is_deleted = 0 AND a.doctorId = d.id AND a.`id` LIKE '{$search}%' OR a.`doctorId` LIKE '{$search}%' OR a.`clientId` LIKE '{$search}%' OR a.`date` LIKE '{$search}%' ORDER BY `date`";
                                    } else {
                                        
                                        if($_SESSION['role'] == 'doctor'){
                                            $query = "SELECT a.*,d.firstName as fn, d.lastName as ln FROM `requestedappointment` a, `doctor` d WHERE a.is_deleted = 0 AND a.doctorId = d.id AND a.doctorId = '{$_SESSION['id']}' ORDER BY `date`";
                                        } else if($_SESSION['role'] == 'client'){
                                            $query = "SELECT a.*,d.firstName as fn, d.lastName as ln FROM `requestedappointment` a, `doctor` d WHERE a.is_deleted = 0 AND a.doctorId = d.id AND a.clientId = '{$_SESSION['id']}' ORDER BY `date`";
                                        } else {
                                            $query = "SELECT a.*,d.firstName as fn, d.lastName as ln FROM `requestedappointment` a, `doctor` d WHERE a.is_deleted = 0 AND a.doctorId = d.id ORDER BY `date`";
                                        }
                                    }
                                  
                                    $result_set = mysqli_query($con,$query);

                                    if (mysqli_num_rows($result_set) >= 1) {

                                        while($ap = mysqli_fetch_assoc($result_set)){
                                            
                                            echo "<tr>";
                                            echo "<td>".$ap['date']." ".$ap['time']."</td>";
                                            echo "<td>".$ap['fn']." ".$ap['ln']."</td>";
                                            echo "<td>".$ap['clientId']."</td>";
                                            echo "<td>";
                                            if($_SESSION['role'] != 'client'){
                                                echo "<a href='requestedAppointmentList.php?id1={$ap['id']}' onclick=\"return confirm('Are you sure to approve this appointment ?');\"><i class='fas fa-check mr-3' data-toggle='tooltip' title='Approve'></i></a>";
                                            } else {
                                                echo "<a href='#');\"><i class='fas fa-edit mr-3' data-toggle='tooltip' title='Edit'></i></a><a href='requestedAppointmentList.php?id={$ap['id']}' onclick=\"return confirm('Are you sure to delete this information ?');\"><i class='fas fa-trash-alt' data-toggle='tooltip' title='Delete' style='color:red;'></i></a>";
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