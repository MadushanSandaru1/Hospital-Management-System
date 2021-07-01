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
        
        $queryDocId = "SELECT id FROM `report` ORDER BY `id` DESC LIMIT 1";
        
        $result_set = mysqli_query($con,$queryDocId);

        if (mysqli_num_rows($result_set) == 1) {

            $lastId = mysqli_fetch_assoc($result_set);
            $num = substr($lastId['id'],1,strlen($lastId['id']));
            
        }
        else {
            $num = 0;
        }
        
        $id =  "R".sprintf("%05d", ++$num);
        
		$type = trim($_POST['type']);
        
        $desc = trim($_POST['desc']);
        
		$pncId = trim($_POST['pncId']);
        
        $date = trim($_POST['date']);
        
        if(isset($_FILES['report'])){
            $targetDir = "../report/";
            $fileName = $_FILES['report']['name'];
            $tmpFileName = $_FILES['report']['tmp_name'];
            $pathForSave = $targetDir.$fileName;

            $status = 0;

            $status = move_uploaded_file($tmpFileName, $pathForSave);

            if($status){
                $qurey="INSERT INTO `report`(`id`, `type`, `description`, `patientId`,`file`,`date`) VALUES ('{$id}','{$type}','{$desc}','{$pncId}','{$pathForSave}','{$date}')";
            }
            else {
                $qurey = "INSERT INTO `report`(`id`, `type`, `description`, `patientId`,`date`) VALUES ('{$id}','{$type}','{$desc}','{$pncId}','{$date}')";
            }
        } else {
            $qurey = "INSERT INTO `report`(`id`, `type`, `description`, `patientId`,`date`) VALUES ('{$id}','{$type}','{$desc}','{$pncId}','{$date}')";
        }

        $result = mysqli_query($con,$qurey);

        if ($result) {

            $altScs = 'block';
            $altReq = 'none';

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
        <title>Add Report | Aarogya</title>
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
                            <i class="fas fa-file-medical-alt fa-2x"></i>
                        </div>
                        <div class="col-md-11">
                            <span class="font-weight-bold"><big>Add Report</big><br><small>Report</small></span>
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
                            <a href="reportList.php" ><button type="button" class="btn btn-outline-primary"><i class="fas fa-list"></i>  Report List</button></a>
                            <br><hr><br>
                            <!-- Form -->
                            <form action="addReport.php" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Type<sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="type">
                                            <option value='Birth'>Birth</option>
                                            <option value='Operation'>Operation</option>
                                            <option value='Death'>Death</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label"><strong>Description</strong></label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control" name="desc" rows="5" placeholder="Description" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Client / Patient<sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="pncId">
                                            <?php
                                            
                                                $query = "SELECT `id`,`firstName`,`lastName` FROM `client` UNION SELECT `id`,`firstName`,`lastName` FROM `patient` ORDER BY `id`";

                                                $result_set = mysqli_query($con,$query);

                                                if (mysqli_num_rows($result_set) >= 1) {
                                                    
                                                    while($pnc = mysqli_fetch_assoc($result_set)){
                                                        echo "<option value='".$pnc['id']."'>".$pnc['firstName']." ".$pnc['lastName']."</option>";
                                                    }

                                                } else {
                                                    echo "<option value='".null."'>empty</option>";
                                                }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Report <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="report" accept="application/pdf">
                                            <label class="custom-file-label">Choose .pdf file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Date <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="date" placeholder="Date" required>
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