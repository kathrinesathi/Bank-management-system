<?php
session_start();
include 'includes/dbconnect.php';

	$success = "";

	if(isset($_POST['submit'])){

		$accno = $_POST['accno'];
		// $accemail = $_POST['accemail'];

		$i_sql = "SELECT * FROM accounts WHERE accno = '".$accno."'";
		$r_sql = mysqli_query($con,$i_sql);

		$rows = mysqli_fetch_array($r_sql);

		$accno1 = $rows['accno'];

		if($accno1==$accno){


			$ins_sql = "DELETE FROM accounts WHERE accno ='".$accno."'";
			$run_sql = mysqli_query($con,$ins_sql);
			// $in_sql = "DELETE FROM customers WHERE emailid ='".$accemail."'";
			// $ru_sql = mysqli_query($con,$in_sql);

			$success = "Account deleted successfully!";
		}else{

			$success = "Account number and email does not match!";
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
    <Title>BB Bank.com - BB Company</Title>

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
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="info@bb.com"><img
                                    src="img/core-img/message.png" alt=""> <span>info@bb.com</span></a>
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
                                    <!-- <li><a href="index.html">Home</a></li>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="services.html">Services</a>
                                        <div class="dropdown">
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="#">Portfolio 1</a></li>
                                                <li><a href="#">Portfolio 2</a></li>
                                                <li><a href="#">Portfolio 3</a></li>
                                            </ul>
                                        </li>
                                    <li><a href="post.html">Blog</a></li> -->
                                    <!-- <li><a href="contact.html">Contact</a></li> -->
                                    <!-- <li><a href="login.html">Login</a></li> -->
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
                                <li class="breadcrumb-item active" aria-current="page">Add customer</li>
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
                <!-- <div class="line"></div>
                <h2>Admin DashBoard</h2> -->
            </div>
        </div>
        <h3>Admin <?php echo $_SESSION['usr_name']; ?></h3>

        <div class="col-12 mb-70">
            <div class="row">



                <!-- Single Icons -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="single-icons mb-30">
                        <i class="fa fa-user"></i>
                        <a href=#><span>Add Customer</span></a>

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
                            <section class="col-lg-8">
                                <div class="page-header">
                                    <h2>Please fill !!!</h2>
                                </div>
                                <form class="form-horizontal" action="deleteaccount.php" method="post" role="form">
                                    <b>
                                        <div class="form-group">

                                            <label>IBAN number :</label><br>
                                            <input class="form-control" placeholder=IBAN name="iban" type="text"
                                                required />


                                        </div>

                                        <div class="form-group">


                                            <label>First Name :</label><br>
                                            <input class="form-control" placeholder=firstname name="firstname"
                                                type="text" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name :
                                            </label><br>
                                            <input class="form-control" placeholder=lastname name="lastname" type="text"
                                                required />

                                        </div>
                                        <!-- <div class="form-group">

                                            <label>Gender :</label>

                                            <div class="flex-container-radio">
                                                <div class="container">
                                                    <input type="radio" name="gender" value="male" id="male-radio"
                                                        checked>
                                                    <label id="radio-label" for="male-radio"><span
                                                            class="radio">Male</span></label>
                                                </div>
                                                <div class="container">
                                                    <input type="radio" name="gender" value="female" id="female-radio">
                                                    <label id="radio-label" for="female-radio"><span
                                                            class="radio">Female</span></label>
                                                </div>
                                                <div class="container">
                                                    <input type="radio" name="gender" value="others" id="other-radio">
                                                    <label id="radio-label" for="other-radio"><span
                                                            class="radio">Others</span></label>
                                                </div>
                                            </div>
                                        </div> -->

                                        <!-- <div class="form-group">

                                            <label>Date of Birth :</label><br>
                                            <input class="form-control" name="dob" type="text" placeholder="yyyy-mm-dd"
                                                required />

                                        </div> -->

                                        <!-- <div class="form-group">

                                            <label>Citizenship No :</label><br>
                                            <input class="form-control" name="aadhar" type="text" required />

                                        </div> -->

                                        <div class="form-group">

                                            <label>Email-ID :</label><br>
                                            <input class="form-control" placeholder=email id name="emailid" type="text"
                                                required />
                                        </div>
                                        <div class="form-group">
                                            <label>Password :
                                            </label><br>
                                            <input class="form-control" placeholder=password name="password" type="text"
                                                required />
                                        </div>
                                        <div class="form-group">
                                            <label>Pin :
                                            </label><br>
                                            <input class="form-control" placeholder=PIN name="transpassword" type="text"
                                                required />
                                        </div>
                                        <div class="form-group">
                                            <label>Account Status:</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="acctype" id="acctype">
                                                    <option>Savings</option>
                                                    <option>Current</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>City:</label><br>
                                            <input class="form-control" placeholder=city name="city" required />
                                        </div>

                                        <div class="form-group">
                                            <label>State :</label>
                                            <input class="form-control" placeholder=state name="state" type="text"
                                                required />
                                        </div>

                                        <!-- <div class="form-group">
                                            <select name="branch">
                                                <option value="delhi">Kathmandu</option>
                                                <option value="delhi">Delhi</option>
                                                <option value="newyork">New York</option>
                                                <option value="paris">Paris</option>
                                                <option value="riyadh">Riyadh</option>
                                                <option value="moscow">Moscow</option>
                                            </select>

                                        </div> -->

                                        <div class="form-group">

                                            <label>Country :</label><br>
                                            <input class="form-control" placeholder=country name="country" type="text"
                                                required />
                                        </div>

                                        <!-- <div class="form-group">

                                            <label>Username :</label><br>
                                            <input class="form-control" name="cus_uname" type="text" required />
                                        </div> -->




                                        <div class="form-group">

                                            <input type="submit" id="submit" name="submit" value="Submit"
                                                class="btn btn-block btn-primary">
                                            <input type="reset" id="reset" name="submit" value="Reset"
                                                class="btn btn-block btn-warning">


                                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Email-address *</label>
                            <div class="col-sm-8">
                                  <input  class="form-control"type="email" name="accemail" class="form-control" placeholder="Enter Email-address" id="accemail" required>
                            </div>
                    </div> -->

                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-8">
                            <h4><?php echo $success ?></h4>
                        </div>
                    </div>
                    </b>


                    </form>
    </section>
    </article>



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
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                                </script> All rights reserved
                            </a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
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