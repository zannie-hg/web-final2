<?php
include("config.php");

if(isset($_GET['ID'])) {
    $id = $_GET['ID'];

    if(isset($_POST['accept'])) {
        $stmt = "Update table_reservation_order set Status='accepted' where OrderID='$id';";
        mysqli_query($con, $stmt);
        header("Location: ../admin/reservation.php");
        exit();
    } else if (isset($_POST['decline'])){
        $stmt = "Update table_reservation_order set Status='declined' where OrderID='$id';";
        header("Location: ../admin/reservation.php");
        mysqli_query($con, $stmt);
        exit();
    } else {
        header("Location: ../admin/view-reservation.php?Order ID=$id failed to update!");
    }
}