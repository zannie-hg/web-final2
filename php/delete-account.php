<?php
include("config.php");

session_start();

if(isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $stmt = "Delete from admin_account where AdminID=$id";

    mysqli_query($con, $stmt);
    session_destroy();
    header("Location: ../admin/index.php");
    exit();
}