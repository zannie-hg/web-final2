<?php
include("config.php");

session_start();

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['numPeople']) && isset($_POST['date']) && isset($_POST['time'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $numPeople = validate($_POST['numPeople']);
    $date = validate($_POST['date']);
    $time = validate($_POST['time']);
    $request = validate($_POST['request']);

    if (!empty($name) && !empty($phone) && !empty($email) && !empty($numPeople) && !empty($date) && !empty($time)) {
        $stmt = "Insert into table_reservation_order(Fullname, Email, Phone, NumOfPeople, Date, Time, SpecialRequest, Status) values('$name','$email','$phone','$numPeople',$date,'$time','$request','pending');";
        mysqli_query($con, $stmt);
        session_destroy();
        $Message = "Submit Reservation Order Successful!";
        header("Location: ../booking.php?Message=$Message");
        exit();
    } else {
        $Message = "Submit Reservation Order Unsuccessful!";
        header("Location: ../booking.php?Message=$Message");
        exit();
    }
} else {
    $Message = "Submit Reservation Order Unsuccessful!";
    header("Location: ../booking.php?Message=$Message");
    exit();
}
