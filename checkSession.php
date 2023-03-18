<?php
if(empty($_SESSION['u_info'])){
    header('location:login.php');
}