<html>
    
    <!-- icon that shows when the sidebar is hidden -->
    <a id="show-sidebar" class="btn btn-sm" href="#">
        <i class="fas fa-list"></i>
    </a>

    <!-- sidebar -->
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <!-- logo -->
                <a href="../html/dashboard.php"><img src="../img/logo.png" width="175px"></a>
                <!-- sidebar hidden icon -->
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>

            <div class="sidebar-header">
                <!-- user's picture -->
                <div class="user-pic">
                    <?php
                        echo '<img class="img-responsive img-rounded" src="../img/admin.png" alt="User picture">';
                    ?>

                </div>
                
                <div class="user-info">
                    <!-- display user's name -->
                    <span class="user-name">
                        <?php
                            echo "Mr. ";
                        ?>
                        <strong>
                            <?php
                                echo $_SESSION['lastName'];
                            ?>
                        </strong>
                    </span>
                    <!-- display user's role -->
                    <span class="user-role">
                        <?php
                            switch($_SESSION['role']){
                                case 'admin':
                                    echo 'Administrator';
                                    break;
                                case 'nurse':
                                    echo 'Nurse';
                                    break;
                                case 'doctor':
                                    echo 'Doctor';
                                    break;
                                case 'accountant':
                                    echo 'Accountant';
                                    break;
                                case 'laboratorist':
                                    echo 'Laboratorist';
                                    break;
                                case 'client':
                                    echo 'Client';
                                    break;
                            }
                        
                            echo " | ".$_SESSION['id'];
                        
                        ?>                                    
                    </span>
                    <span class="user-status"><i class="fa fa-circle"></i><span>Online</span></span>
                </div>
                
            </div>
            <!-- sidebar-header  -->

            <div class="sidebar-menu">
                <ul>                            
                    <li><a href="dashboard.php"><i class="fa fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="sidebar-dropdown" id="departmentLink"><a href="#"><i class="fas fa-building"></i><span>Department</span></a>
                        <div class="sidebar-submenu">
                            <ul>
                                <?php
                                    echo "<li><a href='addDepartmet.php'>Add Department</a></li>";
                                ?>
                                <li><a href="departmetList.php">Department List</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="sidebar-dropdown" id="doctorLink"><a href="#"><i class="fas fa-user-md"></i><span>Doctor</span></a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="addDoctor.php">Add Doctor</a></li>
                                <li><a href="doctorList.php">Doctor List</a></li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->


    </nav>
</html>