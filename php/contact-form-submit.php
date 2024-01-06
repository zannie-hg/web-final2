<?php
include("config.php");

session_start();

if (isset($_POST['customerName']) && isset($_POST['customerPhone']) && isset($_POST['customerEmail']) && isset($_POST['customerQuestion'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['customerName']);
    $phone = validate($_POST['customerPhone']);
    $email = validate($_POST['customerEmail']);
    $question = validate($_POST['customerQuestion']);

    if (!empty($name) && !empty($phone) && !empty($email) && !empty($question)) {
        $stmt = "Insert into customer_question(Fullname, Phone, Email, Message, Status) values('$name','$phone','$email','$question','pending');";
        mysqli_query($con, $stmt);
        session_destroy();
        $Message = "Submit Question Successful!";
        header("Location: ../contact.php?Message=$Message");
        exit();
    } else {
        $Message = "Submit Question Unsuccessful!";
        header("Location: ../contact.php?Message=$Message");
        exit();
    }
} else {
    $Message = "Submit Question Unsuccessful!";
    header("Location: ../contact.php?Message=$Message");
    exit();
}
