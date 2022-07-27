<?php
//connecting to database
$dbServer="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="shopping";
$conn = mysqli_connect($dbServer,$dbUsername,$dbPassword,$dbName);
if (!$conn) {
    die("Database connection failed whith the following error: ".mysqli_connect_error());
        # code...
}

session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/gbp/config.php';
require_once BASEURL.'helpers/helper.php';


//Alerts
if(isset($_SESSION['success_flash'])){
     echo '<div style="text-align:center;  font-weight:bolder" class="bg-gradient-success session alert alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$_SESSION['success_flash'].'</div>';
    unset($_SESSION['success_flash']);
}
if(isset($_SESSION['error_flash'])){
    echo '<div style="text-align:center; font-weight:bolder" class="bg-gradient-danger session alert alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$_SESSION['error_flash'].'</div>';
    unset($_SESSION['error_flash']);
}