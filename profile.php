<?php
require("config.php");
require("checkSession.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MEDI DOC- Pofile</title>
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
    <?php require('navBar.php') ?>

    <!-- Search Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h2 class="d-inline-block text-primary text-uppercase border-bottom border-5">Find A Doctor</h2>
            </div>
        </div>
    </div>
    <!-- Search End -->


    <!-- Search Result Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <?php
            $src="SELECT s.*, d.* FROM schedule s INNER JOIN doctor d ON s.d_id=d.d_id";
            $rs=mysqli_query($con, $src)or die(mysqli_error($con));
            if(mysqli_num_rows($rs)>0){
                ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name of Doctor</th>
                            <th>Qualification</th>
                            <th>Specialization</th>
                            <th>Year of Experince</th>
                            <th>Available Days</th>
                            <th>Timings</th>
                            <th>Make</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($rec=mysqli_fetch_assoc($rs)){
                            ?>
                            <tr>
                                <td><?php echo $rec['d_name'] ?></td>
                                <td><?php echo $rec['degree'] ?></td>
                                <td><?php echo $rec['specialization'] ?></td>
                                <td><?php echo $rec['yoe'] ?></td>
                                <td><?php echo $rec['days'] ?></td>
                                <td><?php echo $rec['time_slot'] ?></td>
                                <td><a href="appointment.php?d_id=<?php echo $rec['d_id'] ?>">Fix Appointment</a></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php

            }else{
                ?>
                <h3>Sorry no doctor found</h3>
                <?php
            }
            ?>
        </div>
    </div>
    <!-- Search Result End -->


    <!-- Footer Start -->
    <?php
    require('footer.php');
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