<?php
include("../php/config.php");

session_start();

if (!isset($_SESSION['AccountID'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../admin/css/style.css">
</head>

<body>
    <div class="container">
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="../images/Logo/Mint House Logo.png" alt="">
                    <h2>Mint <span class="success">House</span></h2>
                </div>
            </div>

            <div class="sidebar">
                <a href="dashboard.php">
                    <ion-icon name="grid"></ion-icon>
                    <h3>Dashboard</h3>
                </a>
                <a href="profile.php">
                    <ion-icon name="person-circle"></ion-icon>
                    <h3>Profile</h3>
                </a>
                <a href="../admin/menu.php">
                    <ion-icon name="fast-food"></ion-icon>
                    <h3>Menu</h3>
                </a>
                <a href="reservation.php">
                    <ion-icon name="ticket"></ion-icon>
                    <h3>Reservation</h3>
                    <span class="message-count">
                        <?php
                        $stmt = "Select count(OrderID) as OrderNum from table_reservation_order where Status='pending'";
                        $result = mysqli_query($con, $stmt);
                        $number = mysqli_fetch_assoc($result);
                        echo $number['OrderNum'];
                        ?>
                    </span>
                </a>
                <a href="question.php">
                    <ion-icon name="file-tray-full"></ion-icon>
                    <h3>Question</h3>
                    <span class="message-count">
                        <?php
                        $stmt = "Select count(QuestionID) as QuestionNum from customer_question where Status='pending'";
                        $result = mysqli_query($con, $stmt);
                        $number = mysqli_fetch_assoc($result);
                        echo $number['QuestionNum'];
                        ?>
                    </span>
                </a>
                <a href="settings.php">
                    <ion-icon name="settings"></ion-icon>
                    <h3>Settings</h3>
                </a>
                <a href="newAccount.php">
                    <ion-icon name="add-circle"></ion-icon>
                    <h3>New Account</h3>
                </a>
                <a href="../php/logout.php">
                    <ion-icon name="log-out"></ion-icon>
                    <h3>Log Out</h3>
                </a>
            </div>
        </aside>

        <main>