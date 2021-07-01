<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ඇමතුම් | ආරෝග්‍යා</title>
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
                    <li class="nav-item"><a class="nav-link" href="doctor_si.php">වෛද්‍යවරු</a></li>
                    <li class="nav-item"><a class="nav-link" href="about_si.php">අපි ගැන</a></li>
                    <li class="nav-item active"><a class="nav-link" href="contact_si.php">ඇමතුම්</a></li>
                    <li class="nav-item"><a class="nav-link" href="../login.php" target="_blank">ඇතුල් වන්න</a></li>
                    <li>
                        <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-outline-primary"  onclick="window.location.href = 'contact_en.php';">En</button>
                            <button type="button" class="btn btn-outline-primary"  onclick="window.location.href = 'contact_si.php';">සිං</button>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

            <section class="col-12 map container">
                <div class="row">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=aarogya%20hos&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>
                    </div>
                </div>
            </section>
        
            <section>        
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center mt-5 mb-5">
                            <h1>උපකාර සඳහා අප අමතන්න</h1>
                            <h6 class="lead">කරුණාකර අප අමතන්න හෝ පහත ආකෘති පත්‍රය සම්පුර්ණ කරන්න,අපි ඔබට ඉක්මනින් පණිවිඩයක් එවන්නෙමු</h6>
                        </div>
                    </div> 
                    <div class="row mb-5">
                        <div class="contactForm col-lg-7 col-md-7 col-sm-12 col-12 px-5 py-5">
                            <form>
                                <div class="form-group row py-4">
                                    <label class="col-4 col-form-label"><strong>නම <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="name" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="form-group row py-4">
                                    <label class="col-4 col-form-label"><strong>විද්‍යුත් තැපැල් ලිපිනය <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-8">
                                        <input type="email" class="form-control" id="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group row py-4">
                                    <label class="col-4 col-form-label"><strong>දුරකථන අංකය</strong></label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="telephone" placeholder="Telephone">
                                    </div>
                                </div>
                                <div class="form-group row py-4">
                                    <label class="col-4 col-form-label"><strong>ඔබේ පණිවිඩය <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-8">
                                        <textarea class="form-control" id="message" rows="5" placeholder="Message" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row py-4">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <button type="button" class="btn btn-success">පණිවුඩය යවන්න</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                            <div class="contactDetails px-5 py-5">
                                <h5 class="mb-4"><b>ආරෝග්‍යා පෞද්ගලික රෝහල</b></h5>
                                
                                <hr><hr>
                                
                                <pre>   වෙරළ පාර,<br>   තංගල්ල,<br>   ශ්‍රී ලංකාව.</pre>
                                <hr><hr>
                                
                                <h5 class="mb-4"><b>රෝහල් ඇමතුම්</b></h5>
                                
                                <h6><b>උපකාරක සේවා</b></h6>
                                <pre>   1234 (කෙටි කේතය)<br>   +94 (0)11 1234567</pre>
                                
                                <h6><b>හදිසි අනතුරු සහ හදිසි අවස්ථා</b></h6>
                                <pre>   +94 (0)11 7654321<br>   +94 (0)11 1234567</pre>
                                
                                <h6><b>ෆැක්ස්</b></h6>
                                <pre>   +94 (0)11 1236547</pre>
                                
                                <h6><b>විද්‍යුත් තැපෑල</b></h6>
                                <pre>   contactus@aarogya.com</pre>
                                <hr><hr>
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
