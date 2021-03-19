<?php
session_start();
include 'includes/dbconnect.php';

	$success = "";

	if(isset($_POST['submit'])){
        $fastagid = $_POST['fid'];
        // $iban = $_POST['iban'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
        $accno= $_POST['accno'];
    	$emailid = $_POST['emailid'];
    	$dob = $_POST['dob'];
    	$phone = $_POST['phone'];
		$vnum = $_POST['vnum'];
		// $city= $_POST['city'];
		// $state= $_POST['state'];
		// $country= $_POST['country'];
		$accdate = date('y-m-d');


		if(isset($_POST['submit'])){

            $ins_sql = "INSERT INTO fastag (fastagid, firstname, lastname, accno, emailid, dob, phonenum, vehiclenum, accopendate) VALUES ('".$fastagid."', '".$fname."', '".$lname."','".$accno."', '".$emailid."', '".$dob."', '".$phone."', '".$vnum."', '".$accdate."' )";
            
            $run_sql = mysqli_query($con,$ins_sql);
			$success = "Account added successfully!";
            header("refresh:2");
		}else{

			$success = "Something went wrong!";
            header("refresh:2");
		}

	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <Title>CITY BANK</Title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 d-flex justify-content-between">
                        <!-- Logo Area -->
                        <div class="logo">
                            <a><img src="img/core-img/logo.png" alt=""></a>
                        </div>

                        <!-- Top Contact Info -->
                        <div class="top-contact-info d-flex align-items-center">
                            <a href="#" data-toggle="tooltip" data-placement="bottom"
                                title="  10 th street Avenue, chennai, IND"><img src="img/core-img/placeholder.png"
                                    alt=""> <span> 10 th street Avenue, chennai, IND</span></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="info@CityBank.com"><img
                                    src="img/core-img/message.png" alt=""> <span>info@CityBank.com</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="credit-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="creditNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>

                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Contact -->
                        <div class="contact">
                            <!-- <a href="#"><img src="img/core-img/call2.png" alt=""> +92123456789 </a> -->
                            <?php if (isset($_SESSION['usr_id']))  ?>
                            <a href="logout.php">Log Out</a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/13.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Dashboard</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Fastag</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Elements Area Start ##### -->
    <section class="elements-area section-padding-70-0">
        <!-- ========== Web Icons ========== -->
        <div class="col-12">
            <div class="elements-title mb-30">

            </div>
        </div>
        <h3>Admin <?php echo $_SESSION['usr_name']; ?></h3>
        <div class="col-12 mb-70">
            <div class="row">

                <!-- Single Icons -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="single-icons mb-30">
                        <i class="icon-credit-card-1"></i>
                        <a href=#><span>Apply Fastag</span></a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="single-icons mb-30">
                        <i class="icon-diamond"></i>
                        <a href="admin.php"> <span>Dash Board</span></a>
                    </div>
                </div>


                <div class="container">
                    <div class="container">
                        <article class="row">
                            <section class="col-sm-8">
                                <div class="page-header">
                                    <h2>FASTAG </h2>
                                </div>
                                <form class="form-horizontal" action="fastag.php" method="post" role="form">
                                    <b>
                                        <div class="form-group">
                                            <label for="number" class="col-sm-3 control-label">Fastag ID:</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fid" class="form-control"
                                                    placeholder="Enter Fastag ID" id="fid" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="number" class="col-sm-3 control-label">First Name :</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fname" class="form-control"
                                                    placeholder="Enter customer's first name" id="fname" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="number" class="col-sm-3 control-label">Last Name :</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="lname" class="form-control"
                                                    placeholder="Enter customer's last name" id="lname" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text" class="col-sm-3 control-label">Account Number:</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="accno" class="form-control"
                                                    placeholder="Enter customer's Account number" id="accno" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text" class="col-sm-3 control-label">Email-Id :</label>
                                            <div class="col-sm-8">
                                                <input type="email" name="emailid" class="form-control"
                                                    placeholder="Enter customer's Email-Id" id="emailid" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text" class="col-sm-3 control-label">DOB :</label>
                                            <div class="col-sm-8">
                                                <input type="date" name="dob" class="form-control"
                                                    placeholder="YYYY-MM-DD" id="dob" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text" class="col-sm-3 control-label">Phone Number:</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="phone" class="form-control"
                                                    placeholder="Enter the phone number" id="phone" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="text" class="col-sm-3 control-label">Vehicle Number:</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="vnum" class="form-control"
                                                    placeholder="Enter Vehicle number" id="vnum" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-8">
                                                <input type="submit" id="submit" name="submit" value="Submit"
                                                    class="btn btn-primary mt-50 ">
                                                <!-- <input type="reset" id="reset" name="submit" value="Reset"
                                                    class="btn btn-danger mt-50"> -->
                                            </div>
                                        </div>
                                    </b>
                                </form>
                        </article>
    </section>
    </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label"></label>
        <div class="col-sm-8">
            <h4><?php echo $success ?></h4>
        </div>
    </div>


    <!-- ##### Elements Area End ##### -->


    <!-- Copywrite Area -->
    <div class="copywrite-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copywrite-content d-flex flex-wrap justify-content-between align-items-center">
                        <!-- Footer Logo -->
                        <a href="index.html" class="footer-logo"><img src="img/core-img/logo.png" alt=""></a>

                        <!-- Copywrite Text -->
                        <p class="copywrite-text"><a href="#">
                                Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                                </script> All rights reserved
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->
    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>