<?php
require("config.php");
require("checkSession.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MEDI DOC-Appointment</title>
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
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
                <h2 class="d-inline-block text-primary text-uppercase border-bottom border-5">Make Appointment</h2>
            </div>
            <div class="">
            <?php
            $d_id=$_GET['d_id'];
            $src="SELECT s.*, d.* FROM schedule s INNER JOIN doctor d ON s.d_id=d.d_id WHERE s.d_id=$d_id";
            $rs=mysqli_query($con, $src)or die(mysqli_error($con));
            $rec=mysqli_fetch_assoc($rs);
            ?>
            <table class="table table-bordered">
                <tr>
                    <td>Name of Doctor</td>
                    <td><?php echo $rec['d_name'] ?></td>
                </tr>
                <tr>
                    <td>Specialization</td>
                    <td><?php echo $rec['specialization'] ?></td>
                </tr>
                <tr>
                    <td>Year of Experince</td>
                    <td><?php echo $rec['yoe'] ?></td>
                </tr>
                <tr>
                    <td>Days Available</td>
                    <td><?php echo $rec['days'] ?></td>
                </tr>
                <tr>
                    <td>Timings</td>
                    <td><?php echo $rec['time_slot'] ?></td>
                </tr>
            </table>
            </div>
            <div class="mx-auto" style="width: 100%; max-width: 600px;">
                <form name="app-frm" method="post">
                    <div class="input-group">
                        <input type="text" name="app_date" id="app_date" class="form-control border-primary w-50" placeholder="Select Appointment Date">
                        <input type="submit" name="ok" value="Make Appointment" class="btn btn-dark border-0 w-25">
                    </div>
                </form>
                <?php
                if(isset($_POST['ok'])){
                    $u_id=$_SESSION['u_info']['u_id'];
                    $time_slot=$rec['time_slot'];
                    $app_date=$_POST['app_date'];
                    $s_days=explode(",",$rec['days']);
                    $app_days=date("D", strtotime($app_date));
                    $today=date("d-M-Y");
                    $next_due_date = date('Y-m-d', strtotime("+30 days"));
                    if(strtotime($app_date)===strtotime($today)){
                        echo "Appointment date may not today";
                    }elseif(strtotime($app_date)<strtotime($today)){
                        echo "Appointment date may not previous date";
                    }elseif(!in_array($app_days, $s_days)){
                        echo "Your selected day doctor is not available";
                    }elseif(strtotime($app_date)>strtotime($today) && strtotime($app_date)<strtotime($next_due_date)){
                        $sql="INSERT INTO appointment (d_id, u_id, app_date, app_made, time_slot) VALUES ('$d_id', '$u_id', '$app_date', '$today', '$time_slot')";
                        $res=mysqli_query($con, $sql)or die(mysqli_error($con));
                        if($res==1){
                            echo "Appointment has been made";
                        }else{
                            echo "Please try again later";
                        }
                    }else{
                        echo "Your selected day within 30 days from today";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Search End -->

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
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        $( function() {
            $( "#app_date" ).datepicker({
                dateFormat: 'dd-M-yy',
            });
        } );
    </script>
</body>

</html>