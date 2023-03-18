<?php

$server_name = 'localhost';
$user_name = 'root';
$password = '';
$database_name = 'aditi';

$con = mysqli_connect($server_name , $user_name , $password , $database_name);

if (!$con ){
    echo ('<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Sorry!</strong> You could not connet to the srever . please check 😊 .
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>');
}

?>