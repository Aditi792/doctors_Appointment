<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MEDI DOC - Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <?php
    require("navBar.php");
    ?>
    <!-- Navbar End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center mx-auto" style="max-width: 500px;">
                <h1 class="display-4">Patient Registration</h1>
            </div>
            <div class="row justify-content-center position-relative">
                <div class="col-lg-8">
                    <div class="bg-white rounded p-5 m-5 mb-0">
                        <form name="frm_reg" method="post" action="reg_code.php">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="f_name" class="form-control bg-light border-0" placeholder="Your First Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="l_name" class="form-control bg-light border-0" placeholder="Your Last Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" name="email_id" class="form-control bg-light border-0" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="password" name="pass" class="form-control bg-light border-0" placeholder="Your Password" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="mobile" class="form-control bg-light border-0" placeholder="Your Contact Number" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="age" class="form-control bg-light border-0" placeholder="Your Age" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="text" name="address" class="form-control bg-light border-0" placeholder="Your Address" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <select name="gender" class="form-control bg-light border-0" style="height: 55px;">
                                        <option selected>-Select Gender-</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <input class="btn btn-primary w-100 py-3" type="submit" value="Register" name="ok">
                                </div>
                            </div>
                        </form>
                        <?php
                        if(isset($_GET['suc'])){
                            ?>
                            <div class="alert alert-success mt-4">
                                <?php
                                echo $_GET['suc'];
                                ?>
                            </div>
                            <?php
                        }
                        if(isset($_GET['err'])){
                            ?>
                            <div class="alert alert-danger mt-4">
                                <?php
                                echo $_GET['err'];
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <?php
    require("footer.php");
    ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>