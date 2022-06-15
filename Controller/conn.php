<?php


    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "doctor_appointment";

    $conn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);

    if (!$conn) {
       die("Connection to database failed!");
    }
?>