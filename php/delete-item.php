<?php
include("config.php");

if(isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $stmt = "Delete from menu_item where ItemID='$id'";
    mysqli_query($con, $stmt);
    header("Location: ../admin/menu.php");
    exit();
}