<?php
    $con = mysqli_connect("localhost","root","root","mydatabase");
    if (mysqli_connect_errno()){
        echo "Ошибка: " . mysqli_connect_error();
    }
?>
