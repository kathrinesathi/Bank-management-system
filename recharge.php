<?php
session_start();
include 'includes/dbconnect.php';
$id = addslashes($_SESSION['usr_id']);
	$success = "";

	if(isset($_POST['submit'])){
        
		$accno = $_POST['accno'];
		$vnum = $_POST['vnum'];
		$amount= $_POST['amount'];
		$sql1 = "SELECT * FROM fastag WHERE vehiclenum = '$vnum'";
			$run1 = mysqli_query($con, $sql1);

			$row1 = mysqli_fetch_array($run1);

			
			$balance = $row1['amount'];


		if($amount>0){

            $in_sql = "SELECT * FROM accounts WHERE accno = '$accno'";
			$ru_sql = mysqli_query($con, $in_sql);
            $rows = mysqli_fetch_array($ru_sql);
            $accountbalance = $rows['accountbalance'];
            $custacc = $rows['accno'];

            $total = $accountbalance - $amount;
            $ins_sql = "UPDATE accounts SET accountbalance = $total WHERE accno = '$accno'";
            $run_sql = mysqli_query($con, $ins_sql);




            $fastagbalance = $balance + $amount;

            $sql2 = "UPDATE fastag SET amount = $fastagbalance WHERE vehiclenum = '$vnum'";
            // $ins_sql = "INSERT INTO fastag (fastagid, firstname, lastname, accno, emailid, amount, dob, phonenum, vehiclenum, accopendate) VALUES ('".$fastagid."', '".$fname."', '".$lname."','".$accno."', '".$emailid."', '".$amount."', '".$dob."', '".$phone."', '".$vnum."', '".$accdate."' )";
            
            $run_sql = mysqli_query($con,$sql2);
			$success = "Recharged successfully!";
            header("refresh:2");
		}else{

			$success = "You don't have enough balance!";
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
                                <li class="breadcrumb-item active" aria-current="page">Fastag Recharge</li>
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
        <div>
            <h3>User <?php echo $_SESSION['usr_name']; ?></h3>
        </div>
        <div class="col-12 mb-70">
            <div class="row">

                <!-- Single Icons -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="single-icons mb-30">
                        <i class="icon-credit-card-1"></i>
                        <a href=#><span>Recharge Fastag</span></a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="single-icons mb-30">
                        <i class="icon-diamond"></i>
                        <a href="customer.php"> <span>Dash Board</span></a>
                    </div>
                </div>


                <div class="container">
                    <article class="row">
                        <section class="col-lg-8">
                            <div class="page-header">
                                <h2>FastagAccount Details</h2>
                            </div>
                            <table class="table table-bordered">
                                <thead>

                                    <th>Account number</th>
                                    <th>Email ID</th>
                                    <th>Vehicle number</th>
                                    <th>Amount</th>

                                </thead>
                                <?php
	
		$in_sql = "SELECT * FROM fastag WHERE customerid = '$id'";
		$ru_sql = mysqli_query($con, $in_sql);

		
		while($rows = mysqli_fetch_array($ru_sql)){

			echo '

				<tbody>
					      <tr>
					        
                            <td>'.$rows['accno'].'</td>
                            <td>'.$rows['emailid'].'</td>
                            <td>'.$rows['vehiclenum'].'</td>
                            <td>'.$rows['amount'].'</td>
                            
					      </tr>
					    </tbody>
				
			';

		}
    ?>

                            </table>
                        </section>
                    </article>
                </div>



                <div class="container">
                    <div class="container">
                        <article class="row">
                            <section class="col-sm-8">
                                <div class="page-header">
                                    <h2>RECHARGE </h2>
                                </div>
                                <form class="form-horizontal" action="recharge.php" method="post" role="form">
                                    <b>
                                        <div class="form-group">
                                            <label for="text" class="col-sm-3 control-label">Vehicle Number:</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="vnum" class="form-control"
                                                    placeholder="Enter car number" id="vnum" required>
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
                                            <label for="text" class="col-sm-3 control-label">Phone Number:</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="phone" class="form-control"
                                                    placeholder="Enter the phone number" id="phone" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="number" class="col-sm-3 control-label">Amount:</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="amount" class="form-control"
                                                    placeholder="Enter Amount" id="amount" required>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
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
                                        </div> -->
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


    <section class="newsletter-area section-padding-100 bg-img jarallax"
        style="background-image: url(img/bg-img/6.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-lg-8">
                    <div class="nl-content text-center">
                        <h2>Subscribe to our newsletter</h2>
                        <form action="#" method="post">
                            <input type="email" name="nl-email" id="nlemail" placeholder="Your e-mail">
                            <button type="submit">Subscribe</button>
                        </form>
                        <!-- <p>Curabitur elit turpis, maximus quis ullamcorper sed, maximus eu neque. Cras ultrices erat nec auctor blandit.</p> -->
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- ##### Newsletter Area End ###### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area section-padding-100-0">
        <div class="container">
            <div class="row">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-100">
                        <h5 class="widget-title">About Us</h5>
                        <!-- Nav -->
                        <nav>
                            <ul>
                                <li><a href="index.php">Homepage</a></li>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="services.html">Services &amp; Offers</a></li>
                                <!-- <li><a href="">Portfolio Presentation</a></li> -->
                                <li><a href="post.html">The News</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <!-- <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-100">
                        <h5 class="widget-title">Solutions</h5>
                       
                        <nav>
                            <ul>
                                <li><a href="#">Our Loans</a></li>
                                <li><a href="#">Trading &amp; Commerce</a></li>
                                <li><a href="#">Banking &amp; Private Equity</a></li>
                                <li><a href="#">Industrial &amp; Factory</a></li>
                                <li><a href="#">Financial Solutions</a></li>
                            </ul>
                        </nav>
                    </div>
                </div> -->

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-100">
                        <h5 class="widget-title">Latest News</h5>

                        <!-- Single News Area -->
                        <div class="single-latest-news-area d-flex align-items-center">
                            <div class="news-thumbnail">
                                <img src="img/bg-img/7.jpg" alt="">
                            </div>
                            <div class="news-content">
                                <a href="#">How to get the best loan?</a>
                                <div class="news-meta">
                                    <a href="#" class="post-author"><img src="img/core-img/pencil.png" alt=""> Jane
                                        Smith</a>
                                    <a href="#" class="post-date"><img src="img/core-img/calendar.png" alt=""> April
                                        26</a>
                                </div>
                            </div>
                        </div>

                        <!-- Single News Area -->
                        <div class="single-latest-news-area d-flex align-items-center">
                            <div class="news-thumbnail">
                                <img src="img/bg-img/8.jpg" alt="">
                            </div>
                            <div class="news-content">
                                <a href="#">A new way to get a loan</a>
                                <div class="news-meta">
                                    <a href="#" class="post-author"><img src="img/core-img/pencil.png" alt=""> Jane
                                        Smith</a>
                                    <a href="#" class="post-date"><img src="img/core-img/calendar.png" alt=""> April
                                        26</a>
                                </div>
                            </div>
                        </div>

                        <!-- Single News Area -->
                        <div class="single-latest-news-area d-flex align-items-center">
                            <div class="news-thumbnail">
                                <img src="img/bg-img/9.jpg" alt="">
                            </div>
                            <div class="news-content">
                                <a href="#">Finance you home</a>
                                <div class="news-meta">
                                    <a href="#" class="post-author"><img src="img/core-img/pencil.png" alt=""> Jane
                                        Smith</a>
                                    <a href="#" class="post-date"><img src="img/core-img/calendar.png" alt=""> April
                                        26</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

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