<?php
include("config.php");

$id = $_SESSION['AccountID'];
$stmt = "Select * from admin_account where AdminID='$id'";
$result = mysqli_query($con, $stmt);
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['FullName'] = $row['FullName'];
    $_SESSION['Phone'] = $row['Phone'];
    $_SESSION['Email'] = $row['Email'];
    $_SESSION['Birthday'] = $row['Birthday'];
    $_SESSION['ProfileImage'] = $row['ProfileImage'];
}
