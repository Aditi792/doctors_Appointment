<?php 
require("config.php");
$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$email_id=$_POST['email_id'];
$pass=$_POST['pass'];
$mobile=$_POST['mobile'];
$age=$_POST['age'];
$address=$_POST['address'];
$gender=$_POST['gender'];

$src="SELECT email_id FROM user WHERE email_id='$email_id'";
$rs=mysqli_query($con, $src);
if(mysqli_num_rows($rs)>0){
    header('location:register.php?err=You are already registered');
}else{
    $sql="INSERT INTO user (f_name, l_name, email_id, pass, mobile, address, gender, age) VALUES ('$f_name', '$l_name', '$email_id', '$pass', '$mobile', '$address', '$gender', '$age')";
    $res=mysqli_query($con,$sql) or die(mysqli_error($con));
    if($res==1){
        header('location:register.php?suc=Registration is succesful');
    }else{
        header('location:register.php?err=Registration is unsuccesful');
    }

}


?>

