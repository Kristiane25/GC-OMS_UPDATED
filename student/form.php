<?php

  session_start();  
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <title>GC-OMS | Students</title>

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    
    <link href="assets/css/styles.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />





    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="..\assets\img\logo\gcoms.png">
    <style>
    .small-width {
    width: 160px; /* Adjust the width as needed */
    }

    .mid-width {
    width: 315px; /* Adjust the width as needed */
    }

    .smaller-card {
    width: 500px; /* Adjust the width as needed */
    height: 150px; /* Adjust the height as needed */
}

    .custom-btn {
        background-color: orange;
        color: block;
        padding: 10px 25px; /* Adjust padding to make the button larger */
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .custom-btn:hover {
        background-color: #FFA07A; /* darker color */
    }
    </style>

</head>


<body class="fixed-left">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-orange">
        <!-- Navbar Brand-->
        <a class="navbar-brand text-center font-weight-normal" style="color: #000000;" href="index.php"><button class="btn btn-link btn-sm order-1 order-lg-0 me-0 me-lg-0" id="sidebarToggle" style="color: #000000;" href="#!">
            <i class="fas fa-bars"></i></button>GC - OMS</a>
        <!-- Sidebar Toggle-->
        <!-- <button class="btn btn-link btn-sm order-1 order-lg-0 me-0 me-lg-0" id="sidebarToggle" href="#!"> -->
        <!-- <i class="fas fa-bars"></i></button> -->
        <!-- Navbar Search-->
        <div>
            <h4 class="m-t-10 m-l-20 header-title" style="color: #000000;">Student Profile</h4>
        </div>
        <!-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="time">
                <h5> <i class="fa fa-calendar" aria-hidden="true"></i> <span id="time"> </span></h5>
            </div>
        </form> -->
        <!-- Navbar-->
    </nav>




    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a href="index.php"><img class="userpic" src="assets/images/\users/user.jpg"
                                style="width:90px;height:90px;"></a>
                        <a id="department" class="nav-link text-center" href="form.php"> &nbsp; &nbsp; &nbsp;
                            <?php echo $_SESSION['name']; ?>
                            <br><?php echo $_SESSION['program']; ?></a>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-arrow-right" style="color: #000000;"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="form.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-arrow-right" style="color: #000000;"></i></div>
                            Student Profile
                        </a>
                        <a class="nav-link" href="upload.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-arrow-right" style="color: #000000;"></i></div>
                            Upload Documents
                        </a>
                        <a class="text-black btn btn-lg btn-primary"  href="logout.php"><i class="mr-2 fas fa-sign-out" style="color: #000000;"></i><span style="color: #000000;">LOGOUT</span></a>
                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">

            <div class="card-box" id="cardBox" style="background-color: #FFFFFF; margin-left: 20px; margin-top: 30px; margin-right: 20px; overflow: auto; height: 575px;">
                <h4 class="m-t-0 header-title" style="color: black; text-align: center;">Student Info</h4>


                <div class="row">
                    <div class="col-12">
                        <div class="p-20">
                            <form class="form-horizontal" role="form" method="POST" action="process_form.php">

                                <div class="form-group row">
                                    <label class="col-2 col-form-label" style="color: black;">Fullname</label>
                                        <div class="col-10">
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" class="form-control mid-width" placeholder="Last Name" name="last_name" style="margin-bottom: 10px;">     
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" class="form-control mid-width" placeholder="First Name" name="first_name" style="margin-bottom: 10px;">
                                                </div>
                                            </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" class="form-control mid-width" placeholder="Middle Name" name="mid_name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                <div class="form-group row">
                                    <label class="col-2 col-form-label" style="color: black;">Program</label>
                                    <div class="col-md-10">
                                        <select class="form-control small-width" name="program" >
                                            <option value="">Select Program</option>
                                            <option value="option1">ACT</option>
                                            <option value="option2">BSCS</option>
                                            <option value="option3">BSEMC</option>
                                            <option value="option4">BSIT</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label" style="color: black;">E-mail</label>
                                    <div class="col-md-10">
                                        <input class="form-control mid-width" placeholder="Enter E-mail" type="email" name="email"">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label" style="color: black;">Contact Number</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control mid-width" placeholder="Enter Contact Number" name="contact_no">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label" style="color: black;">Home Address</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control mid-width" placeholder="Enter Home Address" name="home_address">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label" style="color: black;">Birthday</label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control small-width" name="birthday">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label" style="color: black;">Civil Status</label>
                                    <div class="col-md-10">
                                        <select class="form-control small-width" id="Civilstat_select" name="civil_status">
                                            <option value="">Select</option>
                                            <option value="option1">Married</option>
                                            <option value="option2">Single</option>
                                            <option value="other">Other</option> <!-- Added "Other" option -->
                                        </select>
                                            <input type="text" class="form-control small-width mt-2" id="otherCivilStatinput" name="other_civilstat" style="display: none;"                                                                 placeholder="Enter your Civil Status">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label" style="color: black;">Gender</label>
                                    <div class="col-md-10">
                                        <select class="form-control small-width" id="Gender_select" name="gender">
                                            <option value="">Select</option>
                                            <option value="option1">Female</option>
                                            <option value="option2">Male</option>
                                            <option value="option2">Prefer not to say</option>
                                            <option value="other">Other</option> <!-- Added "Other" option -->
                                        </select>
                                            <input type="text" class="form-control small-width mt-2" id="otherGenderinput" name="other_gender" style="display: none;"                                                                 placeholder="Enter your Gender">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label" style="color: black;">Religion</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control mid-width" placeholder="Religion" name="religion">
                                    </div>
                                </div> 

                                <div class="form-group row">
                                    <label class="col-2 col-form-label" style="color: black;">Citizenship</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control mid-width" placeholder="Enter Citizenship" name="citizenship">
                                    </div>
                                </div>

                                <h4 class="m-t-0 header-title" style="color: black; text-align: center; margin-top: 50px; margin-bottom: 30px;">Practicum Industry Partner</h4>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label" style="color: black;">Name of Company</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control mid-width" placeholder="Enter Name of Company" name="company_name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label" style="color: black;">Company Address</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control mid-width"  placeholder="Enter Company Address" name="company_address">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label" style="color: black;">Head of the Company</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control mid-width" placeholder="Enter Head of the Company" name="head_name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label" style="color: black;">Position (Head of the Company)</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control mid-width" placeholder="Enter Position (Head of the Company)" name="head_position">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label" style="color: black;">Immediate Supervisor of the Student Trainee</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control mid-width" placeholder="Enter Immediate Supervisor of the Student Trainee" name="superisor_name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label" style="color: black;">Position (Immediate Supervisor)</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control mid-width" placeholder="Enter Position (Immediate Supervisor)" name="superisor_pos">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label" style="color: black;">Company Contact Number</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control mid-width" placeholder="Enter Company Contact Number" name="company_no">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label" style="color: black;">Company E-mail Address</label>
                                    <div class="col-md-10">
                                        <input class="form-control mid-width" type="email" placeholder="Enter Company E-mail Address" name="company_email">
                                    </div>
                                </div>



                                
                            
                                
                                <button type="submit" class="btn custom-btn">Submit</button>

                                

                            </form>
                        </div>
                    </div>

                </div>
                
            </div>
    </div>
            



    

    



    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>


    <script>
    document.getElementById("Civilstat_select").addEventListener("change", function() {
        var otherProgramInput = document.getElementById("otherCivilStatinput");
        if (this.value === "other") {
            otherProgramInput.style.display = "block";
        } else {
            otherProgramInput.style.display = "none";
        }
    });
</script>

<script>
    document.getElementById("Gender_select").addEventListener("change", function() {
        var otherProgramInput = document.getElementById("otherGenderinput");
        if (this.value === "other") {
            otherProgramInput.style.display = "block";
        } else {
            otherProgramInput.style.display = "none";
        }
    });
</script>


</body>

</html>


