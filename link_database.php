<?php
require("config.php");
if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `add_note` (`Title`, `Descirption`) VALUES ('$title', '$desc')";
    $result = mysqli_query($con, $sql);
}
    $row = ("SELECT * FROM `add_note`");
    $row_count = mysqli_query($con,$row);

    $num = mysqli_num_rows($row_count);
    echo $num.("rows are found");

    $data_fetch = mysqli_fetch_assoc($row_count);
  
?>
