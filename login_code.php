<?php
require("config.php");
$email_id=$_POST['email_id'];
$pass=$_POST['pass'];
$src="SELECT * FROM user WHERE email_id='$email_id' AND pass='$pass'";
$rs=mysqli_query($con, $src);
if(mysqli_num_rows($rs)>0){
    $rec=mysqli_fetch_assoc($rs);
    if($rec['u_type']=="Patient"){
        $_SESSION['u_info']=$rec;
        header('location:profile.php');
    }
}else{
    header('location:login.php?err=Invalid email or password');
}

?>